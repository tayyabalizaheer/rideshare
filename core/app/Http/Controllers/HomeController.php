<?php

namespace App\Http\Controllers;

use App\GeneralSettings;
use App\TicketBooking;
use App\TicketCancel;
use App\Trx;
use App\WithdrawLog;
use App\WithdrawMethod;
use Illuminate\Http\Request;
use  App\User;
use Session;
use Image;
use File;
use Auth;
use Carbon\Carbon;
use Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $data['page_title'] = "My Trip";
        $data['myTrips'] = TicketBooking::where('user_id',Auth::id())->latest()->paginate(15);
        return view('user.index', $data);
    }


    public function ticketCancel(){
        $data['page_title'] = "Ticket Cancel";
        return view('user.ticketCancel',$data);
    }

    public function getTicketCancel(Request $request)
    {


        $this->validate($request,[
            'pnr' => 'required',
        ],[
            'pnr.required' => 'PNR / Ticket Number must not be empty!'
        ]);
       $ticket  =  TicketBooking::where('pnr',$request->pnr)->where('user_id',Auth::user()->id)->first();

        $user = User::find(Auth::id());

       if($ticket){
           if($user->email == $ticket->email){
               if(Carbon::parse($ticket->cancel_endtime) < Carbon::now()){
                   return redirect()->route('ticket-cancel')->with('logout', "This Ticket Cancel Time expired at ". date('d M Y h:i A ', strtotime($ticket->cancel_endtime)));
               }
               if($ticket->cancel_req != 0){
                   return redirect()->route('ticket-cancel')->with('logout',"Ticket Cancellation processing");
               }
               if($ticket->status != 0){
                   return redirect()->route('ticket-cancel')->with('logout',"This ticket not allowed to canceled");
               }

               $ticCancel['ticket_booking_id'] = $ticket->id;
               $ticCancel['user_id'] = Auth::id();
               TicketCancel::create($ticCancel);

               $ticket->cancel_req = 1;
               $ticket->save();

               return redirect()->route('ticket-cancel')->with('suc','Ticket Cancel request send wait for confirmation');
           }else{
               return redirect()->route('ticket-cancel')->with('logout',"Passenger E-mail Address Not Match With Your E-Mail");
           }
       }else{
           return redirect()->route('ticket-cancel')->with('logout',"Sorry Could n't Found This Ticket");
       }






    }


    /*
     * Support Ticket Start
     */
    public function supportTicket()
    {
        $page_title = "Support Tickets";
        $supports = SupportTicket::where('user_id', Auth::id())->orderBy('id', 'DESC')->paginate(15);
        return view('user.support.supportTicket', compact('supports', 'page_title'));
    }

    public function openSupportTicket()
    {
        $page_title = "Support Tickets";
        return view('user.support.sendSupportTicket', compact('page_title'));
    }

    public function storeSupportTicket(Request $request)
    {
        $ticket = new SupportTicket();
        $message = new SupportMessage();
        $this->validate($request, [
            'subject' => 'required',
            'message' => 'required',
        ]);

        $ticket->user_id = Auth::id();
        $random = rand(100000, 999999);

        $ticket->ticket = 'S-' . $random;
        $ticket->subject = $request->subject;
        $ticket->status = 0;
        $ticket->save();

        $message->supportticket_id = $ticket->id;
        $message->type = 1;
        $message->message = $request->message;
        $message->save();

        $notification = array('message' => 'Support ticket created successfully!', 'alert-type' => 'success');
        return back()->with($notification);

    }

    public function supportMessage($ticket)
    {
        $page_title = "Support Tickets";
        $my_ticket = SupportTicket::where('ticket', $ticket)->latest()->first();
        $messages = SupportMessage::where('supportticket_id', $my_ticket->id)->get();
        if ($my_ticket->user_id == Auth::id()) {
            return view('user.support.supportMessage', compact('my_ticket', 'messages', 'page_title'));
        } else {
            return abort(404);
        }

    }

    public function supportMessageStore(Request $request, $id)
    {

        $ticket = SupportTicket::findOrFail($id);
        $message = new SupportMessage();
        if ($ticket->status != 3) {

            if ($request->replayTicket == 1) {
                $ticket->status = 2;
                $ticket->save();

                $message->supportticket_id = $ticket->id;
                $message->type = 1;
                $message->message = $request->message;
                $message->save();

                $notification = array('message' => 'Support ticket replied successfully!', 'alert-type' => 'success');
            } elseif ($request->replayTicket == 2) {
                $ticket->status = 3;
                $ticket->save();

                $notification = array('message' => 'Support ticket closed successfully!', 'alert-type' => 'success');
            }
            return back()->with($notification);
        } else {
            session()->flash('alert', 'Support ticket already closed');
            return back();
        }

    }

    public function authCheck()
    {
        if (Auth()->user()->status == '1' && Auth()->user()->email_verify == '1') {
            return redirect()->route('home');
        } else {
            $data['page_title'] = "Authorization";
            return view('user.authorization', $data);
        }
    }

    public function sendVcode(Request $request)
    {
        $user = User::find(Auth::user()->id);

        if (Carbon::parse($user->phone_time)->addMinutes(1) > Carbon::now()) {
            $time = Carbon::parse($user->phone_time)->addMinutes(1);
            $delay = $time->diffInSeconds(Carbon::now());
            $delay = gmdate('i:s', $delay);
            $notification = array("message" => 'You can resend Verification Code after ' . $delay . ' minutes', 'alert-type' => 'error');
        } else {
            $code = rand(000000,999999);
            $user->phone_time = Carbon::now();
            $user->sms_code = $code;
            $user->save();
            send_sms($user->phone, 'Your Verification Code is ' . $code);
            $notification = array('message' => 'Verification Code Send successfully', 'alert-type' => 'success');
        }
        return back()->with($notification);
    }

    public function smsVerify(Request $request)
    {
        $user = User::find(Auth::user()->id);
        if ($user->sms_code == $request->sms_code) {
            $user->phone_verify = 1;
            $user->save();
            $notification = array('message' => 'Your Profile has been verified successfully', 'alert-type' => 'success');
            return redirect()->route('home')->with($notification);
        } else {
            $notification = array('message' => 'Verification Code Did not matched', 'alert-type' => 'error');
        }
        return back()->with($notification);
    }

    public function sendEmailVcode(Request $request)
    {
        $user = User::find(Auth::user()->id);

        if (Carbon::parse($user->email_time)->addMinutes(1) > Carbon::now()) {
            $time = Carbon::parse($user->email_time)->addMinutes(1);
            $delay = $time->diffInSeconds(Carbon::now());
            $delay = gmdate('i:s', $delay);

            $notification = array('message' => 'You can resend Verification Code after ' . $delay . ' minutes', 'alert-type' => 'error');
        } else {
            $code = rand(000000,999999);
            $user->email_time = Carbon::now();
            $user->verification_code = $code;
            $user->save();

              $to_name = $user->fname;
              $to_email = $user->email;
              $data['code'] = $code;
              try{
                      Mail::send('email.verifyemail', $data, function($message) use ($to_name, $to_email) {
                       $message -> to($to_email, $to_name)
                           -> subject('Eamil Verification');
                       $message->from('businessmah068@gmail.com','Eamil Verification Code');
              });
            }
            catch (\Exception $e) {
               return back()->with('error','Email not send please try later');
            }

            $notification = array('message' => 'Verification Code Send successfully', 'alert-type' => 'success');
        }
        return back()->with($notification);
    }

    public function postEmailVerify(Request $request)
    {

        $user = User::find(Auth::user()->id);
        if ($user->verification_code == $request->email_code) {
            $user->email_verify = 1;
            $user->save();

            $notification = array('message' => 'Your Profile has been verified successfully', 'alert-type' => 'success');
            return redirect()->route('home')->with($notification);
        } else {
            $notification = array('message' => 'Verification Code Did not matched', 'alert-type' => 'error');
        }
        return back()->with($notification);
    }


    public function editProfile()
    {
        $data['page_title'] = "Edit Profile";
        $data['user'] = User::findOrFail(Auth::user()->id);
        return view('user.edit-profile', $data);
    }

    public function submitProfile(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);
        $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'zip_code' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'required|string|min:10|unique:users,phone,' . $user->id,
//            'username' => 'required|min:5||regex:/^\S*$/u|unique:users,username,' . $user->id,
            'image' => 'mimes:png,jpg,jpeg',
            'cnic_pic' => 'mimes:png,jpg,jpeg',
            'driver_licence' => 'mimes:png,jpg,jpeg',

        ],[
            'fname.required' => 'First Name Field is required',
            'lname.required' => 'Last Name Field is required',
        ]);

        $in = Input::except('_method', '_token','balance');
        $in['reference'] = $request->username;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $request->username . '.jpg';
            $location = 'assets/images/user/' . $filename;
            $in['image'] = $filename;
            $in['image_verify'] = 0;

            if ($user->image != 'user-default.png') {
                $path = './assets/images/user/';
                $link = $path . $user->image;
                if (file_exists($link)) {
                    @unlink($link);
                }
            }
            Image::make($image)->resize(800, 800)->save($location);
        }
        if ($request->hasFile('cnic_pic')) {
            $cnic_pic = $request->file('cnic_pic');
            $filename = time() . '_' . $request->username . '.jpg';
            $location = 'assets/images/cnic_pic/' . $filename;
            $in['cnic_pic'] = $filename;
            $in['cnic_verify'] = 0;
            if ($user->image != 'user-default.png') {
                $path = './assets/images/cnic_pic/';
                $link = $path . $user->cnic_pic;
                if (file_exists($link)) {
                    @unlink($link);
                }
            }
            Image::make($cnic_pic)->resize(800, 600)->save($location);
        }
        if ($request->hasFile('driver_licence')) {
            $driver_licence = $request->file('driver_licence');
            $filename = time() . '_' . $request->username . '.jpg';
            $location = 'assets/images/driver_licence/' . $filename;
            $in['driver_licence'] = $filename;
            $in['driver_licence_verify'] = 0;
            if ($user->image != 'user-default.png') {
                $path = './assets/images/driver_licence/';
                $link = $path . $user->driver_licence;
                if (file_exists($link)) {
                    @unlink($link);
                }
            }
            Image::make($driver_licence)->resize(800, 600)->save($location);
        }
        $user->fill($in)->save();
        $notification = array('message' => 'Profile Updated Successfully.', 'alert-type' => 'success');
        return back()->with($notification);

    }

    public function changePassword()
    {
        $data['page_title'] = "Change Password";
        return view('user.change-password', $data);
    }

    public function submitPassword(Request $request)
    {
        $this->validate($request, [
            'current_password' => 'required',
            'password' => 'required|min:5|confirmed'
        ]);
        try {

            $c_password = Auth::user()->password;
            $c_id = Auth::user()->id;
            $user = User::findOrFail($c_id);
            if (Hash::check($request->current_password, $c_password)) {

                $password = Hash::make($request->password);
                $user->password = $password;
                $user->save();

                $notification = array('message' => 'Password Changes Successfully.', 'alert-type' => 'success');
                return back()->with($notification);
            } else {
                $notification = array('message' => 'Current password not match', 'alert-type' => 'error');
                return back()->with($notification);
            }

        } catch (\PDOException $e) {
            $notification = array('message' => $e->getMessage(), 'alert-type' => 'warning');
            return back()->with($notification);
        }
    }



    public function activity()
    {
        $user = Auth::user();
        $data['invests'] = Trx::whereUser_id($user->id)->where('role',1)->latest()->paginate(15);
        $data['page_title'] = "Transaction Log";

        return view('user.trx', $data);
    }


    public function withdrawLog()
    {
        $user = Auth::user();
        $data['invests'] = WithdrawLog::whereUser_id($user->id)->where('status', '!=', 0)->latest()->paginate(15);
        $data['page_title'] = "Withdraw Log";
        return view('user.withdraw-log', $data);
    }

    public function withdrawMoney()
    {
        $data['withdrawMethod'] = WithdrawMethod::whereStatus(1)->get();
        $data['page_title'] = "Withdraw Money";
        return view('user.withdraw-money', $data);
    }

    public function requestPreview(Request $request)
    {
        $this->validate($request, [
            'method_id' => 'required',
            'amount' => 'required|numeric',
        ]);
        $basic = GeneralSettings::first();
        $authWallet =User::findOrFail(Auth::id());

        $method = WithdrawMethod::findOrFail($request->method_id);
        $ch = $method->fix + round(($request->amount * $method->percent) / 100, $basic->decimal);
        $reAmo = $request->amount + $ch;

        if ($authWallet && $method) {

            if ($reAmo < $method->withdraw_min) {

                $notification = array('message' => 'Your Request Amount is Smaller Then Withdraw Minimum Amount.', 'alert-type' => 'error');
                return back()->with($notification);
            }
            if ($reAmo > $method->withdraw_max) {
                $notification = array('message' => 'Your Request Amount is Larger Then Withdraw Maximum Amount.', 'alert-type' => 'error');
                return back()->with($notification);
            }
            if ($reAmo > $authWallet->balance) {
                $notification = array('message' => 'Your Request Amount is Larger Then Your Current Balance..', 'alert-type' => 'error');
                return back()->with($notification);
            } else {

                $tr = 'TRX-' . time() . rand(10,99);
                $w['amount'] = $request->amount;
                $w['method_id'] = $request->method_id;
                $w['type'] = 1;
                $w['charge'] = $ch;
                $w['transaction_id'] = $tr;
                $w['net_amount'] = $reAmo;
                $w['user_id'] = Auth::id();
                $trr = WithdrawLog::create($w);
                $data['withdraw'] = $trr;
                Session::put('wtrx', $trr->transaction_id);

                $data['method'] = $method;
                $data['balance'] = round($authWallet->balance, $basic->decimal);
                $data['page_title'] = "Preview";
                return view('user.withdraw-preview', $data);
            }
        }
        abort(404);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function requestSubmit(Request $request)
    {
        $basic = GeneralSettings::first();
        $this->validate($request, [
            'withdraw_id' => 'required|numeric',
            'send_details' => 'required'
        ]);

        $ww = WithdrawLog::where('id',$request->withdraw_id)->where('status',0)->first();
        if($ww){
            $ww->send_details = $request->send_details;
            $ww->message = $request->message;
            $ww->status = 1;
            $ww->save();

            $AuthWallet = User::where('id', $ww->user_id)->first();
            $AuthWallet->balance -= $ww->net_amount;
            $AuthWallet->save();

            Trx::create([
                'user_id' => $AuthWallet->id,
                'amount' => $ww->amount,
                'main_amo' => round($AuthWallet->balance, $basic->decimal),
                'charge' => $ww->charge,
                'type' => '-',
                'role' => 1,
                'title' => 'Withdraw Via ' . $ww->method->name,
                'trx' => $ww->transaction_id
            ]);

            $text = $ww->amount . " " . $basic->currency . " Withdraw Request Send via " . $ww->method->name . ". <br> Transaction ID Is : <b>#$ww->transaction_id</b>";
            notify($AuthWallet, 'Withdraw Via ' . $ww->method->name, $text);

            $notification = array('message' => 'Withdraw has been requested. Wait For Confirmation.', 'alert-type' => 'success');
            return redirect()->route('withdraw.money')->with($notification);
        }
        abort(404);
    }
    public function become_driver($value='')
    {
        $user_id = Auth::user()->id;

        $user = User::find($user_id);

        $user->is_driver = 1;

        $user->save();
        $notification = array('message' => 'Please Complete your profile to rank high in search ride.', 'alert-type' => 'success');
        return redirect()->route('edit-profile')->with($notification);
    }


}

<?php

namespace App\Http\Controllers;

use App\Category;
use App\Deposit;
use App\Enquiry;
use App\FleetType;
use App\Gateway;
use App\GeneralSettings;
use App\Language;
use App\Lib\GoogleAuthenticator;
use App\LogPdf;
use App\PopularDestination;
use App\PopularTour;
use App\Post;
use App\Slider;
use App\Subscriber;
use App\TicketBooking;
use App\TripAssign;
use App\TripRoute;
use App\TripLocation;
use App\Trx;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use PDF;
use Auth;
use App\Faq;
use App\Advertisment;
use Session;
use Illuminate\Support\Facades\Mail;

class FrontendController extends Controller
{

    public function __construct()
    {

    }

    public function index()
    {
        $data['page_title'] = "Home";
        $from = TripLocation::where('status', 1)->orderBy('name', 'asc')->get();
        $tripFrom = [];
        foreach ($from as $value) {
            $tripFrom[] = $value->name;
        }

        $fleetType = FleetType::where('status', 1)->orderBy('name', 'asc')->get();
        $type = [];
        foreach ($fleetType as $value) {
            $type[] = $value->name;
        }

        $tripFrom = json_encode($tripFrom, true);
        $type = json_encode($type, true);


        $data['slider'] = Slider::latest()->get();
        $data['posts'] = Post::latest()->limit(3)->get();
        $data['popularTour'] = PopularTour::latest()->get();
        $data['popularDestination'] = PopularDestination::latest()->get();
        return view('front.index', $data, compact('tripFrom', 'type'));
    }
    public function ourservies()
    {
        $data['page_title'] = "Our Services";
        $from = TripLocation::where('status', 1)->orderBy('name', 'asc')->get();
        $tripFrom = [];
        foreach ($from as $value) {
            $tripFrom[] = $value->name;
        }

        $fleetType = FleetType::where('status', 1)->orderBy('name', 'asc')->get();
        $type = [];
        foreach ($fleetType as $value) {
            $type[] = $value->name;
        }

        $tripFrom = json_encode($tripFrom, true);
        $type = json_encode($type, true);


        $data['slider'] = Slider::latest()->get();
        $data['posts'] = Post::latest()->limit(3)->get();
        $data['popularTour'] = PopularTour::latest()->get();
        $data['popularDestination'] = PopularDestination::latest()->get();
        return view('front.ourservices', $data, compact('tripFrom', 'type'));
    }
    public function search(Request $request)
    {
        $data['page_title'] = "Search";
        $start_points = null;
        $end_points = null;
        if ($request->start_point) {
            $start_points = TripLocation::where('status', 1)->where('name', 'like', '%' . $request->start_point . '%')->first();
        }
        if ($request->end_point) {
            $end_points = TripLocation::where('status', 1)->where('name', 'like', '%' . $request->end_point . '%')->first();
        }
        $from = TripLocation::where('status', 1)->orderBy('name', 'asc')->get();
        $tripFrom = [];
        foreach ($from as $value) {
            $tripFrom[] = $value->name;
        }
        $fleetType = FleetType::where('status', 1)->orderBy('name', 'asc')->get();
        $type = [];
        foreach ($fleetType as $value) {
            $type[] = $value->name;
        }

        $tripFrom = json_encode($tripFrom, true);


        $type = json_encode($type, true);

        if ($request->date) {
            $startDate = date('Y-m-d', strtotime($request->date));
        } else {
            $startDate = date('Y-m-d');
        }

        $start_point = $request->start_point;
        $end_point = $request->end_point;
        $user_id = '';
        if (isset(Auth::user()->id)) {
            $user_id = Auth::user()->id;
        }else{
             $user_id =0;
        }
        $checkAssignTrip = TripAssign::
        join('trip_routes', 'trip_routes.id', '=', 'trip_assigns.trip_route_id')
        ->join('users', 'users.id', '=', 'trip_routes.user_id')
            ->select('trip_assigns.*','users.profile_rating', 'users.fname as driver_name', 'trip_routes.start_point_name as start_point_name', 'trip_routes.end_point_name as end_point_name', 'trip_routes.stoppage as stoppage', 'trip_routes.distance as distance','trip_routes.price as price', 'trip_routes.approximate_time as approximate_time', 'trip_routes.name as name')
            ->where('trip_assigns.user_id','!=',$user_id)
            ->when($request->start_point, function ($query) use ($request) {
                return $query->where('trip_routes.start_point_name', 'like', '%' . $request->start_point . '%');
            })
            ->when($request->end_point, function ($query) use ($request) {
                return $query->where('trip_routes.end_point_name', 'like', '%' . $request->end_point . '%');
            })
            ->when($startDate, function ($query) use ($startDate) {
                return $query->whereDate('start_date', '>=', $startDate);
            })
            ->orderBy('users.profile_rating','desc')
            ->get();

        // dd($checkAssignTrip);
        return view('front.search', $data, compact('tripFrom', 'type', 'checkAssignTrip', 'start_point', 'end_point', 'startDate','start_points','end_points'));
    }

    public function viewSeat($id)
    {
        $tripAssign = TripAssign::where('id', $id)->where('status', 1)->first();
        $tripRoute = TripRoute::where('id', $tripAssign->trip_route_id)->first();
        // dd($tripRoute);
        if ($tripAssign) {
            $data['page_title'] = $tripAssign->tripRoute->name;
            $data['tripAssign'] = $tripAssign;

            $dropLocation = array_map('trim', explode(',', $tripAssign->tripRoute->stoppage));
            $stoppage = [];
            foreach ($dropLocation as $value) {
                $stoppage[] = $value;
            }

            $data['stoppage'] = $stoppage;

            $ticketBook =  TicketBooking::where('trip_assign_id_no',$tripAssign->id)->where('status','!=',-1)->get();
            $seatArray = "";
            foreach ($ticketBook as $val){
                $seatArray .= $val->seat_number ;
            }
             $data['booked_serial'] = $seatArray;
             $data['tripRoute'] = $tripRoute;
             // dd($tripRoute);
            return view('front.seat-plan', $data);
        } 
        abort(404);
    }


    public function checkedSeat(Request $request)
    {
        // dd($request);
        $ticketBook =  TicketBooking::where('trip_assign_id_no',$request->trip_assign_id_no)->where('status','!=',-1)->get();
        $seatArray = "";
        foreach ($ticketBook as $val){
            $seatArray .= $val->seat_number ;
        }

        $seatBookedArray = array_map('trim', explode(',', $seatArray));
        $seatNumberRequest = array_map('trim', explode(',', $request->seat_number));


         $bookedSeatYet = [];
         foreach ($seatNumberRequest as $reqSeat)
         {
             if (in_array($reqSeat, $seatBookedArray)){
                 $bookedSeatYet[] = $reqSeat;
             }
         }
         array_pop($bookedSeatYet);

         if ($bookedSeatYet != []){
             return response()->json(['arr'=> $bookedSeatYet , 'status' => 1000]);
         }

         $basic = GeneralSettings::first();

        $data['trip_route_id'] = $request->trip_route_id;
        $data['fleet_registration_id'] = $request->fleet_registration_id;
        $data['trip_assign_id_no'] = $request->trip_assign_id_no;
        $data['fleet_type_id'] = $request->fleet_type_id;
        $data['id_no'] = $request->id_no;
        $data['user_id'] = (Auth::id()) ?? null;
        $data['boarding'] = ucfirst($request->boarding);
        $data['total_seat'] = $request->total_seat;
        $data['seat_number'] = $request->seat_number;
        $data['price'] = $request->price;
        $data['total_fare'] = $request->total_fare;
        $data['booking_date'] = $request->booking_date;
        $data['pay_endtime'] = Carbon::now()->addMinutes($basic->addtime);
        $data['cancel_endtime'] = Carbon::parse($request->booking_date)->subMinutes($basic->cancel_endtime);
        $data['pnr'] =  strtoupper(str_random(12));

        $TicketBookId = TicketBooking::create($data)->id;
        $ticketPayment =  TicketBooking::where('id',$TicketBookId)->first();

        if($ticketPayment){
            return response()->json(['pnr'=> $ticketPayment->pnr]);
        }
    }

    public function travellerDetails($pnr)
    {
        $data = TicketBooking::where('pnr',$pnr)->where('payment_status',0)->first();
        if ($data){
            $view['page_title'] = "Traveller Details";
            $view['bookTic'] = $data;
            $view['gateway'] = Gateway::where('status',1)->get();
            return view('front.travel-details', $view);
        }
        abort(404);
    }

    public function ticketPayment(Request $request)
    {
        $basic = GeneralSettings::first();

        $gate  = Gateway::where('id', $request->gatewayId)->first();
        if(!$gate){
            return response()->json(['status' => 'unknownGateway']);
        }
        $rules = array('email' => 'required|email|max:50');
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()){
            return response()->json(['status' => 'invalidEmail']);
        }

       $TicId =  TicketBooking::where('payment_status',0)->where('id',$request->bookTicId)->first();
       if(!$TicId){
           return response()->json(['status' => 'invalidTicket']);
       }else{
           $TicId->passenger_name =  $request->passenger_name;
           $TicId->email =  strtolower(trim($request->email));
           $TicId->phone =  trim($request->phone);
           $TicId->next_of_kin_name =  $request->next_of_kin_name;
           $TicId->next_of_kin_phone =  $request->next_of_kin_phone;
           $TicId->user_id = (Auth::id()) ?? null;
          $saveTicket =  $TicId->update();

       }

       $basic = GeneralSettings::first();
        if (isset($gate)) {
            if (0 <= $TicId->total_fare) {
                $charge = $gate->fixed_charge + ($TicId->total_fare * $gate->percent_charge / 100);
                $usdamo = ($TicId->total_fare + $charge) / $gate->rate;

                $depo['user_id'] = (Auth::id()) ?? null;
                $depo['gateway_id'] = $gate->id;
                $depo['ticket_booking_id'] = $TicId->id;
                $depo['amount'] = $TicId->total_fare;
                $depo['charge'] = $charge;
                $depo['usd'] = round($usdamo, 2);
                $depo['btc_amo'] = 0;
                $depo['btc_wallet'] = "";
                $depo['trx'] = str_random(16);
                $depo['try'] = 0;
                $depo['status'] = 0;
                Deposit::create($depo);

                Session::put('Track', $depo['trx']);
                return response()->json(['status' => 'confirmPayment', 'url' => route('paymentPreview')]);
            } else {
                return response()->json(['status' => 'depositLimit', 'msg' => "Payment Limit minimum "]);
            }
        }
    }


    public function paymentPreview()
    {
        $track = Session::get('Track');
        if (isset($track))
        {
            $data = Deposit::where('status', 0)->where('trx', $track)->first();
            if ($data){
                $page_title = "Payment Preview";
                return view('front.ticket-payment', compact('data', 'page_title'));
            }
            abort(404);
        }
        abort(404);
    }


    public function seatBookDelete(Request $request, $pnr)
    {
        $data = TicketBooking::where('pnr',$pnr)->where('payment_status',0)->first();
        if($data)
        {
         $data->delete();
            $notify = array('message' => 'Remove successfully!', 'alert-type' => 'success');
         return back()->with($notify);
        }

        abort(404);

    }



    public function about()
    {
        $data['page_title'] = "About Us";

        $data['posts'] = Post::latest()->limit(3)->get();
        $data['popularTour'] = PopularTour::latest()->get();
        $data['popularDestination'] = PopularDestination::latest()->get();
        return view('front.about', $data);
    }

    public function faqs()
    {
        $data['faqs'] = Faq::all();
        $data['page_title'] = "Faqs";
        return view('front.faqs', $data);
    }


    public function contactUs()
    {
        $data['page_title'] = "Contact Us";
        return view('front.contact', $data);
    }

    public function contactSubmit(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
            'subject' => 'required',
        ]);
        $subject = $request->subject;
        $txt = $request->message;

        send_contact($request->email, $request->name, $subject, $txt);
        $notification = array('message' => 'Contact Message Send.', 'alert-type' => 'success');
        return back()->with($notification);
    }

    public function clickadd($id)
    {

        $add = Advertisment::findOrFail($id);
        $data = array();
        $data['views'] = $add->views + 1;
        Advertisment::whereId($id)->update($data);
        $go = $add->link;
        return redirect($go);
    }

    public function blog()
    {
        $data['page_title'] = "Blog Feed";
        $data['posts'] = Post::latest()->paginate(9);
        return view('front.blog', $data);
    }

    public function details($id)
    {
        $post = $data['post'] = Post::findOrFail($id);
        $post->hit += 1;
        $post->save();
        $data['page_title'] = "Blog Details";
        $data['latest'] = Post::latest()->whereStatus(1)->take(3)->get();
        $data['categories'] = Category::whereStatus(1)->get();
        return view('front.details', $data);
    }

    public function categoryByBlog($id)
    {
        $cat = Category::findOrFail($id);
        $data['page_title'] = "$cat->name";
        $data['posts'] = Post::where('cat_id', $id)->latest()->paginate(9);
        return view('front.blog', $data);
    }


    public function subscribe(Request $request)
    {

        $request->validate([
            'email' => 'required|email|max:255',
        ]);
        $macCount = Subscriber::where('email', $request->email)->count();
        if ($macCount > 0) {
            $notification = array('message' => 'This Email Already Exist!!', 'alert-type' => 'error');
            return back()->with($notification);
        } else {
            Subscriber::create($request->all());
            $notification = array('message' => 'Subscribe Successfully!!', 'alert-type' => 'success');
            return back()->with($notification);
        }
    }

    public function enquiry(Request $request)
    {

        $request->validate([
            'email' => 'required|email|max:30',
            'name' => 'required|max:20',
            //'phone' => 'required|max:20|regex:/(01)[0-9]{9}/',
            'phone' => 'required|max:20',
            'enquiry' => 'required',
        ]);


        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['enquiry'] = $request->enquiry;
        $data['ip'] = $request->ip();
        Enquiry::create($data);

        $notification = array('message' => 'Your Enquiry Send Successfully!!', 'alert-type' => 'success');
        return back()->with($notification);
    }


    public function changeLang($lang)
    {
        $language = Language::where('code', $lang)->first();
        if (!$language) $lang = 'en';
        session()->put('lang', $lang);
        return \redirect()->back();
    }


    public function verify2fa(Request $request)
    {
        $user = User::findOrFail(Auth::id());

        $this->validate($request,
            [
                'code' => 'required',
            ]);
        $ga = new GoogleAuthenticator();

        $secret = $user->secretcode;
        $oneCode = $ga->getCode($secret);
        $userCode = $request->code;

        if ($oneCode == $userCode) {
            $user['tfver'] = 1;
            $user->save();
            return redirect()->route('home');
        } else {
            $notification = array('message' => 'Wrong Verification Code!!', 'alert-type' => 'error');
            return back()->with($notification);
        }
    }

    public function generatePDF()
    {
        $basic = GeneralSettings::first();
        $data['page_title'] = " $basic->sitename ";
        return view('generatePDF', $data);
    }

    public function getTicketPdf($token)
    {
        $gnl = GeneralSettings::first();
        $data = LogPdf::where('token', $token)->first();
        if ($data){
            $pdfname = $data->ticketBooking->pnr.'_'.time().'.pdf';
            $makePdf['passenger_name'] = $data->ticketBooking->passenger_name;
            $makePdf['passenger_number'] = $data->ticketBooking->phone;
            $makePdf['pnr'] = $data->ticketBooking->pnr;
            $makePdf['coach'] = $data->ticketBooking->fleetRegistration->reg_no;
            $makePdf['departureTime'] = date('h:i A', strtotime($data->ticketBooking->booking_date));
            $makePdf['journeyDate'] = date('d M Y', strtotime($data->ticketBooking->booking_date));
            $makePdf['seat_fare'] = $data->ticketBooking->price;
            $makePdf['seats'] = $data->ticketBooking->seat_number;
            $makePdf['from'] = $data->ticketBooking->tripRoute->start_point_name;
            $makePdf['boarding'] = $data->ticketBooking->boarding;

            $makePdf['total_fare'] = $data->ticketBooking->total_fare;
            $makePdf['to'] = $data->ticketBooking->tripRoute->end_point_name;
            $makePdf['reportingTime'] = date('h:i A', strtotime($data->ticketBooking->updated_at));

            $makePdf['issueOn'] = date('d M Y', strtotime($data->ticketBooking->updated_at));
            $makePdf['issueBy'] = ($data->ticketBooking->agent_id == null) ? $gnl->sitename : $data->ticketBooking->agent->username;

            $pdf = PDF::loadView('generatePDF', $makePdf);
            return $pdf->download('invoice.pdf');

            //return response()->download('assets/images/pdf/'.$data->pdf_name);
        }
        abort(404);
    }

    public function getTicketPrintView($token)
    {
        $gnl = GeneralSettings::first();
         $data = LogPdf::where('token', $token)->first();
        if ($data){
            $pdfname = $data->ticketBooking->pnr.'_'.time().'.pdf';
            $makePdf['passenger_name'] = $data->ticketBooking->passenger_name;
            $makePdf['passenger_number'] = $data->ticketBooking->phone;
            $makePdf['next_of_kin_name'] = $data->ticketBooking->next_of_kin_name;
            $makePdf['next_of_kin_phone'] = $data->ticketBooking->next_of_kin_phone;
            $makePdf['pnr'] = $data->ticketBooking->pnr;
            $makePdf['coach'] = $data->ticketBooking->fleetRegistration->reg_no;
            $makePdf['departureTime'] = date('h:i A', strtotime($data->ticketBooking->booking_date));
            $makePdf['journeyDate'] = date('d M Y', strtotime($data->ticketBooking->booking_date));
            $makePdf['seat_fare'] = $data->ticketBooking->price;
            $makePdf['seats'] = $data->ticketBooking->seat_number;
            $makePdf['from'] = $data->ticketBooking->tripRoute->start_point_name;
            $makePdf['boarding'] = $data->ticketBooking->boarding;

            $makePdf['total_fare'] = $data->ticketBooking->total_fare;
            $makePdf['to'] = $data->ticketBooking->tripRoute->end_point_name;
            $makePdf['reportingTime'] = date('h:i A', strtotime($data->ticketBooking->updated_at));

            $makePdf['issueOn'] = date('d M Y', strtotime($data->ticketBooking->updated_at));
            $makePdf['issueBy'] = ($data->ticketBooking->agent_id == null) ? $gnl->sitename : $data->ticketBooking->agent->username;
            
            try{
                            $to_name = $data->ticketBooking->passenger_name;
                            $to_email = $data->ticketBooking->email;
                           Mail::send('generatePrint', $makePdf, function($message) use ($to_name, $to_email) {
                            $message -> to($to_email, $to_name)
                                -> subject('Your Boarding Pass');
                            $message->from(env('MAIL_FROM_ADDRESS', 'notification@jemkaptransport.com'),'Your Boarding Pass');
                   });
                 }
                 catch (\Exception $e) {
                    
                 }

            return view('generatePrint', $makePdf);
        }
        abort(404);
    }


    public function ticketPrint()
    {
        $data['page_title'] = "Ticket Print";
        return view('front.ticket-print', $data);
    }
    public function getTicketPrint(Request $request)
    {
        // dd($request->all());
        $this->validate($request,[
            'pnr' => 'required',
        ],[
            'pnr.required' => 'PNR / Ticket Number must not be empty!'
        ]);

        $ticketBooking =  TicketBooking::where('pnr',$request->pnr)->where('user_id',Auth::user()->id)->first();
        if($ticketBooking){
            $token =  $request->_token;
            $LogPdf = new LogPdf();
            $LogPdf->ticket_id = $ticketBooking->id;
            $LogPdf->pdf_name = $ticketBooking->pnr.".pdf";
            $LogPdf->token = $token;
            $LogPdf->save();
            return redirect()->route('getTicket.pdf',$token);
        }
        $notify = array('message' => "Sorry Could n't Found This Ticket", 'alert-type' => 'error');
        return back()->with($notify);

    }

    public function checkMail(Request $request)
    {
        $user = User::where('email',$request->email)->first();
        if($user)
        {
            return response()->json(['status' => 'existEmail' ]);
        }
    }
    public function checkUsername(Request $request)
    {
        $user = User::where('username',$request->username)->first();
        if($user)
        {
            return response()->json(['status' => 'existUsername' ]);
        }
    }



    public function cronNotPay()
    {
        $ticketBooking =  TicketBooking::where('payment_status',0)->where('pay_endtime', '<',Carbon::now())->get();

        foreach ($ticketBooking as $data)
        {
            $data->delete();
        }
    }

    public function cronTripclose()
    {
        $tripAssign =  TripAssign::where('end_date','<',Carbon::now())->where('status', '!=',2)->get();

        foreach ($tripAssign as $data)
        {
            $data->status = 2;

            $data->update();
        }
    }



}

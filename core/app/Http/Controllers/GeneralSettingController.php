<?php

namespace App\Http\Controllers;

use App\Trx;
use App\Wallet;
use App\WithdrawLog;
use Illuminate\Http\Request;
use Auth;
use App\GeneralSettings;
use App\User;
use App\Admin;
use App\UserLogin;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use File;
use Image;
use App\Deposit;


class GeneralSettingController extends Controller
{

	public function __construct(){
		$Gset = GeneralSettings::first();
		$this->sitename = $Gset->sitename;
	}
	public function index(){
		$data['page_title'] = "Basic Settings";
		return view('admin.loginform', $data);
	}
	public function GenSetting(){
		$data['page_title'] = 'General Settings';
			$data['general'] = GeneralSettings::first();
		return view('admin.webcontrol.general', $data);
	}

	public function UpdateGenSetting(Request $request)
    {
        $request->validate([
            'currency' => 'required',
            'sitename' => 'required',
            'decimal' => 'required|integer|min:1',
            'addtime' => 'required|integer|min:0',
            'cancel_endtime' => 'required|integer|min:0',
        ]);

        $gs = GeneralSettings::first();
        $in = Input::except('_token');
        $in['color'] = ltrim($request->color,'#');
        $in['registration'] = $request->registration == 'on' ? '1' : '0';
        $in['email_verification'] = $request->email_verification == 'on' ? '1' : '0';
        $in['sms_verification'] = $request->sms_verification == 'on' ? '1' : '0';
        $in['email_notification'] = $request->email_notification == 'on' ? '1' : '0';
        $in['sms_notification'] = $request->sms_notification == 'on' ? '1' : '0';
        $res = $gs->fill($in)->save();

			if ($res) {
                $notification = array('message' => 'Updated Successfully!', 'alert-type' => 'success');
                return back()->with($notification);
			}else{
                $notification = array('message' => 'Problem With Updating!', 'alert-type' => 'error');
                return back()->with($notification);
			}
	}


    public function changePassword()
    {
        $data['page_title'] = "Change Password";
        return view('admin.webcontrol.change_password',$data);
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:5',
            'password_confirmation' => 'required|same:new_password',
        ]);

        $user = Auth::guard('admin')->user();

        $oldPassword = $request->old_password;
        $password = $request->new_password;
        $passwordConf = $request->password_confirmation;

        if (!Hash::check($oldPassword, $user->password) || $password != $passwordConf) {
            $notification =  array('message' => 'Password Do not match !!', 'alert-type' => 'error');
            return back()->with($notification);
        }elseif (Hash::check($oldPassword, $user->password) && $password == $passwordConf)
        {
            $user->password = bcrypt($password);
            $user->save();
            $notification =  array('message' => 'Password Changed Successfully !!', 'alert-type' => 'success');
            return back()->with($notification);
        }
    }


    public function profile()
    {
        $data['admin'] = Auth::guard('admin')->user();
        $data['page_title'] = "Profile Settings";
        return view('admin.webcontrol.profile',$data);
    }

    public function updateProfile(Request $request)
    {
        $data = Admin::find($request->id);
        $request->validate([
            'name' => 'required|max:20',
            'email' => 'required|max:50|unique:admins,email,'.$data->id,
            'mobile' => 'required|regex:/(01)[0-9]{9}/',
        ]);

        $in = Input::except('_method','_token');
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = 'admin_'.time().'.jpg';
            $location = 'assets/admin/img/' . $filename;
            Image::make($image)->resize(300,300)->save($location);
            $path = './assets/admin/img/';
            File::delete($path.$data->image);
            $in['image'] = $filename;
        }
        $data->fill($in)->save();

        $notification =  array('message' => 'Profile Update Successfully', 'alert-type' => 'success');
        return back()->with($notification);
    }


    public function users()
    {
        $data['page_title'] = "User Manage";
        $data['users'] = User::latest()->paginate(20);
        return view('admin.users.index', $data);
    }

    public function userSearch(Request $request)
    {
        $this->validate($request,
            [
                'search' => 'required',
            ]);
        $data['users'] = User::where('username', 'like', '%' . $request->search . '%')->orWhere('email', 'like', '%' . $request->search . '%')->orWhere('fname', 'like', '%' . $request->search . '%')->orWhere('lname', 'like', '%' . $request->search . '%')->get();
        $data['page_title'] = "Search User";
        return view('admin.users.search', $data);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function singleUser($id)
    {
        $user = User::findorFail($id);
        $data['page_title'] = "User Manage";
        $data['user'] = $user;
        $data['last_login'] = UserLogin::whereUser_id($user->id)->orderBy('id', 'desc')->first();
        return view('admin.users.single', $data);
    }

    public function userPasschange(Request $request, $id)
    {
        $user = User::findorFail($id);
        $this->validate($request,
            [
                'password' => 'required|string|min:5|confirmed'
            ]);
        if ($request->password == $request->password_confirmation) {
            $user->password = bcrypt($request->password);
            $user->save();
            $msg = 'Password Changed By Admin. New Password is: ' . $request->password;
            send_email($user->email, $user->username, 'Password Changed', $msg);

            $notification = array('message' => 'Password Changed', 'alert-type' => 'success');
            return back()->with($notification);
        } else {
            $notification = array('message' => 'Password Not Matched', 'alert-type' => 'warning');
            return back()->with($notification);
        }
    }


    public function statupdate(Request $request, $id)
    {
        $user = User::findorFail($id);
        $this->validate($request, [
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:users,email,' . $user->id,
            'phone' => 'required|string|max:255|unique:users,phone,' . $user->id,
        ],[
            'fname.required' => 'First name field is required!',
            'lname.required' => 'Last name field is required!',
        ]);
        $in = Input::except('_token', '_method');
        $user['status'] = $request->status == "1" ? 1 : 0;
        $user['email_verify'] = $request->email_verify == "1" ? 1 : 0;
        $user['image_verify'] = $request->image_verify == "1" ? 1 : 0;
        $user['cnic_verify'] = $request->cnic_verify == "1" ? 1 : 0;
        $user['driver_licence_verify'] = $request->driver_licence_verify == "1" ? 1 : 0;
        $user['phone_verify'] = $request->phone_verify == "1" ? 1 : 0;
        $user->fill($in)->save();

        $msg = 'Your Profile Updated by Admin';
        send_email($user->email, $user->username, 'Profile Updated', $msg);

        $notification = array('message' => 'User Profile Updated Successfully!', 'alert-type' => 'success');
        return back()->with($notification);
    }

    public function userEmail($id)
    {
        $data['user'] = User::findorFail($id);
        $data['page_title'] = "Send  Email To User";
        return view('admin.users.email', $data);
    }

    public function sendemail(Request $request)
    {

        $this->validate($request,
            [
                'emailto' => 'required|email',
                'reciver' => 'required',
                'subject' => 'required',
                'emailMessage' => 'required'
            ]);
        $to = $request->emailto;
        $name = $request->reciver;
        $subject = $request->subject;
        $message = $request->emailMessage;

        send_email($to, $name, $subject, $message);
        $notification = array('message' => 'Mail Sent Successfully!', 'alert-type' => 'success');
        return back()->with($notification);
    }

    public function banusers()
    {
        $data['page_title'] = "Banned User";
        $data['users'] = User::where('status', '0')->orderBy('id', 'desc')->paginate(10);
        return view('admin.users.banned', $data);
    }

    public function loginLogsByUsers($id)
    {
        $user =  User::findorFail($id);
        $logs = UserLogin::where('user_id', $id)->orderBy('id', 'DESC')->paginate(30);
        $page_title = 'Login Information';
        return view('admin.users.login-logs-by-users', compact('logs', 'page_title','user'));
    }
    public function ManageBalanceByUsers($id)
    {
        $user =  User::findorFail($id);
        $page_title = "ADD / SUBSTRUCT BALANCE";
        return view('admin.users.balance-manage', compact('user', 'page_title'));
    }

    public function saveBalanceByUsers(Request $request)
    {
        $basic = GeneralSettings::first();

        $user = User::findorFail($request->id);
        $this->validate($request, [
            'amount' => 'required|numeric|min:0',
            'message' => 'required'
        ]);

        if($request->operation == "on")
        {
            $user->balance += $request->amount;
            $user->save();

            $txt = $request->amount . ' ' . $basic->currency . ' credited in your account.' .'<br>'.  $request->message;
            notify($user, 'Credited our Account', $txt);
        }else{
            if(($user->balance >0) && ($request->amount < $user->balance) )
            {
                $user->balance -= $request->amount;
                $user->save();

                $txt = $request->amount . ' ' . $basic->currency . ' credited in your account.' .'<br>'. $request->message;
                notify($user, 'Debited Your Account', $txt);

            }else{
                $notification = array('message' => 'Insufficient Balance To Substract!', 'alert-type' => 'error');
                return back()->with($notification);
            }
        }

        $notification = array('message' => 'Deposit Successfully Completed!', 'alert-type' => 'success');
        return back()->with($notification);
    }


    public function loginLogs($user = 0)
    {
        $user = User::findorFail($user);
        if ($user) {
            $logs = UserLogin::where('user_id', $user->id)->orderBy('id', 'DESC')->paginate(20);
            $page_title = 'Login Logs Of ' . $user->name;
        } else {
            $logs = UserLogin::orderBy('id', 'DESC')->paginate(20);
            $page_title = 'User Login Logs';
        }
        return view('admin.users.login-logs', compact('logs', 'page_title'));
    }


    public function userTrans($id)
    {
        $user = User::findorFail($id);
        $page_title = "$user->username - All Transaction";
        $deposits = Trx::whereUser_id($id)->paginate(30);
        return view('admin.users.user-trans', compact('deposits', 'page_title'));
    }
    public function userDeposit($id)
    {
        $user = User::findorFail($id);
        $page_title = "$user->username - All Deposit";
        $deposits = Deposit::whereUser_id($id)->whereStatus(1)->latest()->paginate(30);
        return view('admin.users.user-deposit-log', compact('deposits', 'page_title'));
    }
    public function userWithdraw($id)
    {
        $user = User::findorFail($id);
        $page_title = "$user->username - All Withdraw Request";
        $deposits = WithdrawLog::whereUser_id($id)->where('status','!=',0)->latest()->paginate(30);
        return view('admin.users.user-withdraw', compact('deposits', 'page_title'));
    }

    public function userDocPren()
    {
        $data['page_title'] = "Pending User's Document Verification";
        $data['users'] = User::where('doc_verify', '2')->orderBy('id', 'desc')->paginate(20);
        return view('admin.users.doc', $data);
    }

    public function userDoc(Request $request, $id)
    {
        $user = User::findorFail($id);
        $user->doc_verify = $request->status;
        $user->update();

        $notification = array('message' => 'Changed Successfully!', 'alert-type' => 'success');
        return back()->with($notification);
    }


}

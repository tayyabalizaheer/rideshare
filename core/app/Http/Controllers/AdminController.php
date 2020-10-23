<?php

namespace App\Http\Controllers;

use App\Currency;
use App\Deposit;
use App\Gateway;
use App\Post;
use App\Subscriber;
use App\User;
use App\WithdrawLog;
use App\WithdrawMethod;

use App\Enquiry;
use App\TicketCancel;
use App\TicketPrice;
use App\FleetRegistration;
use App\TripRoute;



use Illuminate\Http\Request;
use Auth;
use App\GeneralSettings;

class AdminController extends Controller
{

	public function __construct(){
		$Gset = GeneralSettings::first();
		$this->sitename = $Gset->sitename;
	}

	public function dashboard()
    {
        $data['page_title'] = 'DashBoard';


        $data['totalUsers'] = User::count();
        $data['banUsers'] = User::where('status',0)->count();
        $data['email_verify'] = User::where('email_verify',1)->count();
        $data['gateway'] = Gateway::count();
        $data['deposit'] = Deposit::where('status',1)->count();

        $data['withdraw'] = WithdrawMethod::count();
        $data['withdrawReq'] = WithdrawLog::whereStatus(1)->count();
        $data['withdrawSuc'] = WithdrawLog::whereStatus(2)->count();
        $data['withdrawRefund'] = WithdrawLog::whereStatus(-2)->count();

        

        /*Enquery*/
        $data['fleetRegistration'] =  FleetRegistration::count();
        $data['enquiries'] =  Enquiry::where('read',0)->count();
        $data['ticketCancel'] =  TicketCancel::where('status',0)->count();
        $data['tripRoute'] =  TripRoute::count();



        $data['subscribers'] = Subscriber::count();
        $data['blog'] = Post::count();
        $data['Gset'] = GeneralSettings::first();
        return view('admin.dashboard', $data);
    }







	public function logout()    {
		Auth::guard('admin')->logout();
		session()->flash('success', 'You have been logged out!!');
		return redirect('/admin');
	}

}

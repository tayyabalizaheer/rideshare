<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\GeneralSettings;

class AdminLoginController extends Controller
{


	public function __construct(){
		$Gset = GeneralSettings::first();
		$this->sitename = $Gset->sitename;
	}


	public function index(){

		if(Auth::guard('admin')->check()){
			return redirect()->route('admin.dashboard');
		}
		$data['page_title'] = "Admin";
		return view('admin.loginform', $data);
	}

	public function authenticate(Request $request){
		if (Auth::guard('admin')->attempt([
			'username' => strtolower(trim($request->username)),
			'password' => $request->password,
		])) {
		    return redirect()->route('admin.dashboard');
		}
        session()->flash('error', 'Username Or Password don\'t match!!');
        return back();

	}
}

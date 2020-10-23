<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\UserLogin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;
use Session;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = 'search';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */


    public function username()
    {
        return 'username';
    }
    public function authenticated(Request $request, $user)
    {

        if($user->status == 0){
            $this->guard()->logout();
            $notification =  array('message' => 'Sorry Your Account is Block Now.!','alert-type' => 'warning');
            return redirect('/login')->with($notification);
        }

        else if ($user->email_verify != '1') {
            $data['page_title'] = "Authorization";
            return view('user.authorization', $data);
        } 
        $user->login_time = Carbon::now();
        $user->save();
        $ul['user_id'] = $user->id;
        $ul['user_ip'] =  request()->ip();
//        $ul['location'] = $city.(" - $area - ").$country .(" - $code ");
//        $ul['details'] = $browser.' on '.$os_platform;
        UserLogin::create($ul);
    }

    public function logout(Request $request)
    {

        $user = User::findOrFail(Auth::id());

        if(Auth::user()->tauth == 1)
        {
            $user['tfver'] = 0;
        }else{
            $user['tfver'] = 1;

        }
        $user->save();
        Auth::guard()->logout();
        return redirect()->route('login')->with('logout','You have been logged out!');
    }

}

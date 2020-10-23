<?php

namespace App\Http\Controllers\Auth;

use App\Etemplate;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Mail;

use App\GeneralSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;
use Carbon\Carbon;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/user/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {


        return Validator::make($data, [
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|numeric|min:8|unique:users',
            'username' => 'required|min:5|unique:users|regex:/^\S*$/u',
            'password' => 'required|string|min:4|confirmed',
        ],
            [
                'fname.required' => 'First Name is required!!',
                'lname.required' => 'Last Name is required!!',
                'phone.required' => 'Contact Number must not be empty!!',
                'email.required' => 'Email Address must not be empty!!',
                'password.confirmed' => 'Password Don\'t match!!',
            ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $basic = GeneralSettings::first();
        if ($basic->email_verification == 1) {
            $email_verify = 0;
        } else {
            $email_verify = 1;
        }

        
        $verification_code  = rand(000000,999999);
        $email_time = Carbon::parse()->addMinutes(5);
        $phone_time = Carbon::parse()->addMinutes(5);
        $user_registration_no = $this->generateRandomString(3).rand(0000,9999).$this->generateRandomString(3);

        $user = User::create([
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'email' => strtolower(trim($data['email'])),
            'phone' => $data['phone'],
            'username' => strtolower(trim($data['username'])),
            'email_verify' => $email_verify,
            'verification_code' => $verification_code,
            'email_time' => $email_time,
            'user_registration_no' => $user_registration_no,
            'password' => Hash::make($data['password']),
        ]);

        return $user;

    }
    protected function generateRandomString($length = 10) {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    protected function registered(Request $request, $user)
    {
        $basic = GeneralSettings::first();

            $email_code = $user->verification_code;
            $to_name = $user->fname;
            $to_email = $user->email;
            $data['code'] = $email_code;
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
    }


    public function sendSms($to, $text)
    {

        $temp = Etemplate::first();
        $appi =  $temp->smsapi;
        $text = urlencode($text);
        $appi = str_replace("{{number}}", $to, $appi);
        $appi = str_replace("{{message}}", $text, $appi);
        $result = file_get_contents($appi);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Deposit;
use App\Translog;
use App\User;
use App\Package;
use App\General;

class DepositController extends Controller
{
    public function __construct()
    {

    }
    
      public function index()
    {
    	$deposits = Deposit::where('status', 1)->orderBy('id', 'desc')->get();
    	$page_title = "Deposit  Log";

    	return view('admin.deposit.deposits', compact('deposits','page_title'));
    }

    public function requests()
    {
    	$deposits = Deposit::where('status', 0)->orderBy('id', 'desc')->get();
        $page_title = "DEPOSIT REQUESTS";
    	return view('admin.deposit.requests', compact('deposits','page_title'));
    }

     public function approve(Request $request, $id)
    {
        $deposit = Deposit::findorFail($id);

        $deposit['status'] = 1;
        $deposit->save();

        $user = User::find($deposit['user_id']);
        $user['balance'] = $user->balance + $deposit['amount'];
        $user->save();

        if ($user->refid != 0)
        {
            $pack = Package::first();
            $gnl= General::first();
           $refer = User::find($user->refid);
           $coms = ($gnl->refcom*$deposit['amount'])/100;
           $refer['balance'] = $refer->balance + $coms;
           $refer->save();

            $rlog['user_id'] = $refer->id;
           $rlog['trxid'] = 'TRX-' . time() . rand(10, 99);
           $rlog['amount'] = $coms;
           $rlog['balance'] = $refer->balance;
           $rlog['type'] = 1;
           $rlog['details'] = 'Referal Commision';
           Translog::create($rlog);
        }

        $tlog['user_id'] = $user->id;
       $tlog['trxid'] = 'TRX-' . time() . rand(10, 99);
       $tlog['amount'] = $deposit['amount'];
       $tlog['balance'] = $user->balance;
       $tlog['type'] = 1;
       $tlog['details'] = 'Deposit Successfull';
       Translog::create($tlog);

        $msg =  'Your Deposit Processed Successfully';
        send_email($user->email, $user->fname, 'Purchase Processed', $msg);
        $sms =  'Your Deposit Processed Successfully';
        send_sms($user->phone, $sms);


        $notification = array('message' => 'Deposit Request Approved Successfully!!', 'alert-type' => 'success');
        return back()->with($notification);


    }

    public function destroy(Deposit $deposit)
    {
        $user = User::find($deposit['user_id']);

        $msg =  'Your Deposit Request canceled by Admin';
        send_email($user->email, $user->username, 'Deposit Canceled', $msg);
        $sms =  'Your Deposit Request canceled by Admin';
        send_sms($user->mobile, $sms);

        $deposit['status'] = 2;
        $deposit->save();

        $notification = array('message' => 'Deposit Canceled Successfully!!', 'alert-type' => 'success');
        return back()->with($notification);
    }
}

<?php

namespace App\Http\Controllers;

use App\Agent;
use App\Trx;
use App\Wallet;
use Illuminate\Http\Request;
use App\WithdrawMethod;
use App\WithdrawLog;
use App\User;
use App\GeneralSettings;
use Illuminate\Support\Facades\Input;

class WithdrawController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $page_title = "Withdraw Methods";
        $withdarws = WithdrawMethod::latest()->get();
        return view('admin.withdraw.index', compact('withdarws', 'page_title'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [

            'id' => 'required',
            'name' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            'fix' => 'required|numeric',
            'percent' => 'required|numeric',
            'withdraw_max' => 'required|numeric',
            'withdraw_min' => 'required|numeric',

        ]);

        $in = Input::except('_token', 'image');
        if ($request->hasFile('image')) {
            $in['image'] = uniqid() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move('assets/images', $in['image']);
        }

        WithdrawMethod::create($in);

        $notification = array('message' => 'Withdraw Settings Updated Successfully!', 'alert-type' => 'success');
        return back()->with($notification);
    }

    public function withdrawUpdateSettings(Request $request)
    {
        $data = WithdrawMethod::find($request->id);

        $this->validate($request, [

            'id' => 'required',
            'name' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            'fix' => 'required|numeric',
            'percent' => 'required|numeric',
            'withdraw_max' => 'required|numeric',
            'withdraw_min' => 'required|numeric',

        ]);



        $in = Input::except('_token', 'image');
        if ($request->hasFile('image')) {
            $path = 'assets/images/' . $data->image;
            if (file_exists($path)) {
                @unlink($path);
            }
            $data['image'] = uniqid() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move('assets/images', $data['image']);
        }
        $data->fill($in)->save();

        $notification = array('message' => 'Withdraw Settings Updated Successfully!', 'alert-type' => 'success');
        return back()->with($notification);
    }

    public function requests()
    {
        $withdrawLog = WithdrawLog::latest()->where('status', 1)->paginate(20);
        $page_title = " Withdraw Request";
        return view('admin.withdraw.requests', compact('withdrawLog', 'page_title'));
    }

    public function requestsApprove()
    {
        $bits = WithdrawLog::latest()->where('status', 2)->paginate(20);
        $page_title = " Withdraw Approved";
        return view('admin.withdraw.history', compact('bits', 'page_title'));
    }

    public function requestsRefunded()
    {
        $bits = WithdrawLog::latest()->where('status', -2)->paginate(20);
        $page_title = " Withdraw Refunded";
        return view('admin.withdraw.history', compact('bits', 'page_title'));
    }

    public function approve(Request $request, $id)
    {
        $basic = GeneralSettings::first();
        $withdr = WithdrawLog::findorFail($id);
        $withdr['status'] = 2;
        $withdr->save();

        $notification = array('message' => 'Withdraw Request Approved Successfully!', 'alert-type' => 'success');
        return back()->with($notification);
    }

    public function refundAmount(Request $request)
    {
        $basic = GeneralSettings::first();
        $withdr = WithdrawLog::findorFail($request->id);
        $withdr['status'] = -2;
        $withdr->save();

        if($withdr->type == 1){
            $user =  User::findOrFail($withdr->user_id);
            $user->balance = round(($user->balance  + $withdr->net_amount),$basic->decimal);
            $user->save();
            $tr = 'TRX-' . time() . rand(10, 99);
            Trx::create([
                'user_id' => $withdr->user_id,
                'amount' => $withdr->net_amount,
                'main_amo' => round($user->balance, $basic->decimal),
                'charge' => 0,
                'type' => '+',
                'role' => 1,
                'title' => $withdr->net_amount . " $basic->currency Refunded.",
                'trx' => $tr,
            ]);

            $msg = 'Your withdraw amount ' . $withdr->net_amount . ' ' . $basic->currency . ' refunded.';
            send_email($user->email, $user->username, 'Withdraw Amount Refunded', $msg);
            send_sms($user->phone, $msg);

            $notification = array('message' => 'Withdraw Amount Refund Successfully!', 'alert-type' => 'success');
            return back()->with($notification);
        }
        elseif($withdr->type == 2){
            $agent =  Agent::findOrFail($withdr->user_id);
            $agent->balance = round(($agent->balance  + $withdr->net_amount),$basic->decimal);
            $agent->save();

            $tr = 'TRX-' . time() . rand(10, 99);
            Trx::create([
                'user_id' => $withdr->user_id,
                'amount' => $withdr->net_amount,
                'main_amo' => round($agent->balance, $basic->decimal),
                'charge' => 0,
                'type' => '+',
                'role' => 2,
                'title' => $withdr->net_amount . " $basic->currency Refunded.",
                'trx' => $tr,
            ]);

            $msg = 'Your withdraw amount ' . $withdr->net_amount . ' ' . $basic->currency . ' refunded.';
            send_email($agent->email, $agent->username, 'Withdraw Amount Refunded', $msg);
            send_sms($agent->phone, $msg);

            $notification = array('message' => 'Withdraw Amount Refund Successfully!', 'alert-type' => 'success');
            return back()->with($notification);
        }
        abort(404);

    }

}

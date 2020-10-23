<?php

namespace App\Http\Controllers;

use App\Currency;
use App\Milestone;
use App\Report;
use App\Subscriber;
use App\Trx;
use Illuminate\Http\Request;
use Auth;
use App\GeneralSettings;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;

use Validator;

class DashboardController extends Controller
{
    public function __construct()
    {

    }

    public function sendMail()
    {
        $data['page_title'] = 'Mail to Subscribers';
        return view('admin.pages.subscriber-email', $data);
    }

    public function sendMailsubscriber(Request $request)
    {
        $this->validate($request,
            [
                'subject' => 'required',
                'emailMessage' => 'required'
            ]);
        $subscriber = Subscriber::whereStatus(1)->get();
        foreach ($subscriber as $data) {
            $to = $data->email;
            $name = substr($data->email, 0, strpos($data->email, "@"));
            $subject = $request->subject;
            $message = $request->emailMessage;
            send_email($to, $name, $subject, $message);
        }
        $notification = array('message' => 'Mail Sent Successfully!', 'alert-type' => 'success');
        return back()->with($notification);
    }

    public function manageSubscribers()
    {
        $data['page_title'] = 'Subscribers';
        $data['events'] = Subscriber::latest()->paginate(30);
        return view('admin.pages.subscriber', $data);
    }

    public function updateSubscriber(Request $request)
    {
        $mac = Subscriber::findOrFail($request->id);
        $mac['status'] = $request->status;
        $res = $mac->save();

        if ($res) {
            $notification = array('message' => 'Updated Successfully!', 'alert-type' => 'success');
            return back()->with($notification);
        } else {
            $notification = array('message' => 'Problem With Updating!', 'alert-type' => 'error');
            return back()->with($notification);
        }
    }


}

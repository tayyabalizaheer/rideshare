<?php

namespace App\Http\Controllers;

use App\GeneralSettings;
use App\LogPdf;
use App\TicketBooking;
use App\TicketCancel;
use App\TicketPrice;
use App\TripAssign;
use App\TripLocation;
use App\TripRoute;
use App\Trx;
use App\User;
use Illuminate\Http\Request;

class ManageTripController extends Controller
{
    public function reqeustCancellation(){
        $data['page_title'] = "Ticket Cancel Request";
        $data['ticket_cancels'] = TicketCancel::latest()->paginate(25);
        return view('admin.pages.request-cancel',$data);
    }

    public function reqeustCancellationAction(Request $request)
    {
        $basic = GeneralSettings::first();
        if($request->sbtn == "yes")
        {
            $ticCancel =  TicketCancel::findOrFail($request->id);
            $ticCancel->amount = round($request->amount,$basic->decimal);
            $ticCancel->charge = round($request->charge,$basic->decimal);
            $ticCancel->status = 1;

            $ticBook = TicketBooking::findOrFail($ticCancel->ticket_booking_id);
            $ticBook->status  = -1; // trip cancel
            $ticBook->save();

            $user = User::findOrFail($ticCancel->user_id);
            $user->balance +=  round($request->amount,$basic->decimal);
            $user->save();

           $ticCancel->save();



           Trx::create([
               'user_id' => $user->id,
               'amount' => $ticCancel->amount,
               'main_amo' => $user->balance,
               'charge' => $ticCancel->charge,
               'type' => '+',
               'role' => 1,
               'title' => date('D d M Y h:i A', strtotime($ticBook->booking_date))." (".$ticBook->tripRoute->start_point_name."-".$ticBook->tripRoute->end_point_name.") Trip has been Cancelled <br> PNR: ".$ticBook->pnr,
               'trx' => 'TRX-'.rand(000000,999999).rand(000000,999999),
           ]);


            $msg = date('D d M Y h:i A', strtotime($ticBook->booking_date))." (".$ticBook->tripRoute->start_point_name."-".$ticBook->tripRoute->end_point_name.") Trip has been Cancelled <br> PNR: ".$ticBook->pnr;
            $msg .= "<br> ".round($ticCancel->amount, $basic->decimal) ." $basic->currency  added in your account";
            $msg .= " Your current balance ".round($user->balance, $basic->decimal) ." $basic->currency";
            send_email($user->email, $user->username, 'Ticket Cancel Request Approved', $msg);
            send_sms($user->phone, $msg);

           $notify = array('message' => 'Ticket request has been approved  successfully', 'alert-type' => 'success');
        }elseif($request->sbtn == "reject"){

            $ticCancel =  TicketCancel::findOrFail($request->id);
            $ticCancel->status = -1;

            $ticBook = TicketBooking::findOrFail($ticCancel->ticket_booking_id);

            $user = User::findOrFail($ticCancel->user_id);
            $ticCancel->save();

            $msg = date('D d M Y h:i A', strtotime($ticBook->booking_date))." (".$ticBook->tripRoute->start_point_name."-".$ticBook->tripRoute->end_point_name.") Trip  Cancelation has been rejected by Admin <br> PNR: ".$ticBook->pnr;
            send_email($user->email, $user->username, 'Ticket Cancel Request', $msg);
            send_sms($user->phone, $msg);

            $notify = array('message' => 'Ticket request has been rejected  successfully', 'alert-type' => 'success');
        }
        return back()->with($notify);
    }



}

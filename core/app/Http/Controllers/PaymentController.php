<?php

namespace App\Http\Controllers;

use App\Agent;
use App\Currency;
use App\Deposit;
use App\LogPdf;
use App\TicketBooking;
use PDF;
use App\Trx;
use App\Wallet;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Auth;
use App\User;
use App\Gateway;
use App\GeneralSettings;

use Session;
use Stripe\Stripe;
use Stripe\Token;
use Stripe\Charge;
use App\Lib\coinPayments;
use App\Lib\BlockIo;
use App\Lib\CoinPaymentHosted;
use Illuminate\Support\Facades\Mail;


class PaymentController extends Controller
{

    public function userDataUpdate($data)
    {
        if ($data->status == 0) {
            $data['status'] = 1;
            $data->update();


            $gnl = GeneralSettings::first();


            if ($data->role == 2)
            {

                $agent  = Agent::where('id',$data->user_id)->first();
                $agent->balance= $agent->balance + $data->amount;
                $agent->update();

                Trx::create([
                    'user_id' => $agent->id,
                    'amount' => $data->amount,
                    'main_amo' => round($agent->balance,$gnl->decimal),
                    'charge' => 0,
                    'role' => 2,
                    'type' => '+',
                    'title' => 'Deposit Via ' . $data->gateway->name,
                    'trx' => $data->trx
                ]);

                $txt = $data->amount . ' ' . $gnl->currency . ' Deposited Successfully Via ' . $data->gateway->name;
                send_email($agent->email, $agent->username, 'Deposit Successful', $txt);
                send_sms($agent->phone, $txt);
            }else{
                $ticketBooking = TicketBooking::where('id',$data->ticket_booking_id)->first();

                if(isset($ticketBooking))
                {
                    $ticketBooking->payment_status = 1;
                    $saveTicket =  $ticketBooking->update();
                    Trx::create([
                        'user_id' => ($data->user_id != null) ?? null,
                        'email' => $ticketBooking->email,
                        'amount' => $data->amount,
                        'main_amo' => null,
                        'charge' => 0,
                        'type' => '+',
                        'title' => 'Payment Paid Via ' . $data->gateway->name,
                        'trx' => $data->trx
                    ]);


                    if($saveTicket){
                        $pdfname = $ticketBooking->pnr.'_'.time().'.pdf';
                        $logPdf['ticket_id'] = $ticketBooking->id;
                        $logPdf['pdf_name'] = $pdfname;
                        $logPdf['token'] = strtolower(str_random(60));
                        $pdfId = LogPdf::create($logPdf)->id;
                    }
                    $pdfToken = LogPdf::where('id',$pdfId)->first();
                    $url = route('getTicket.pdf',[$pdfToken->token]);

                    $txt = $data->amount . ' ' . $gnl->currency . ' Payment Paid Successfully Via ' . $data->gateway->name ."<br>";
                    $txt .= "Your Ticket link: <a href='$url'>$url</a>";
                    send_email($ticketBooking->email, $ticketBooking->passenger_name, 'Payment Paid Successfully', $txt);
                    send_sms($ticketBooking->phone, $txt);
                }

            }



        }
    }

    public function depositConfirm(Request $request)
    {

        $gnl = GeneralSettings::first();

        $track = Session::get('Track');

        $data = Deposit::where('trx', $track)->orderBy('id', 'DESC')->first();

        if (is_null($data)) {
            return redirect()->route('deposit')->with('alert', 'Invalid Deposit Request');
        }
        if ($data->status != 0) {
            return redirect()->route('deposit')->with('alert', 'Invalid Deposit Request');
        }

        $gatewayData = Gateway::where('id', $data->gateway_id)->first();


        if ($data->gateway_id == 104) {
            $page_title = $gatewayData->name;
            return view('agent.payment.skrill', compact('page_title', 'gnl', 'gatewayData', 'data'));
        } 


    }


    public function ticketConfirm(Request $request)
    {
        $gnl = GeneralSettings::first();

         $track = Session::get('Track');

        $data = Deposit::where('trx', $track)->orderBy('id', 'DESC')->first();

        if (is_null($data)) {
            return redirect()->route('homepage')->with('alert', 'Invalid Deposit Request');
        }
        if ($data->status != 0) {
            return redirect()->route('homepage')->with('alert', 'Invalid Deposit Request');
        }

        $gatewayData = Gateway::where('id', $data->gateway_id)->first();


        if ($data->gateway_id == 101) {
            $page_title = $gatewayData->name;
            $paypal['amount'] = $data->usd;
            $paypal['sendto'] = $gatewayData->val1;
            $paypal['track'] = $track;
            return view('front.payment.paypal', compact('paypal', 'gnl', 'page_title'));

        }  elseif ($data->gateway_id == 104) {
            $page_title = $gatewayData->name;
            // dd([$gatewayData,$data]);
            return view('front.payment.skrill', compact('page_title', 'gnl', 'gatewayData', 'data'));
        }

    }




   
    public function skrillIPN()
    {
        $track = Session::get('Track');
        $skrill = Gateway::find(104);
        $concatFields = $_POST['merchant_id']
            . $_POST['transaction_id']
            . strtoupper(md5($skrill->val2))
            . $_POST['mb_amount']
            . $_POST['mb_currency']
            . $_POST['status'];

        $data = Deposit::where('trx', $track)->orderBy('id', 'DESC')->first();
        $gnl = GeneralSettings::first();

        if (strtoupper(md5($concatFields)) == $_POST['md5sig'] && $_POST['status'] == 2 && $_POST['pay_to_email'] == $skrill->val1 && $data->status = '0') {
            //Update User Data
            $this->userDataUpdate($data);

        }
    }

   
    public function sendmail($id)
    {
        $data = TicketBooking::where('id', $id)->first();
        $gnl = GeneralSettings::first();
        if ($data){
            $makePdf['passenger_name'] = $data->passenger_name;
            $makePdf['passenger_number'] = $data->phone;
            $makePdf['next_of_kin_name'] = $data->next_of_kin_name;
            $makePdf['next_of_kin_phone'] = $data->next_of_kin_phone;
            $makePdf['pnr'] = $data->pnr;
            $makePdf['coach'] = $data->fleetRegistration->reg_no;
            $makePdf['departureTime'] = date('h:i A', strtotime($data->booking_date));
            $makePdf['journeyDate'] = date('d M Y', strtotime($data->booking_date));
            $makePdf['seat_fare'] = $data->price;
            $makePdf['seats'] = $data->seat_number;
            $makePdf['from'] = $data->tripRoute->start_point_name;
            $makePdf['boarding'] = $data->boarding;

            $makePdf['total_fare'] = $data->total_fare;
            $makePdf['to'] = $data->tripRoute->end_point_name;
            $makePdf['reportingTime'] = date('h:i A', strtotime($data->updated_at));

            $makePdf['issueOn'] = date('d M Y', strtotime($data->updated_at));
            $makePdf['issueBy'] = ($data->agent_id == null) ? $gnl->sitename : $data->agent->username;
            
            try{
                            $to_name = $data->passenger_name;
                            $to_email = $data->email;
                           Mail::send('generatePrint', $makePdf, function($message) use ($to_name, $to_email) {
                            $message -> to($to_email, $to_name)
                                -> subject('Your Boarding Pass');
                            $message->from(env('MAIL_FROM_ADDRESS', 'notification@jemkaptransport.com'),'Your Boarding Pass');
                   });
                 }
                 catch (\Exception $e) {
                    
                 }

        }
    }

}

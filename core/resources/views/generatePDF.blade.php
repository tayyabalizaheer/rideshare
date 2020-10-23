<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>{{$basic->sitename}}</title>
    <link rel="stylesheet" href="{{asset('assets/front/css/bootstrap.min.css')}}" >
    <style media="screen">

        .page-break {
            page-break-after: always;
        }
        .ticket-header {
            background: #000036;
            width: 100%;
        }
        .ticket-footer{
            width: 100%;
        }
        .company-logo {
            display: inline-block;
        }
        .company-logo img {
            position: relative;
            margin-left: 65px;
            margin-top: 25px;
        }
        .company-short {
            background: #391261;
            color: white;
            display: inline-block;
            position: relative;
            margin-left: 20%;
            top: 20px;
        }
        ul > li{
            font-size: 16px;
        }

    </style>
</head>
<body style="height: 400px;width: 100%">

<div class="container">

    <div class="row">
        <div class="col-md-12">

            <div class="ticket-header text-center">
                <div class="company-logo"><br>
                    <img src="{{asset('assets/images/logo/logo.png')}}" alt="{{$basic->sitename}}" style="max-height: 60px; max-width: 280px;"><br><br>
                </div>

            </div>

            <div class="ticket-body" style="border:2px solid #000036;">
                <div style="padding-top: 30px">
                    <div class="body-left" style="width: 40%; float: left;display: inline-block;position: relative; margin-left: 10%;">
                        <ul style="list-style: none;padding: 0; margin: 0;">
                            <li style="padding: 5px;"><h6>Name: <strong>@isset($passenger_name) {{$passenger_name}} @endisset</strong></h6> </li>
                            <li style="padding: 5px;"><h6>Mob: <strong>@isset($passenger_number) {{$passenger_number}} @endisset</strong></h6></li>
                            <li style="padding: 5px;"><h6>Mob: <strong>@isset($next_of_kin_name) {{$next_of_kin_name}} @endisset</strong></h6></li>
                            <li style="padding: 5px;"><h6>Mob: <strong>@isset($next_of_kin_phone) {{$next_of_kin_phone}} @endisset</strong></h6></li>
                            <li style="padding: 4px;">Departure Time: <b style="margin-left: 30px"> @isset($departureTime) {{$departureTime}} @endisset</b></li>
                            <li style="padding: 4px;">Seat Fare : <b style="margin-left: 30px">@isset($seat_fare) {{$seat_fare}} {{$basic->currency}} @endisset</b></li>
                            <li style="padding: 4px;">Seats: <b style="margin-left: 30px"> @isset($seats) {{$seats}} @endisset</b></li>
                            <li style="padding: 4px;">From: <b style="margin-left: 30px"> @isset($from) {{$from}} @endisset</b></li>
                            <li style="padding: 4px;">Boarding: <b style="margin-left: 30px"> @isset($boarding) {{$boarding}} @endisset </b></li>
                            <li style="padding: 4px;">Issued On: <b style="margin-left: 30px">  @isset($issueOn) {{$issueOn}} @endisset </b></li>
                        </ul>
                    </div>
                    <div class="body-right" style="width: 45%; display: inline-block;float: left;">
                        <ul style="list-style: none;padding: 0; margin: 0;">
                            <li style="padding: 5px;"> <h6>PNR: <strong>@isset($pnr) {{$pnr}} @endisset</strong></h6>  </li>
                            <li style="padding: 4px;">Coach: <b style="margin-left: 30px"> @isset($coach) {{$coach}} @endisset</b></li>
                            <li style="padding: 4px;">Journey Date: <b style="margin-left: 30px">@isset($journeyDate) {{$journeyDate}} @endisset</b></li>
                            <li style="padding: 4px;">Reporting Time: <b style="margin-left: 30px">@isset($reportingTime) {{$reportingTime}} @endisset</b></li>

                            <li style="padding: 4px;">Total Fare: <b style="margin-left: 30px">@isset($total_fare) {{$total_fare}}  {{$basic->currency}} @endisset </b></li>
                            <li style="padding: 4px;">To: <b style="margin-left: 30px">@isset($to) {{$to}} @endisset</b></li>
                            <br>
                            <li style="padding: 4px;">Issued By: <b style="margin-left: 30px">@isset($issueBy) {{$issueBy}} @endisset</b></li>
                        </ul>
                    </div>
                    <p style="text-align: center; padding: 20px 80px 30px; font-weight: bold; clear: both">
                        Buy tickets at home <strong>{{url('/')}}</strong>
                    </p>
                </div>
            </div>


            <div class="ticket-footer" style="background: #000036; color:#fff; text-align: center;margin-top: -20px;"><br>
                <p><b>{{$basic->email}} || {{$basic->phone}}</b> </p><br>

            </div>
        </div>
    </div>
</div>




<!-- jquery -->
<script src="{{asset('assets/front/js/jquery.js')}}"></script>
<!-- bootstrap -->
<script src="{{asset('assets/front/js/bootstrap.min.js')}}"></script>

</body>
</html>
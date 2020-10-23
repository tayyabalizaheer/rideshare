@extends('admin.layout.master')
@section('css')
    <style media="screen">
        .page-break {
            page-break-after: always;
        }
        .ticket-header {
            background: #391261;
            width: 100%;
        }
        .ticket-footer{
            width: 100%;
            margin-top: -15px;
        }
        .company-logo {
            display: inline-block;
        }
        .company-logo img {
            position: relative;
            margin-left: 15px;
            margin-top: 0px;
        }
        .company-short {
            background: #391261;
            color: white;
            display: inline-block;
            position: relative;
            float: right;
            margin-right: 15px;
            top: 20px;
        }

        ul > li{
            font-size: 16px;
        }

    </style>
@stop
@section('body')



    <div class="card">

        <div class="card-header bg-white font-weight-bold">
            <h4>{{$page_title}}</h4>
        </div>

        <div class="card-body">
            @include('errors.error')
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>Username</th>
                        <th>Trip Route</th>
                        <th>Departure Time</th>
                        <th>Cancel Request Time</th>
                        <th>Status</th>
                        <th>ACTION</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($ticket_cancels as $k=>$data)
                        <tr>
                            <td>{{++$k}}</td>
                            <td>
                                <a href="{{route('user.single',$data->user_id)}}">{{$data->user->username}}</a>
                            </td>
                            <td>
                                <strong>{{$data->ticketBooking->tripRoute->start_point_name}} - {{$data->ticketBooking->tripRoute->end_point_name}}</strong>
                            </td>
                            <td>
                                <strong>{{date('D, d M Y h:i A', strtotime($data->ticketBooking->booking_date))}}</strong>
                            </td>

                            <td>
                                <strong>{{date('D, d M Y, h:i A', strtotime($data->created_at))}}</strong>
                            </td>
                            <td>
                                @if($data->status == 1)
                                    <label  class="badge badge-success">Success</label>
                                @elseif($data->status == -1)
                                    <label  class="badge badge-danger">Cancelled</label>
                                @else
                                    <label  class="badge badge-warning">Pending</label>
                                @endif
                            </td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm btn-icon btn-pill edit_button" title="Info"
                                        data-toggle="modal" data-target="#myModal"
                                        data-act="View"
                                        data-status="{{$data->status}}"
                                        data-passenger_name="{{$data->ticketBooking->passenger_name}}"
                                        data-passenger_number="{{$data->ticketBooking->phone}}"
                                        data-pnr="{{$data->ticketBooking->pnr}}"
                                        data-coach="{{$data->ticketBooking->fleetRegistration->reg_no}}"
                                        data-departure_time="{{date('h:i A', strtotime($data->ticketBooking->booking_date))}}"
                                        data-journey_date="{{date('d M Y', strtotime($data->ticketBooking->booking_date))}}"
                                        data-seat_fare="{{$data->ticketBooking->price}}"
                                        data-seats="{{$data->ticketBooking->seat_number}}"
                                        data-from="{{$data->ticketBooking->tripRoute->start_point_name}}"
                                        data-boarding="{{$data->ticketBooking->boarding}}"
                                        data-total_fare="{{$data->ticketBooking->total_fare}}"
                                        data-to="{{$data->ticketBooking->tripRoute->end_point_name}}"
                                        data-reporting_time="{{date('h:i A', strtotime($data->ticketBooking->updated_at))}}"
                                        data-issue_on="{{ date('d M Y', strtotime($data->ticketBooking->updated_at))}}"
                                        data-id="{{$data->id}}">
                                    <i class="fa fa-info-circle"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                {{$ticket_cancels->links()}}
            </div>

        </div>
    </div>

    <!-- Modal for Edit button -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel"><b class="abir_act"></b> Details </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <form method="post" action="{{route('request-cancel')}}">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12" >

                                    <div class="ticket-header">
                                        <div class="company-logo">
                                            <img src="{{asset('assets/images/logo/logo.png')}}" alt=".." height="100" width="150">
                                        </div>
                                        <div class="company-short">
                                            <h2>{{$basic->sitename}}</h2>
                                        </div>
                                    </div>

                                    <div class="ticket-body" style="background-color: #ffffce">
                                        <div style="padding-top: 30px">
                                            <div class="body-left" style="width: 40%; float: left;display: inline-block;position: relative; margin-left: 10%;">
                                                <ul style="list-style: none;padding: 0; margin: 0;">
                                                    <li style="padding: 5px;"><h6>Name: <strong class="passenger_name"></strong></h6> </li>
                                                    <li style="padding: 5px;"><h6>Mob: <strong class="passenger_number"></strong></h6></li>
                                                    <li style="padding: 4px;">Departure Time: <b class="departureTime" style="margin-left: 30px"></b></li>
                                                    <li style="padding: 4px;">Seat Fare : <b style="margin-left: 10px" class="seat_fare"> </b> <strong class="currency"></strong></li>
                                                    <li style="padding: 4px;">Seats: <b class="seats" style="margin-left: 30px"> </b></li>
                                                    <li style="padding: 4px;">From: <b class="from" style="margin-left: 30px"></b></li>
                                                    <li style="padding: 4px;">Boarding: <b class="boarding" style="margin-left: 30px"></b></li>
                                                    <li style="padding: 4px;">Issued On: <b class="issueOn" style="margin-left: 30px">   </b></li>
                                                </ul>
                                            </div>
                                            <div class="body-right" style="width: 45%; display: inline-block;float: left;">
                                                <ul style="list-style: none;padding: 0; margin: 0;">
                                                    <li style="padding: 5px;"> <h6>PNR: <strong class="pnr"></strong></h6>  </li>
                                                    <li style="padding: 4px;">Coach: <b class="coach" style="margin-left: 30px"></b></li>
                                                    <li style="padding: 4px;">Journey Date: <b class="journeyDate" style="margin-left: 30px"></b></li>
                                                    <li style="padding: 4px;">Reporting Time: <b class="reportingTime" style="margin-left: 30px"></b></li>

                                                    <li style="padding: 4px;">Total Fare: <b class="total_fare " style="margin-left: 10px">  </b> <strong class="currency"></strong></li>
                                                    <li style="padding: 4px;">To: <b class="to" style="margin-left: 30px"></b></li>
                                                    <br>
                                                    <li style="padding: 4px;">Issued By: <b class="issueBy" style="margin-left: 30px"></b></li>
                                                </ul>
                                            </div>
                                            <p style="text-align: center; padding: 20px 80px 30px; font-weight: bold; clear: both">
                                                Buy tickets at home <strong>{{url('/')}}</strong>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="ticket-footer" style="background: #ffd168;text-align: center"><br>
                                        <p>Complaints and suggestions <b>{{$basic->email}}</b> <br> <span style="padding-left: 10px">Mob:</span> <b>{{$basic->phone}}</b> </p><br>

                                    </div>

                                </div>
                            </div>


                            <div class="form-group">
                                <input class="form-control abir_id" type="hidden" name="id">
                            </div>

                            <div class="container tood">
                                <div class="row">
                                    <div class="col-12">
                                        <h6 style="margin-top: 20px" class="text-info">If You Want to Approve Ticket Cancel Request </h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <strong >Total Fare</strong>
                                            <div class="input-group mb-3">
                                                <input class="form-control trip_total_fare" id="trip_total_fare" type="text"  readonly>
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><strong class="currency"></strong></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="form-group">
                                            <strong>Return Back Amount</strong>
                                            <div class="input-group mb-3">
                                                <input class="form-control amount" type="text" name="amount" >
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><strong class="currency"></strong></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="form-group">
                                            <strong>Cancelation Charge</strong>
                                            <div class="input-group mb-3">
                                                <input class="form-control charge" type="text" name="charge" >
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><strong class="currency"></strong></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer" >
                        <button type="submit" name="sbtn" value="yes" class="btn btn-success approve">Approve Ticket Cancelation</button>
                        <button type="submit" name="sbtn" value="reject" class="btn btn-danger">Reject Ticket Cancelation</button>

                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $(document).on("click", '.edit_button', function (e) {
                var status = $(this).data('status');
                var id = $(this).data('id');
                var passenger_name = $(this).data('passenger_name');
                var passenger_number = $(this).data('passenger_number');
                var pnr = $(this).data('pnr');
                var coach = $(this).data('coach');
                var departureTime = $(this).data('departure_time');
                var journeyDate = $(this).data('journey_date');
                var seat_fare = $(this).data('seat_fare');
                var seats = $(this).data('seats');
                var from = $(this).data('from');
                var boarding = $(this).data('boarding');
                var total_fare = $(this).data('total_fare');
                var to = $(this).data('to');
                var reportingTime = $(this).data('reporting_time');
                var issueOn = $(this).data('issueOn');
                var currency = "{{$basic->currency}}";

                var act = $(this).data('act');
                $(".abir_id").val(id);
                $(".abir_act").text(act);

                $('.passenger_name').text(passenger_name);
                $('.passenger_number').text(passenger_number);
                $('.pnr').text(pnr);
                $('.coach').text(coach);
                $('.departureTime').text(departureTime);
                $('.journeyDate').text(journeyDate);
                $('.seat_fare').text(seat_fare);
                $('.seats').text(seats);
                $('.boarding').text(boarding);
                $('.total_fare').text(total_fare);
                $('.trip_total_fare').val(total_fare);
                $('.from').text(from);
                $('.to').text(to);
                $('.reportingTime').text(reportingTime);
                $('.issueOn').text(issueOn);
                $('.currency').text(currency);

               var tt = $('.amount').val(total_fare);
               var cc = $('.charge').val(0);

               $('.modal-footer').css('display','none')
               $('.tood').css('display','none')
               console.log(status)
                if(status == 0)
                {
                    $('.modal-footer').css('display','')
                    $('.tood').css('display','')
                }

            });


            $('.amount').on('input', function () {
                var trip_total_fare = $('.trip_total_fare').val();
                var amount = $('.amount').val();
                var charge = $('.charge').val();
                $('.charge').val(trip_total_fare - amount);
                if($('.charge').val() <0){
                    $('.approve').prop("disabled",true);
                }else{
                    $('.approve').prop("disabled",false);
                }
            });

            $('.charge').on('input', function () {
                var trip_total_fare = $('.trip_total_fare').val();
                var amount = $('.amount').val();
                var charge = $('.charge').val();
                $('.amount').val(trip_total_fare - charge);
                if($('.amount').val() <0){
                    $('.approve').prop("disabled",true);
                }else{
                    $('.approve').prop("disabled",false);
                }
            });


        });
    </script>
@endsection
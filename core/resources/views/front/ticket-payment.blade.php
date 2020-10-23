@extends('user')
@section('force-css','bc blog blogdetails')

@section('content')
    @include('partials.breadcrumb')


    <section id="pricePlan" class="pricePlan margin-bottom-60 margin-top-60">
        <div class="container">
            <div class="row justify-content-center">


                <div class="col-md-10">
                    @include('errors.alert')
                </div>

                <div class="col-md-8 col-md-offset-2">
                    <div class="card ">
                        <div class="card-header text-center">
                            <h4 class="card-title"><strong>{{ $data->gateway->name }}</strong></h4>
                        </div>
                        <form method="POST" action="{{route('ticket.confirm')}}">
                            {{csrf_field()}}
                            <div class="card-body text-center">

                                <img src="{{asset('assets/images/gateway')}}/{{$data->gateway_id}}.jpg"
                                     style="width: 35%;border-radius: 5px ; margin: 10px 25%;"/>

                                <ul style='font-size: 15px;' class="list-group text-center  nic-color">
                                    <li class="list-group-item"> @lang('Ticket Fare') :
                                        <strong>{{$data->amount}}</strong> {{$basic->currency}}
                                    </li>


                                    <li class="list-group-item"> @lang('Charge') :
                                        <strong>{{$data->charge}} </strong>{{ $basic->currency }}</li>
                                    <li class="list-group-item "> @lang('Payable') :
                                        <strong>{{$data->charge + $data->amount}} </strong>{{ $basic->currency }}</li>

                                    <!-- <li class="list-group-item"> @lang('In USD') :
                                        <strong>${{$data->usd}}</strong>
                                    </li> -->
                                </ul>


                            </div>
                            <div class="card-footer">
                                <div class="btn-wrapper">
                                    <button  id="btn-confirm" class=" btn btn-block btn-success btn-lg ">Pay Now</button>
                                </div>
                            </div>

                            <div class="card-footer">
                                <div class="btn-wrapper">
                                    <a href="{{route('allbookings')}}" class=" btn btn-block btn-secondary btn-lg ">Pay by Cash</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </section>
@stop


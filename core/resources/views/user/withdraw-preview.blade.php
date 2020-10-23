@extends('user')
@section('force-css','bc blog')
@section('style')
@stop
@section('content')
    @include('partials.breadcrumb')

    <!-- =========== Main Ticket Booking Area Start ===================== -->
    <div id="ticket-booking">
        <div class="container">


            <div class="row">
                <div class="col-md-4">
                    <div class="card ">
                        <div class="card-header text-center">
                            <h5>{{ __($method->name) }}</h5>
                        </div>
                        <div  class="card-body text-center">
                            <img class="" style="width: 35%;border-radius: 5px ; margin: 10px 25%;"
                                 src="{{ asset('assets/images') }}/{{ $method->image }}" alt="..">

                            <ul style='font-size: 15px;' class="list-group text-center  nic-color">
                                <li class="list-group-item">@lang('Limit') - ( {!! $method->withdraw_min !!}
                                    @lang('to') {{ $method->withdraw_max }} ) {{ $basic->currency }} </li>
                                <li class="list-group-item"> @lang('Fix Charge') - {{ $method->fix }} {{ __($basic->currency) }}</li>
                                <li class="list-group-item"> @lang('Percentage') - {{ $method->percent }}%</li>
                                <li class="list-group-item">@lang('Duration') - {!! $method->duration !!} @lang('Days')</li>
                            </ul>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('withdraw.money') }}"
                               class="btn btn-block btn-lg btn-info ">
                                <i class="fa fa-arrow-left"></i> @lang('Another Method')
                            </a>
                        </div>
                    </div>

                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h5>@lang('Withdraw Preview')</h5>
                        </div>
                        <!-- panel body -->
                        <div class="card-body">
                            <div class="text-center">
                                <h6 class="text-uppercase">@lang('Current Balance') :
                                    <strong>{{number_format( $balance, $basic->decimal) }} - {{ $basic->currency }}</strong></h6>
                            </div>

                            <div class="form-group ">
                                <label>@lang('Request Amount') :</label>
                                <div class="input-group ">
                                    <input type="text" value="{{ $withdraw->amount }}" readonly name="amount"
                                           id="amount" class="form-control">
                                    <div class="input-group-append">
                                        <span class="input-group-text">{{__($basic->currency)}}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>@lang('Withdrawal Charge') :</label>
                                <div class="input-group ">
                                    <input type="text"value="{{ round($withdraw->charge,$basic->decimal )}}"  readonly name="charge" class="form-control">
                                    <div class="input-group-append">
                                        <span class="input-group-text">{{__($basic->currency)}}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>@lang('Total Amount'):</label>
                                <div class="input-group ">
                                    <input type="text"value="{{ round($withdraw->net_amount,$basic->decimal )}}"  readonly  class="form-control white">
                                    <div class="input-group-append">
                                        <span class="input-group-text">{{__($basic->currency)}}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label>@lang('Available Balance') :</label>
                                <div class="input-group ">
                                    <input type="text" value="{{ $balance - $withdraw->net_amount }}"  readonly  class="form-control white">
                                    <div class="input-group-append">
                                        <span class="input-group-text">{{__($basic->currency)}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <br>

            <div class="row">
                <div class="col-md-12">
                    <div class="card  custom-panel">
                        <!-- panel head -->
                        <div class="card-header">
                            <h5> <i class="fa fa-send"></i> @lang('Payment Send Details')</h5>
                        </div>
                        <!-- panel body -->
                        <div class="panel-body">
                            <div class="col-md-12">
                                <form method="post" action="{{route('withdraw.submit')}}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="withdraw_id" value="{{ $withdraw->id }}">
                                    <div class="row">
                                        <div class="form-group col-md-6 margin-top-20">
                                            <label><strong>@lang('Sending Details') :</strong></label>
                                            <textarea name="send_details" rows="4"
                                                      class="form-control input-lg white"
                                                      placeholder="Sending Details" required></textarea>
                                        </div>

                                        <div class="form-group col-md-6 margin-top-20">
                                            <label><strong>@lang('Message')  :</strong></label>
                                            <textarea name="message" rows="4"
                                                      class="form-control input-lg white"
                                                      placeholder="Message ( If Any )"></textarea>
                                        </div>

                                        <div class="form-group col-md-12">
                                            <button type="submit"
                                                    class="theme_button btn btn-block btn-success"><i
                                                        class="fa fa-send"></i> @lang('Submit Withdraw')
                                            </button>
                                        </div>


                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>



@stop

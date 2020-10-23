@extends('user')
@section('force-css','bc blog')
@section('style')

@stop
@section('content')
    @include('partials.breadcrumb')
    <div id="ticket-booking">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @include('errors.alert')
                    @include('errors.error')
                </div>

                @foreach($withdrawMethod as $gate)
                    <div class="col-md-3 ">
                        <div class="blog-box text-center margin-bottom-50">
                            <h3>{{$gate->name}}</h3>
                            <div class="topImg">
                                <img class="img-fluid" src="{{asset('assets/images/')}}/{{$gate->image}}"
                                     style="width:50%; margin: 10px 25%;">
                            </div>
                            <div class="blog-item-description">
                                <div class="margin-bottom-20">
                                    <ul style="font-size: 15px; " class="list-group text-center nic-color" >
                                        <li class="list-group-item bg-transparent">@lang('Minimum')
                                            - {{$gate->withdraw_min}} {{ __($basic->currency) }} </li>
                                        <li class="list-group-item bg-transparent">@lang('Maximum')
                                            - {{$gate->withdraw_max}} {{ __($basic->currency) }} </li>
                                        <li class="list-group-item bg-transparent"> @lang('Charge') - {{$gate->fix}} {{ __($basic->currency) }}
                                            + {{$gate->percent}}%
                                        </li>
                                        <li class="list-group-item bg-transparent">@lang('Processing Time') - {{$gate->duration}} @lang('Days')</li>
                                    </ul>
                                </div>
                                <button class="btn btn-info btn-block btn-custom"
                                        data-toggle="modal"
                                        data-target="#withdrawModal{{$gate->id}}"></i> @lang('Select')
                                </button>
                            </div>
                        </div>
                    </div>
                    <!--Buy Modal -->
                    <div id="withdrawModal{{$gate->id}}" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content modal-bg-color">
                                <div class="modal-header">
                                    <h6 class="modal-title"><strong> @lang('Withdraw via') {{$gate->name}}</strong></h6>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <form method="POST" action="{{route('withdraw.preview') }}">
                                    {{csrf_field()}}
                                    <div class="modal-body">
                                        <input type="hidden" name="method_id" value="{{$gate->id}}">
                                        <label class="col-md-12"><strong>@lang('Limit')</strong>
                                            <span >({{ $gate->withdraw_min }}
                                                - {{$gate->withdraw_max }}) {{$basic->currency}}
                                                <br>
                                                @lang('Charge') {{ $gate->fix }} {{$basic->currency}} + {{ $gate->percent }}
                                                %</span>
                                        </label>

                                        <hr/>
                                        <div class="form-group topmargin_10">

                                            <label><strong>@lang('Enter Amount')</strong></label>
                                            <div class="input-group">
                                                <input type="text" class="form-control white" name="amount" placeholder="0.00"
                                                       onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')"required>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">{{$basic->currency}}</span>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success ">@lang('Preview')</button>
                                        <button type="button" class="btn btn-danger " data-dismiss="modal">@lang('Close')
                                        </button>
                                    </div>

                                </form>
                            </div>

                        </div>
                    </div>

                @endforeach

            </div>
        </div>
    </div>
@stop

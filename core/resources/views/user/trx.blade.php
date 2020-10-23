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
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">@lang('SL')</th>
                                <th scope="col">@lang('Transaction ID')</th>
                                <th scope="col">@lang('Details')</th>
                                <th scope="col">@lang('Amount')</th>
                                <th scope="col">@lang('Remaining Balance')</th>
                                <th scope="col">@lang('Time')</th>
                            </tr>
                            </thead>

                            <tbody>

                            @if(count($invests) >0)
                                @foreach($invests as $k=>$data)
                                    <tr @if($data->type == '+') class="green"
                                        @elseif($data->type == '-') class="red" @endif >
                                        <td data-label="@lang('SL')">{{++$k}}</td>
                                        <td data-label="#@lang('TRX')">{{isset($data->trx) ? $data->trx : 'N/A'}}</td>
                                        <td data-label="@lang('Details')">{{  isset($data->title) ? $data->title : 'N/A' }}</td>
                                        <td data-label="@lang('Amount')"><strong>{{isset($data->amount) ? $data->amount  : 'N/A'}}   {{ $basic->currency }}</strong></td>
                                        <td data-label="@lang('Remaining Balance')"><strong>{{isset($data->main_amo) ? $data->main_amo : ''}}  {{$basic->currency}}</strong></td>
                                        <td data-label="@lang('Time')"> {!! date(' d M Y ', strtotime($data->created_at)) !!} </td>
                                    </tr>

                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6"> @lang('No Data Found!!')</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                    {{$invests->links()}}
                </div>
            </div>
        </div>
    </div>



@stop



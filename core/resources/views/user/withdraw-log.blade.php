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
                                <th scope="col">@lang('Trx')</th>
                                <th scope="col">@lang('Method')</th>
                                <th scope="col">@lang('Amount')</th>
                                <th scope="col">@lang('Charge')</th>
                                <th scope="col">@lang('Status')</th>
                                <th scope="col">@lang('Time')</th>
                            </tr>
                            </thead>

                            <tbody>

                            @if(count($invests)>0)
                                @foreach($invests as $k=>$data)
                                    <tr>
                                        <td data-label="@lang('SL')">{{++$k}}</td>
                                        <td data-label="#@lang('Trx')">{{$data->transaction_id }}</td>
                                        <td data-label="@lang('Method')">{{$data->method->name }}</td>
                                        <td data-label="@lang('Amount')">
                                            <i class="icofont-money"></i>
                                            <span class="strong"> {{number_format($data->amount, $basic->decimal) }} </span>
                                            <span class="base-color strong">{{$basic->currency}}</span>
                                        </td>
                                        <td data-label="@lang('Charge')">
                                            <i class="icofont-money"></i>
                                            <span class="strong">{!! number_format($data->charge, $basic->decimal) !!}</span>
                                            <span class="base-color strong">{{$basic->currency}}</span>
                                        </td>
                                        <td data-label="@lang('Status')">
                                            @if($data->status == 1)
                                                <span class="badge badge-primary"> @lang('Pending') </span>
                                            @elseif($data->status == 2)
                                                <span class="badge badge-success"> @lang('Approved') </span>
                                            @elseif($data->status == -2)
                                                <span class="badge badge-danger"> @lang('Refunded')</span>
                                            @endif
                                        </td>
                                        <td data-label="@lang('Time')">
                                            {!! date(' d M, Y h:s A', strtotime($data->created_at)) !!}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="7"><h4 class="text-center text-danger margin-top-40 margin-bottom-60"> @lang('No Data Found!!')</h4></td>
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

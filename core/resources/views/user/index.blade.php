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
                    @include('errors.error')

                    @if(count($myTrips)>0)
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th scope="col">@lang('SL')</th>
                                    <th scope="col">@lang('Operator')</th>
                                    <th scope="col">@lang('Departure')</th>
                                    <th scope="col">@lang('Arrival')</th>
                                    <th scope="col">@lang('Ticket No/PNR')</th>
                                    <th scope="col">@lang('Total Seat')</th>
                                    <th scope="col">@lang('Fare')</th>
                                    <th scope="col">@lang('Status')</th>
                                    <th scope="col" style="width: 10%">@lang('Action')</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($myTrips as $k=>$data)
                                    <tr>
                                        <td data-label="@lang('SL')">{{++$k}}</td>
                                        <td data-label="@lang('Route')">
                                            <div class="t-box-1">
                                                <h5>{{$data->tripRoute->name}}</h5>
                                                <strong> {{date('d M Y',strtotime($data->tripAssign->start_date))}}</strong>
                                            </div>
                                        </td>
                                        <td data-label="@lang('Dept')">
                                            <h5>{{date('h:s A',strtotime($data->start_date))}}</h5>
                                            <strong class="text-success">{{$data->tripRoute->start_point_name}}</strong>
                                        </td>

                                        <td data-label="@lang('Arrival')">
                                            <strong class="text-success">{{$data->tripRoute->end_point_name}}</strong>
                                        </td>
                                        <td  data-label="@lang('Tic No/PNR')">
                                            <strong>{{$data->pnr}}</strong>
                                        </td>

                                        <td data-label="@lang('Total Seat')">
                                            <div class="p-img">
                                                <p>{{$data->total_seat}} seats</p>
                                            </div>
                                            <p class="text-danger">{{$data->seat_number}}</p>
                                        </td>
                                        @php
                                            $ticketPrice =  \App\TicketPrice::where('trip_route_id',$data->trip_route_id)->where('fleet_type_id',$data->fleetRegistration->fleet_type_id)->latest()->first();
                                        @endphp


                                        <td data-label="@lang('Fare')">
                                            <div class="p-img">
                                                @if($ticketPrice)
                                                    <strong>{{$ticketPrice->price }} * {{$data->total_seat}} = {{$data->total_fare}}  {{$basic->currency}}</strong>
                                                @else
                                                    <strong class="text-danger">-</strong>
                                                @endif
                                            </div>
                                        </td>
                                        <td data-label="Status">
                                            @if($data->payment_status == 0)
                                                <label class="badge badge-danger">@lang('Fare')</label>
                                            @else
                                                @if($data->status == 1)
                                                    <label class="badge badge-success"> @lang('Trip Complete')</label>
                                                @elseif($data->status == -1)
                                                    <label class="badge badge-info"> @lang('Trip Cancelled')</label>
                                                @else
                                                    @if(($data->cancel_req == 1) && ($data->payment_status == 1))
                                                        <label class="badge badge-primary">@lang('Request For Cancel')</label>
                                                    @else
                                                        <label class="badge badge-success"> @lang('Payment Complete')</label>
                                                    @endif
                                                @endif
                                            @endif
                                        </td>

                                        <td data-label="Action">
                                            @if($data->payment_status == 0)
                                                <a href="{{route('seat-book.details',$data->pnr)}}"
                                                   class="btn btn-success btn-sm" target="_blank">@lang('Make Payment')</a>

                                                <a href="{{route('seat-book.delete',$data->pnr)}}" class="btn btn-danger btn-sm" title="Remove"
                                                   onclick="event.preventDefault(); document.getElementById('book-delete').submit();">
                                                    <i class="fa fa-trash"></i>
                                                </a>

                                                <form id="book-delete" action="{{route('seat-book.delete',$data->pnr)}}"
                                                      method="POST"
                                                      style="display: none;">{{ csrf_field() }} {{method_field('put')}}</form>
                                            @else
                                                @if($data->status == 0)
                                                    <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#ticketPrint{{$data->id}}" title="Request For Trip Cancel">
                                                        <i class="fa fa-times"></i>
                                                    </a>
                                                    <div id="ticketPrint{{$data->id}}" class="modal fade" role="dialog">
                                                        <div class="modal-dialog">
                                                            <form action="{{route('get.ticket-cancel')}}" method="POST">
                                                                {{ csrf_field() }}
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">@lang('Request For Trip Cancel?')</h4>
                                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p>@lang('Are You Sure to trip Cancel')</p>
                                                                        <input type="hidden" name="pnr" value="{{$data->pnr}}">
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit" class="btn btn-success" >@lang('Yes')</button>
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">@lang('Close')</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>





                                                    <a href="javascript:void(0)" class="btn btn-success btn-sm" title="Download Ticket" onclick="event.preventDefault(); document.getElementById('download-ticket').submit();">
                                                        <i class="fa fa-download"></i>
                                                    </a>

                                                    <form id="download-ticket" action="{{route('get.ticket-print')}}"
                                                          method="POST"
                                                          style="display: none;">{{ csrf_field() }}
                                                        <input type="text" name="pnr" value="{{$data->pnr}}">
                                                    </form>

                                                @else
                                                    -
                                                @endif

                                            @endif

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{$myTrips->links()}}
                    @else

                        <h1 class="text-center text-danger margin-top-40 margin-bottom-60">@lang('No result found!!')</h1>
                    @endif


                </div>
            </div>
        </div>
    </div>
    <!-- =========== Main Ticket Booking Area End ===================== -->
@stop


@section('script')
@stop
@section('js')

@stop
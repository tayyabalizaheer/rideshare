@extends('agent.layout.master')
@section('body')
    <div class="card">
        <div class="card-header bg-white font-weight-bold">
                <h2 class="mb-4">{{$page_title}}</h2>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">SL</th>
                    <th scope="col">Route</th>
                    <th scope="col">Departure</th>
                    <th scope="col">Arrival</th>
                    <th scope="col">Ticket No./ PNR</th>
                    <th scope="col">Total Seat</th>
                    <th scope="col">Fare</th>
                    <th scope="col">Status</th>
                    <th scope="col">Time</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>


                @if(count($invests) >0)
                    @foreach($invests as $k=>$data)
                        <tr>
                            <td data-label="SL">{{++$k}}</td>
                            <td data-label="Route">
                                    <h5>{{$data->tripRoute->name}}</h5>
                                    <strong> {{date('d M Y',strtotime($data->tripAssign->start_date))}}</strong>
                            </td>
                            <td data-label="Dept">
                                <h5>{{date('h:s A',strtotime($data->start_date))}}</h5>
                                <strong class="text-success">{{$data->tripRoute->start_point_name}}</strong>
                            </td>

                            <td data-label="Arrival"> <strong class="text-success">{{$data->tripRoute->end_point_name}}</strong></td>
                            <td data-label="Tic No. / PNR"><strong>{{$data->pnr}}</strong></td>

                            <td data-label="Total Seat"><strong>{{$data->total_seat}} seats</strong><br>
                                <strong class="text-danger">{{$data->seat_number}}</strong>
                            </td>
                            @php
                                $ticketPrice =  \App\TicketPrice::where('trip_route_id',$data->trip_route_id)->where('fleet_type_id',$data->fleetRegistration->fleet_type_id)->latest()->first();
                            @endphp


                            <td data-label="Fare">
                                    @if($ticketPrice)
                                        <strong>{{$ticketPrice->price }} * {{$data->total_seat}} = {{$data->total_fare}}  {{$basic->currency}}</strong>
                                    @else
                                        <strong class="text-danger">-</strong>
                                    @endif
                            </td>
                            <td data-label="Status">
                                @if($data->payment_status == 0)
                                    <label class="badge badge-danger">Not Paid</label>
                                @else
                                    @if($data->status == 1)
                                        <label class="badge badge-success"> Trip Complete</label>
                                    @elseif($data->status == -1)
                                        <label class="badge badge-info"> Trip Cancelled</label>
                                    @else
                                        @if(($data->cancel_req == 1) && ($data->payment_status == 1))
                                            <label class="badge badge-primary">Request For Cancel</label>
                                        @else
                                            <label class="badge badge-success"> Payment Complete</label>
                                        @endif
                                    @endif
                                @endif
                            </td>
                            <td data-label="Time">
                                {!! date(' d M Y h:i A', strtotime($data->created_at)) !!}
                            </td>
                            <td data-label="Fare">
                                @if($data->pdf)

                                <a href="{{route('ticket.print',$data->pdf->token)}}" target="_blank" class="btn btn-sm btn-success"><i class="fa fa-print"></i></a>
                                    @endif
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="10"> No result Found !!</td>
                    </tr>
                @endif
                </tbody>
            </table>


            <div class="col-sm-12 text-center margin_0">
                {{ $invests->links() }}
            </div>
        </div>
    </div>


@stop

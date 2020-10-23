@extends('user')
@section('force-css','bc blog')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/css/otherPageResponsive.css')}}">

    @endsection
@section('content')
@include('partials.breadcrumb')
    <div class="card">
        <div class="card-header bg-white font-weight-bold">
                <h2 class="mb-4">{{$page_title}}</h2>
        </div>
        <div class="card-body">
            @include('errors.error')

            <table class="table table-hover">
                <thead>
                <tr>
                    <th>SL</th>
                    <th>Trip Id</th>
                    <th>Registration No.</th>
                    <th>Route Name</th>
                    <th>Trip Duration</th>

                    <th>Seat Capacity</th>
                    <th>Total Sold Seats</th>
                    <th>Total Fare</th>
                </tr>
                </thead>
                <tbody>

                @foreach($tripAssign as $k=>$data)
                    <tr>
                        <td data-label="SL">{{++$k}}</td>
                        <td data-label="Trip Id"><strong>{{$data->id_no}}</strong></td>
                        <td data-label="Registration No.">
                            <strong>{{$data->fleetRegistration->reg_no}}</strong>
                        </td>
                        <td data-label="Route Name">
                            <strong>{{$data->tripRoute->name}}</strong>
                        </td>
                        <td data-label="Trip Duration">
                            <span style="color: green">{{date('d M Y h:i A',strtotime($data->start_date))}} </span>
                            <br><span style="color: red">{{date('d M Y h:i A',strtotime($data->end_date))}}</span>
                        </td>
                        <td data-label="Seat Capacity">
                            <strong>{{$data->fleetRegistration->total_seat}}</strong>
                        </td>
                        <td data-label="Total Sold Seat">
                            <strong style="color: green">{{$data->ticketBooking()->sum('total_seat')}} </strong>
                        </td>

                        
                        <td data-label="Total Fare">
                            <strong>{{$data->ticketBooking()->sum('total_fare')}} {{$basic->currency}}</strong>
                        </td>
                        
                    </tr>
                @endforeach

                </tbody>
            </table>
            {!! $tripAssign->render() !!}
        </div>
    </div>

@endsection

@section('script')
@endsection
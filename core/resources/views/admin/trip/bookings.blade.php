@extends('user')
@section('force-css','bc blog')
@section('style')

@stop
@section('content')
    @include('partials.breadcrumb')
<div class="container" id="main-container">
    <div class="main-content table-responsive"> 
     	<table class="table table-striped table-bordered table-hover" id="emp_list">
            <thead>
                <tr>
                    <th>Route Name</th>
                    <th>Passenger_name</th>
                    <th>PNR</th>
                    <th>Price</th>
                    <th>Total Seats</th>
                    <th>Total Fare</th>
                    <th>Start Point</th>
                    <th>End Point</th>
                    <th>Booking Date</th>
                    <th>Chat</th>
                    
                    
                </tr>
            </thead>
            <tbody>
            	@foreach($allbookingdata as $bookingdata)
	                <tr>
                        <td>{{$bookingdata->trip_name}}</td>
	                    <td>{{$bookingdata->passenger_name}}</td>
	                    <td>{{$bookingdata->pnr}}</td>
	                    <td>{{$bookingdata->price}}</td>
	                    <td>{{$bookingdata->total_seat}}</td>
	                    <td>{{$bookingdata->total_fare}}</td>
	                    <td>{{$bookingdata->start_point_name}}</td>
	                    <td>{{$bookingdata->end_point_name}}</td>
                        <td>{{$bookingdata->booking_date}}</td>
	                    <td><a href="{{ route('chat.index',[$bookingdata->pnr]) }}">Chat</a></td>
	                    
	                    
	                </tr>
	            	@endforeach
            </tbody>
        </table> 
    </div>
</div>
@endsection
@section('script')


@stop
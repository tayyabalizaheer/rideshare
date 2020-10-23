@extends('agent.layout.master')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/css/jquery.autocomplete.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/css/flatpickr.min.css')}}">
    {{--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">--}}
    <style type="text/css">
        .fleet_img{
            width: 100px;
            height: 100px;
        }
    </style>
@stop
@section('body')
    <h4 class="mb-4"><i class="fas fa-bus"></i> {{$page_title}} </h4>

    <div class="card">
        <div class="card-header bg-white font-weight-bold">
            <form action="{{route('agent.tripSearch')}}" method="get">
                <div class="form-row">
                    <div class="col-lg-3">
                        <input type="text" name="start_point" value="{{old('start_point')}}" class="form-control form-control-lg" id="fromAutoComplete" placeholder="From">
                    </div>
                    <div class="col-lg-3">
                        <input type="text" name="end_point"  value="{{old('end_point')}}" id="toAutoComplete" class="form-control form-control-lg" placeholder="To">
                    </div>
                    <div class="col-lg-3">
                        <input type="text" name="date" id="datetimepicker2"  value="{{old('date')}}" class="form-control form-control-lg" placeholder="Date">
                    </div>

                    <div class="col-lg-3">
                        <button type="submit" class="btn btn-success btn-lg  h-serch mamunur_rashid_form_sm">
                           <i class="fa fa-search"></i> SEARCH
                        </button>
                    </div>
                </div>
            </form>
        </div>



        <div class="card-body">

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Image</th>
                    <th>Operator</th>
                    <th>Departure</th>
                    
                    <th>Arrival</th>
                    <th>Total Seat</th>
                    <th>Fare</th>
                    <th>View Seats</th>
                </tr>
                </thead>

                <tbody>
                @if(count($checkAssignTrip)>0)
                    @foreach($checkAssignTrip as $data)
                        <tr>
                            <td>
                                <img class="fleet_img" src="{{ asset('core/public/assets/images/'.$data->fleetRegistration->fleetType->fleet_img) }}">
                            </td>
                            <td>
                                <div class="t-box-1">
                                    <h5>{{$data->tripRoute->name}}</h5>
                                    <strong>{{date('d M Y',strtotime($data->start_date))}}</strong>
                                </div>
                            </td>
                            <td>
                                <h5>{{date('h:s A',strtotime($data->start_date))}}</h5>
                                <strong class="text-success">{{$data->tripRoute->start_point_name}}</strong>
                            </td>
                            
                            <td>
                                <strong class="text-success">{{$data->tripRoute->end_point_name}}</strong>
                            </td>

                            <td>
                                <div class="p-img">
                                    <strong>{{$data->fleetRegistration->total_seat}} seats</strong>
                                </div>
                                <b class="text-success">{{$data->fleetRegistration->fleetType->name}}</b>
                            </td>
                            @php
                                $ticketPrice =  \App\TicketPrice::where('trip_route_id',$data->trip_route_id)->where('fleet_type_id',$data->fleetRegistration->fleet_type_id)->latest()->first();
                            @endphp


                            <td>

                                <div class="p-img">
                                    @if($ticketPrice)
                                        <strong>{{($ticketPrice->price) ?? '' }} {{$basic->currency}}</strong>

                                    @else
                                        <strong class="text-danger">-</strong>
                                    @endif
                                </div>
                            </td>

                            <td>
                                <div class="l-box">
                                    <div class="media">
                                        <div class="media-body align-self-end">
                                            <div class="link">
                                                <a href="{{route('agent.view-seat',$data->id)}}" title="View Seats" class="btn btn-icon btn-pill btn-primary">
                                                    <i class="fa fa-eye"></i> </a>
                                                <a href="{{route('agent.trip-assign.edit',$data->id)}}" class="btn btn-info  btn-icon btn-pill" title="Edit">
                                                    <i class="fa fa-pencil-alt"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="8">
                            <h4 class="text-center text-danger margin-top-40 margin-bottom-60">No result found!!</h4>
                        </td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>






@endsection
@section('script')
    <script src="{{asset('assets/front/js/jquery.autocomplete.js')}}"></script>
    <script src="{{asset('assets/front/js/flatpickr.js')}}"></script>
    {{--<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>--}}
    <script type="text/javascript">
        $(document).ready(function () {
            var states = {!! $tripFrom !!};
            $(function () {
                $("#fromAutoComplete").autocomplete({
                    source: [states]
                });
            });
            $(function () {
                $("#toAutoComplete").autocomplete({
                    source: [states]
                });
            });


            $("#datetimepicker2").flatpickr({
                minDate: "today",
                maxDate: new Date().fp_incr(50), // 14 days from now
                dateFormat: "d M Y",
            });


        });
    </script>
@stop
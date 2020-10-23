@extends('user')

@section('force-css','bc blog')


 
@section('style')

    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/css/jquery.autocomplete.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/css/flatpickr.min.css')}}">

    {{--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">--}}
    <style type="text/css">
        .fleet_img{
            width: 200px;
            height: 150px;
        }
        .p-img{
            float: left;
            margin-right: 10px;
        }
        .leftItem{
            float: left;
            width: 100px;
            font-size: 16px;
            font-weight: bold;
        }
        .no-left-margin{
            margin-left: 0px;
        }
        #map {
          height: 400px;
        }
    </style>
    
@stop

@section('content')

<script
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDygYvsPmW7qvJQrqmZrxr_ezdaZ0LjZr4&callback=initMap&libraries=&v=weekly"
  defer
></script>

    <section id="breadcrumb">

        <div class="overly"></div>

        <div class="container">

            <div class="row justify-content-center">

                <div class="col-lg-10 col-md-12 text-center">

                    <div class="breadcrumbinfo">

                        <article>

                            <span class="b-title">Stop Looking. Start Tracking!</span>

                            <form action="{{route('search')}}" method="get">

                                <div class="form-row">

                                    <div class="col-12 col-md-3 col">

                                        <input type="text" name="start_point" value="{{$start_point}}"

                                               id="fromAutoComplete" class="form-control" placeholder="Form">

                                    </div>

                                    <div class="col-12 col-md-3 col">

                                        <input type="text" name="end_point" value="{{$end_point}}" id="toAutoComplete"

                                               class="form-control" placeholder="To">

                                    </div>

                                    <div class="col-12 col-md-3 col">

                                        <input type="text" name="date" id="datetimepicker2"

                                               value="{{ date('d M Y',strtotime($startDate))}}" class="form-control"

                                               placeholder="Date">



                                    </div>

                                    <div class="col-12 col-md-3 col">

                                        <button type="submit" class="form-control h-serch">SEARCH</button>

                                    </div>

                                </div>

                            </form>

                        </article>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- =========== banner end =========== -->



    <!-- =========== Main Ticket Booking Area Start ===================== -->

    <div id="ticket-booking">

        <div class="container">

            <div class="row justify-content-center">
                <div class="col-12">
                    <div id="map"></div>
                </div>
                <div class="col-12">
                    @if(count($checkAssignTrip)>0)
                    <div class="row">
                        @foreach($checkAssignTrip as $data)
                        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
                            <div>
                                <img class="fleet_img" src="{{ asset('core/public/assets/images/'.$data->fleetRegistration->fleetType->fleet_img) }}">
                            </div>
                            <div>
                                <h2>{{$data->tripRoute->name}}</h2>

                                <strong>{{date('d M Y',strtotime($data->start_date))}}</strong>
                            </div>
                            <div>
                                <div>
                                    <div class="leftItem">
                                        Departure 
                                    </div>
                                    <div>
                                        <h5>{{date('h:s A',strtotime($data->start_date))}}</h5>
                                        <strong class="text-success">{{$data->tripRoute->start_point_name}}</strong>
                                    </div>
                                </div>
                                <div class="leftItem">
                                    Arrival 
                                </div>
                                
                                <strong class="text-success">{{$data->tripRoute->end_point_name}}</strong>
                            </div>
                            <div>
                                <div class="leftItem">
                                    Total Seat 
                                </div>
                                <div class="p-img">

                                    {{$data->fleetRegistration->total_seat}} seats
                                    <p class="text-success">{{$data->fleetRegistration->fleetType->name}}</p>
                                </div>

                                
                            </div>

                            

                            <div>
                                <br>
                                <div class="leftItem">
                                    Fare
                                </div>

                                <div class="p-img">

                            

                                        <strong>{{$data->price}}</strong>




                                </div>
                            </div>
                            <br>
                            <div>
                                <div class="l-box">

                                    <div class="media">

                                        <div class="media-body align-self-end">

                                            <div class="link">

                                                <a href="{{route('view-seat',$data->id)}}" >View

                                                    Seats</a>

                                            </div>

                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    @else
                        <h4 class="text-center text-danger margin-top-40 margin-bottom-60">@lang('No result found')!!</h4>
                    @endif


                    <!-- Seacrh Form as a table -->




                  <!--   <div class="table-responsive">

                        <table class="table table-bordered">

                            <thead>

                            <tr>
                                <td>@lang('Image')</td>
                                <td>@lang('Operator')</td>

                                <td>@lang('Departure')</td>

                                

                                <td>@lang('Arrival')</td>

                                <td>@lang('Total Seat')</td>

                                <td>@lang('Fare')</td>

                                <td>@lang('View Seats')</td>

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

                                                <p>{{$data->fleetRegistration->total_seat}} seats</p>

                                            </div>

                                            <p class="text-success">{{$data->fleetRegistration->fleetType->name}}</p>

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

                                                            <a href="{{route('view-seat',$data->id)}}" >View

                                                                Seats</a>

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

                                        <h4 class="text-center text-danger margin-top-40 margin-bottom-60">@lang('No result found')!!</h4>

                                    </td>

                                </tr>

                            @endif

                            </tbody>

                        </table>

                    </div> -->

                </div>

            </div>

        </div>

    </div>

    <!-- =========== Main Ticket Booking Area End ===================== -->

@stop





@section('script')

    <script src="{{asset('assets/front/js/jquery.autocomplete.js')}}"></script>

    <script src="{{asset('assets/front/js/flatpickr.js')}}"></script>

    {{--<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>--}}

@stop

@section('js')

@if($start_points !=null && $end_points !=null)
    <script>
        function initMap(position) {
          Lat = parseFloat("{{$start_points->lat}}");
          Lan = parseFloat("{{$start_points->lan}}");
            console.log(Lat);
            console.log(Lan);

          // The location
          const location = { lat: Lat, lng: Lan};
          // The map, centered at Uluru
          const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 12,
            center: location,
          });
          // The marker, positioned at Uluru
          new google.maps.Marker({ position: location, map: map });
        }
        function drawline() {
         console.log('drawline');
         slat = parseFloat("{{$start_points->lat}}");
         slan = parseFloat("{{$start_points->lan}}");
         elat = parseFloat("{{$end_points->lat}}");
         elan = parseFloat("{{$end_points->lan}}");
          const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 8,
            center: { lat: slat, lng: slan },
            mapTypeId: "terrain",
          });
          const flightPlanCoordinates = [
            { lat: slat, lng: slan },
            { lat: elat, lng: elan },
          ];
          
          bounds  = new google.maps.LatLngBounds();
          loc = new google.maps.LatLng(slat, slan);
          bounds.extend(loc);
          new google.maps.Marker({ position: { lat: slat, lng: slan }, map: map });
          new google.maps.Marker({ position: { lat: elat, lng: elan }, map: map });
          map.panToBounds(bounds);    
          const flightPath = new google.maps.Polyline({
            path: flightPlanCoordinates,
            geodesic: true,
            strokeColor: "#FF0000",
            strokeOpacity: 1.0,
            strokeWeight: 2,
          });
          flightPath.setMap(map);
        }
        setTimeout(function() { drawline(); }, 2000);
    </script>
    @elseif($start_points !=null && $end_points ==null)
     <script>
         function initMap(position) {
           Lat = parseFloat("{{$start_points->lat}}");
           Lan = parseFloat("{{$start_points->lan}}");
             console.log(Lat);
             console.log(Lan);

           // The location
           const location = { lat: Lat, lng: Lan};
           // The map, centered at Uluru
           const map = new google.maps.Map(document.getElementById("map"), {
             zoom: 12,
             center: location,
           });
           // The marker, positioned at Uluru
           new google.maps.Marker({ position: location, map: map });
         }
     </script>
     @elseif($start_points ==null && $end_points !=null)
      <script>
          function initMap(position) {
            Lat = parseFloat("{{$end_points->lat}}");
            Lan = parseFloat("{{$end_points->lan}}");
              console.log(Lat);
              console.log(Lan);

            // The location
            const location = { lat: Lat, lng: Lan};
            // The map, centered at Uluru
            const map = new google.maps.Map(document.getElementById("map"), {
              zoom: 12,
              center: location,
            });
            // The marker, positioned at Uluru
            new google.maps.Marker({ position: location, map: map });
          }
      </script>
      @else
       <script>
           function initMap(position) {
             Lat = parseFloat(30.3753);
             Lan = parseFloat(69.3451);
               console.log(Lat);
               console.log(Lan);

             // The location
             const location = { lat: Lat, lng: Lan};
             // The map, centered at Uluru
             const map = new google.maps.Map(document.getElementById("map"), {
               zoom: 5,
               center: location,
             });
             // The marker, positioned at Uluru
             new google.maps.Marker({ position: location, map: map });
           }
       </script>
@endif
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
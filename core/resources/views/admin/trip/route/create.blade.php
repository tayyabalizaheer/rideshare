@extends('user')
@section('import-css')
    <link rel="stylesheet" href="{{asset('assets/admin/css/bootstrap-select.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/css/bootstrap-tagsinput.css')}}">
@endsection

@section('css')
    <style>
        .btn-light {
            background-color: #f8f9fa;
            border-color: #ced4da;
        }
        /* Set the size of the div element that contains the map */
        #map {
          height: 400px;
          /* The height is 400 pixels */
          width: 100%;
          /* The width is the width of the web page */
        }
        .bootstrap-tagsinput .tag {
            margin-right: 2px;
            color: #fffdfd;
            background: #555f69;
            padding: 2px 5px;
            border-radius: 2px;
        }
        .bootstrap-tagsinput{
            width: 100%;
            min-height: 40px;
        }
        .bootstrap-select>.dropdown-toggle.bs-placeholder, .bootstrap-select>.dropdown-toggle.bs-placeholder:active, .bootstrap-select>.dropdown-toggle.bs-placeholder:focus, .bootstrap-select>.dropdown-toggle.bs-placeholder:hover {
            color: #1d1919;
        }

    </style>
@stop

<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDygYvsPmW7qvJQrqmZrxr_ezdaZ0LjZr4&callback=initMap&libraries=&v=weekly"
></script>

@section('driver')

    <h2 class="mb-4">{{$page_title}}</h2>

    <div class="container card mb-4">
        <div class="card-header bg-white font-weight-bold">
            <a href="{{route('manage-route')}}" class="btn btn-success btn-md float-right">
                <i class="fa-fw fas fa-map"></i> All Route
            </a>
        </div>
        <div class="row">
            <div class="col-12 col-md-4">
                <div id="map"></div>
            </div>
            <div class="col-12 col-md-8">
                <form role="form" method="POST" action="{{route('manage-route.store')}}" name="editForm"
                      enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="card-body">
                        <div class="form-row">
                            <div class="offset-md-1 col-md-9 mb-3">
                                @include('errors.error')
                            </div>
                        </div>


                        <div class="form-row">
                            <div class="offset-md-1 col-md-9 mb-3">
                                <label><strong>Route Name <span class="error">*</span></strong></label>
                                <input type="text" name="name" placeholder="Route Name" value="{{old('name')}}"
                                       class="form-control form-control-lg @if ($errors->has('name'))  is-invalid @endif">
                            </div>

                            <div class="offset-md-1 col-md-9 mb-3">
                                <label><strong>Start Point <span class="error">*</span></strong></label>
                                <select id="start-point" name="start_point"
                                        class="form-control form-control-lg draw-marker"
                                        data-live-search="true">
                                    <option value="">Select Start Point</option>
                                    @foreach($tripLocation as $data)
                                        <option value="{{$data->id}}">{{$data->name}}</option>
                                    @endforeach
                                </select>
                                <input type="text" id="s-p-lat" name="s-p-lat" hidden="hidden">
                                <input type="text" id="s-p-lan" name="s-p-lan" hidden="hidden">
                            </div>

                            <div class="offset-md-1 col-md-9 mb-3">
                                <label><strong>End Point <span class="error">*</span></strong></label>
                                <select  id="end-point" name="end_point"
                                        class="form-control form-control-lg draw-marker"
                                        data-live-search="true">
                                    <option value="">Select End Point</option>
                                    @foreach($tripLocation as $data)
                                        <option value="{{$data->id}}">{{$data->name}}</option>
                                    @endforeach
                                </select>
                                <input type="text" id="e-p-lat" name="e-p-lat" hidden="hidden">
                                <input type="text" id="e-p-lan" name="e-p-lan" hidden="hidden">
                            </div>


                            <div class="offset-md-1 col-md-9 mb-3">
                                <label class="mb-1"><strong>Stoppage Points <span class="error">*</span></strong></label>
                                <input type="text"  name="stoppage" placeholder="Stoppage Points" value="{{old('stoppage')}}" data-role="tagsinput"
                                       class="stoppage form-control form-control-lg @if ($errors->has('stoppage'))  is-invalid @endif">
                            </div>

                            <div class="offset-md-1 col-md-9 mb-3">
                                <label><strong>Distance <span class="error">*</span></strong></label>
                                <div class="input-group mb-3">
                                    <input id="distance" type="text" name="distance" placeholder="Distance" value="{{old('distance')}}"
                                           class="form-control form-control-lg @if ($errors->has('distance'))  is-invalid @endif">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><strong>kilometer</strong></span>
                                    </div>
                                </div>
                            </div>

                            <div class="offset-md-1 col-md-9 mb-3">
                                <label><strong>Price per seat<span class="error">*</span></strong></label>
                                <div class="input-group mb-3">
                                    <input id="price_per_kilo" type="number" name="price" placeholder="Distance" value="{{old('price')}}"
                                           class="form-control form-control-lg @if ($errors->has('price'))  is-invalid @endif">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><strong>Price</strong></span>
                                    </div>
                                </div>
                            </div>

                            <div class="offset-md-1 col-md-9 mb-3">
                                <label><strong>Approximate Time <span class="error">*</span></strong></label>
                                <div class="input-group mb-3">
                                    <input type="text" name="approximate_time" placeholder="Approximate Time"
                                           value="{{old('approximate_time')}}"
                                           class="form-control form-control-lg @if ($errors->has('approximate_time'))  is-invalid @endif">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><strong>hours</strong></span>
                                    </div>
                                </div>
                            </div>

                        </div>


                        <div class="form-row">
                            <div class="offset-md-1 col-md-9 mb-3">
                                <label><strong>Status</strong></label>
                                <input type="checkbox" name="status" data-toggle="toggle" data-on="Active" data-off="DeActive"
                                       checked
                                       data-onstyle="success" data-offstyle="danger" data-width="100%">
                            </div>
                        </div>

                    </div>

                    <div class="card-footer bg-white">
                        <button class="btn btn-success btn-block btn-lg" type="submit">Save</button>
                    </div>

                </form>
            </div>
        </div>
        
    </div>


@endsection

@section('import-script')
    <script src="{{asset('assets/admin/js/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/bootstrap-tagsinput.js')}}"></script>

@stop
@section('script')
    <script>
        $( ".draw-marker" ).change(function() {
            console.log(this.id);
            point_id = this.id;
              $.ajax({
                url: "{{url('get_location')}}/"+$(this).val(), 
                success: function(result){
                console.log(result);
                  Lat = parseFloat(result.latitude);
                  Lan = parseFloat(result.longitude);
                    
                    
                    if (point_id=="start-point") {
                        $('#s-p-lat').val(result.latitude);
                        $('#s-p-lan').val(result.longitude);
                    }else if(point_id=="end-point"){
                        $('#e-p-lat').val(result.latitude);
                        $('#e-p-lan').val(result.longitude);
                    }

                    if ($('#s-p-lat').val() !='' && $('#s-p-lan').val() !='' && $('#e-p-lat').val() !='' && $('#e-p-lan').val() !='') {
                        drawline();
                    }else{
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
                  
              }});
        });
       // Initialize and add the map
       function getLoc() {
         if (navigator.geolocation) {
           navigator.geolocation.getCurrentPosition(initMap);
         } else { 
           console.log("Geolocation is not supported by this browser.");
         }
       }
       function getLan() {
         if (navigator.geolocation) {
           navigator.geolocation.getCurrentPosition(setlan);
         } else { 
           console.log("Geolocation is not supported by this browser.");
         }
       }

       function setlat(position) {
         return position.coords.latitude;
       }
       function setlan(position) {
         return position.coords.longitude;
       }
       getLoc();
       function initMap(position) {
         Lat = position.coords.latitude;
         Lan = position.coords.longitude;
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
        slat = parseFloat($('#s-p-lat').val());
        slan = parseFloat($('#s-p-lan').val());
        elat = parseFloat($('#e-p-lat').val());
        elan = parseFloat($('#e-p-lan').val());
         const map = new google.maps.Map(document.getElementById("map"), {
           zoom: 8,
           center: { lat: slat, lng: slan },
           mapTypeId: "terrain",
         });
         const flightPlanCoordinates = [
           { lat: slat, lng: slan },
           { lat: elat, lng: elan },
         ];
         distance = getDistance({ lat: slat, lng: slan },{ lat: elat, lng: elan });
         price_per_kilo = "{{$Gset->price_per_kilo}}";
         price_per_kilo = parseInt(price_per_kilo);
         $('#distance').val(distance);
         $('#price_per_kilo').val(price_per_kilo*distance);
         console.log(distance);
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

       var rad = function(x) {
         return x * Math.PI / 180;
       };

       function getDistance(p1, p2) {
        console.log('distance');
        console.log(p1);
        console.log(p2);
         var R = 6378137; // Earth’s mean radius in meter
         var dLat = rad(p2.lat - p1.lat);
         var dLong = rad(p2.lng - p1.lng);
         var a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
           Math.cos(rad(p1.lat)) * Math.cos(rad(p2.lat)) *
           Math.sin(dLong / 2) * Math.sin(dLong / 2);
         var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
         var d = R * c;
         return parseInt(d/1000); // returns the distance in kilometer
       };
    </script>

@stop
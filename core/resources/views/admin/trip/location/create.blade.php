@extends('admin.layout.master')
@section('import-css')
    <link href="{{ asset('assets/admin/css/bootstrap-fileinput.css') }}" rel="stylesheet">
    <style type="text/css">
        #map {
          height: 400px;
        }
    </style>
@stop

@section('body')
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDygYvsPmW7qvJQrqmZrxr_ezdaZ0LjZr4&callback=initMap&libraries=&v=weekly" defer></script>
    <h2 class="mb-4">{{$page_title}}</h2>

    <div class="card mb-4">
        <div class="card-header bg-white font-weight-bold">
            <a href="{{route('manage-location')}}" class="btn btn-success btn-md float-right">
                <i class="fa-fw fas fa-map"></i> All Location
            </a>
        </div>
        <div class="row">
            <div class="col-12 col-md-4">
                <div id="map"></div>
            </div>
            <div class="col-12 col-md-8">
                <form role="form" method="POST" action="{{route('manage-location.store')}}" name="editForm"
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
                                <label><strong>Location Name <span class="error">*</span></strong></label>
                                <input id="address" type="text" name="name" placeholder="Location Name" value="{{old('name')}}"
                                       class="form-control form-control-lg @if ($errors->has('name'))  is-invalid @endif">
                                       <input id="submit" class="btn btn-info" type="button" value="Get position" />
                            </div>

                            <div class="offset-md-1 col-md-9 mb-3">
                                <label><strong>Description</strong></label>
                                <textarea name="description" class="form-control" placeholder="Description">{{old('description')}}</textarea>
                            </div>

                            <div class="offset-md-1 col-md-9 mb-3">
                                <label><strong>Latitude</strong></label>
                                <input id="lat" type="text" name="latitude" placeholder="latitude " value="{{old('latitude')}}"
                                       class="form-control form-control-lg @if ($errors->has('latitude'))  is-invalid @endif">
                            </div>

                            <div class="offset-md-1 col-md-9 mb-3">
                                <label><strong>Longitude</strong></label>
                                <input id="lan" type="text" name="longitude" placeholder="longitude" value="{{old('longitude')}}"
                                       class="form-control form-control-lg @if ($errors->has('longitude'))  is-invalid @endif">
                            </div>
                        </div>


                        <div class="form-row">
                            <div class="offset-md-1 col-md-9 mb-3">
                                <label><strong>Image</strong></label>

                                <div class="form-group">

                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;" data-trigger="fileinput">
                                            <img style="width: 200px" src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=Image" alt="...">

                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                                        <div>
                                                        <span class="btn btn-info btn-file">
                                                            <span class="fileinput-new bold uppercase"><i class="fa fa-file-image-o"></i> Select image</span>
                                                            <span class="fileinput-exists bold uppercase"><i class="fa fa-edit"></i> Change</span>
                                                            <input type="file" name="image" accept="image/*" >
                                                        </span>
                                            <a href="#" class="btn btn-danger fileinput-exists bold uppercase" data-dismiss="fileinput"><i class="fa fa-trash"></i> Remove</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>




                        <div class="form-row">
                            <div class="offset-md-1 col-md-9 mb-3">
                                <label><strong>Status</strong></label>
                                <input type="checkbox" name="status" data-toggle="toggle" data-on="Active" data-off="DeActive" checked
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
    <script src="{{ asset('assets/admin/js/bootstrap-fileinput.js') }}"></script>
@stop
@section('script')
    <script>
      function initMap() {
        const map = new google.maps.Map(document.getElementById("map"), {
          zoom: 10,
          center: { lat: 30.3753, lng: 69.3451 },
        });
        const geocoder = new google.maps.Geocoder();
        document.getElementById("address").addEventListener("change", () => {
          geocodeAddress(geocoder, map);
        });
        document.getElementById("address").addEventListener("change", () => {
          geocodeAddress(geocoder, map);
        });
      }

      function geocodeAddress(geocoder, resultsMap) {
        const address = document.getElementById("address").value;
        geocoder.geocode({ address: address }, (results, status) => {
          if (status === "OK") {
            resultsMap.setCenter(results[0].geometry.location);
            loc = results[0].geometry.location;
            lat = loc.lat();
            lan = loc.lng();
            $('#lat').val(lat);
            $('#lan').val(lan);
            console.log(loc);
            console.log(lat);
            console.log(lan);
            new google.maps.Marker({
              map: resultsMap,
              position: results[0].geometry.location,
            });
          } else {
            alert(
              "Geocode was not successful for the following reason: " + status
            );
          }
        });
      }
    </script>

@stop

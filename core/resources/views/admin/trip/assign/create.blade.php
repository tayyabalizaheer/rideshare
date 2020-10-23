@extends('user')
@section('import-css')
    <link rel="stylesheet" href="{{asset('assets/admin/css/bootstrap-select.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/css/jquery.simple-dtpicker.css')}}">
@endsection

@section('css')
    <style>
        .btn-light {
            background-color: #f8f9fa;
            border-color: #ced4da;
        }
        .bootstrap-select > .dropdown-toggle.bs-placeholder, .bootstrap-select > .dropdown-toggle.bs-placeholder:active, .bootstrap-select > .dropdown-toggle.bs-placeholder:focus, .bootstrap-select > .dropdown-toggle.bs-placeholder:hover {
            color: #1d1919;
        }
    </style>
@stop


@section('driver')

    <h2 class="mb-4">{{$page_title}}</h2>

    <div class="card mb-4">
        <div class="card-header bg-white font-weight-bold">
            <a href="{{route('trip-assign')}}" class="btn btn-success btn-md float-right">
                <i class="fa-fw fas fa-map"></i> All Rides
            </a>
        </div>

        <form role="form" method="POST" action="{{route('trip-assign.store')}}" name="editForm"
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
                        <label><strong>Vehical<span class="error">*</span></strong></label>
                        <select name="fleet_registration_id"
                                class="form-control form-control-lg"
                                data-live-search="true">
                            <option value="">Select a Vehical Registration</option>
                            @foreach($fleet_registration as $data)
                                <option value="{{$data->id}}">{{$data->reg_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="offset-md-1 col-md-9 mb-3">
                        <label><strong>Route Name <span class="error">*</span></strong></label>
                        <select name="trip_route_id"
                                class="form-control form-control-lg "
                                data-live-search="true">
                            <option value="">Select a route</option>
                            @foreach($tripRoute as $data)
                                <option value="{{$data->id}}">{{$data->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="offset-md-1 col-md-9 mb-3">
                        <label><strong>Trip Start Date <span class="error">*</span></strong></label>
                        <input name="start_date" class="form-control form-control-lg" type="datetime-local"
                               placeholder="Arrival Time" id="start_date" value="">
                    </div>

                    <div class="offset-md-1 col-md-9 mb-3">
                        <label><strong>Arrival Time <span class="error">*</span></strong></label>
                        <input name="end_date" class="form-control form-control-lg" type="datetime-local"
                               placeholder="Trip End Date" id="end_date" value="">
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



@endsection


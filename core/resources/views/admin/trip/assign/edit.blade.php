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
                <i class="fa-fw fas fa-map"></i> All Trip/Assign
            </a>
        </div>

        <form role="form" method="POST" action="{{route('trip-assign.update',$tripAssign)}}" name="editForm"
              enctype="multipart/form-data">
            {{ csrf_field() }}
            {{method_field('put')}}

            <div class="card-body">
                <div class="form-row">
                    <div class="offset-md-1 col-md-9 mb-3">
                        @include('errors.error')
                    </div>
                </div>


                <div class="form-row">
                    <div class="offset-md-1 col-md-9 mb-3">
                        <label><strong>Fleet Registration No. <span class="error">*</span></strong></label>
                        <select name="fleet_registration_id"
                                class="form-control form-control-lg "
                                data-live-search="true">
                            <option value="">Select a Fleet Registration</option>
                            @foreach($fleet_registration as $data)
                                <option value="{{$data->id}}"  @if($tripAssign->fleet_registration_id == $data->id) selected @endif>{{$data->reg_name}}</option>
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
                                <option value="{{$data->id}}" @if($tripAssign->trip_route_id == $data->id) selected  @endif>{{$data->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="offset-md-1 col-md-9 mb-3">
                        <label><strong>Trip Start Date <span class="error">*</span></strong></label>
                        <input name="start_date" class="form-control form-control-lg" type="datetime-local"
                               placeholder="Trip Start Date" id="start_date" value="{{$tripAssign->start_date}}">
                    </div>

                    <div class="offset-md-1 col-md-9 mb-3">
                        <label><strong>Arrival Time<span class="error">*</span></strong></label>
                        <input name="end_date" class="form-control form-control-lg" type="datetime-local"
                               placeholder="Trip End Date" id="end_date" value="{{$tripAssign->end_date}}">
                    </div>

                </div>


                <div class="form-row">
                    <div class="offset-md-1 col-md-9 mb-3">
                        <label><strong>Status</strong></label>
                        <input type="checkbox" name="status" data-toggle="toggle" data-on="Active" data-off="DeActive"
                              @if($tripAssign->status == 1) checked @endif data-onstyle="success" data-offstyle="danger" data-width="100%">
                    </div>
                </div>

            </div>

            <div class="card-footer bg-white">
                <button class="btn btn-success btn-block btn-lg" type="submit">Save</button>
            </div>

        </form>
    </div>



@endsection


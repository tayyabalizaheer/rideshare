@extends('admin.layout.master')
@section('body')
    <div class="card">
        <div class="card-header bg-white font-weight-bold">
            <h4>Contact Settings</h4>
        </div>
        <div class="card-body">
            {!! Form::model($basic,['route'=>['contact-setting-update',$basic->id],'method'=>'PUT','role'=>'form','class'=>'form-horizontal','files'=>true]) !!}


            <div class="form-group">
                <label class="col-md-9 offset-md-1"><strong class="text-uppercase">Contact Phone</strong></label>
                <div class="col-md-9 offset-md-1">
                    <div class="input-group">
                        <input type="text" name="phone" class="form-control form-control-lg"
                               value="{{ $basic->phone }}" required>
                        <div class="input-group-append"><span class="input-group-text"><i class="fa fa-phone"></i></span></div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-9 offset-md-1"><strong class="text-uppercase">Contact Email</strong></label>
                <div class="col-md-9 offset-md-1">
                    <div class="input-group">
                        <input type="text" name="email" class="form-control form-control-lg"
                               value="{{ $basic->email }}" required>
                        <div class="input-group-append"><span class="input-group-text"><i class="fa fa-envelope-open"></i></span></div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-9 offset-md-1"><strong class="text-uppercase">Contact Address</strong></label>
                <div class="col-md-9 offset-md-1">
                    <div class="input-group">
                        <input type="text" name="address" class="form-control form-control-lg"
                               value="{{ $basic->address }}" required>
                        <div class="input-group-append"><span class="input-group-text"><i class="fa fa-map-marker"></i></span></div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-9 offset-md-1"><strong class="text-uppercase">Contact Location</strong></label>
                <div class="col-md-9  offset-md-1">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><strong>latitude</strong></div>
                                </div>
                                <input type="text" name="latitude" value="{{$basic->latitude}}" class="form-control form-control-lg"  placeholder="latitude">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><strong>longitude</strong></div>
                                </div>
                                <input type="text" name="longitude" value="{{$basic->longitude}}" class="form-control form-control-lg"  placeholder="longitude">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <br>

            <div class="form-group">
                <div class="col-9 offset-1">
                    <button type="submit" class="btn btn-primary btn-block btn-lg"><i class="fa fa-send"></i> UPDATE
                    </button>
                </div>
            </div>


            {!! Form::close() !!}

        </div>
    </div>
@stop
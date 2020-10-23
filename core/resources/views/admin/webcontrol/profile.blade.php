@extends('admin.layout.master')
@section('import-css')
    <link href="{{ asset('assets/admin/css/bootstrap-fileinput.css') }}" rel="stylesheet">
@stop
@section('body')
         <div class="card">
             <div class="card-header bg-white font-weight-bold">
                 <h4>{{$page_title}}</h4>
             </div>

             <form class="form-horizontal" role="form" action="{{url('admin/profile')}}" method="post" enctype="multipart/form-data">
                 @csrf
                <div class="card-body">
                        <input type="hidden" name="id" value="{{$admin->id}}">
                        <div class="form-body">
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label class="col-md-2 offset-1 control-label"><b>Name</b></label>
                                <div class="col-md-9 offset-1">
                                    <div class="input-group">
                                        <input type="text" name="name" value="{{$admin->name}}" class="form-control form-control-lg"
                                               placeholder="Your Name">
                                        <div class="input-group-append"><span class="input-group-text"><i class="fa fa-user"></i></span></div>
                                    </div>
                                    @if ($errors->has('name'))
                                            <strong class="error">{{ $errors->first('name') }}</strong>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                <label class="col-md-2 offset-1 control-label"><b>Email</b></label>
                                <div class="col-md-9 offset-1">
                                    <div class="input-group">
                                        <input type="email" name="email" value="{{$admin->email}}" class="form-control form-control-lg"
                                               placeholder="Your Email">
                                        <div class="input-group-append"><span class="input-group-text"><i class="fa fa-envelope"></i></span></div>
                                    </div>
                                    @if ($errors->has('email'))
                                            <strong class="error">{{ $errors->first('email') }}</strong>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                                <label class="col-md-2 offset-1 control-label"><b>Mobile</b></label>
                                <div class="col-md-9 offset-1">
                                    <div class="input-group">
                                        <input type="text" name="mobile" value="{{$admin->mobile}}" class="form-control form-control-lg"
                                               placeholder="Your Mobile">
                                        <div class="input-group-append"><span class="input-group-text"><i class="fa fa-phone"></i></span></div>
                                    </div>
                                    @if ($errors->has('mobile'))
                                            <strong class="error">{{ $errors->first('mobile') }}</strong>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 offset-1 control-label"><b>Profile</b></label>
                                <div class="col-md-9 offset-1">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        @if($admin->image == null)
                                            <div class="fileinput-new thumbnail" style="width: 215px; height: 215px;" data-trigger="fileinput">
                                                <img style="width: 215px" src="{{ asset('assets/images/user/user-default.jpg') }}/" alt="...">
                                            </div>
                                        @else
                                            <div class="fileinput-new thumbnail" style="width: 215px; height: 215px;" data-trigger="fileinput">
                                                <img style="width: 215px" src="{{ asset('assets/admin/img') }}/{{$admin->image}}" alt="...">
                                            </div>
                                        @endif

                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 215px; max-height: 215px"></div>
                                        <div>
                                                <span class="btn btn-info btn-file">
                                                    <span class="fileinput-new bold uppercase"><i class="fa fa-file-image-o"></i> Select image</span>
                                                    <span class="fileinput-exists bold uppercase"><i class="fa fa-edit"></i> Change</span>
                                                    <input type="file" name="image" accept="image/*">
                                                </span>
                                            <a href="#" class="btn btn-danger fileinput-exists bold uppercase" data-dismiss="fileinput"><i class="fa fa-trash"></i> Remove</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                </div>

                 <div class="card-footer bg-white">
                     <button class="btn btn-primary btn-block btn-lg" type="submit">Update </button>
                 </div>

             </form>
            </div>


@stop

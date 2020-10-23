@extends('admin.layout.master')
@section('import-css')
    <link href="{{ asset('assets/admin/css/bootstrap-fileinput.css') }}" rel="stylesheet">
@stop
@section('body')
    <div class="card">
        <div class="card-header bg-white font-weight-bold">
            <h4>{{$page_title}}</h4>
        </div>

        {!! Form::model($basic,['route'=>['manage-footer-update'],'method'=>'PUT','role'=>'form','class'=>'form-horizontal','files'=>true]) !!}

        <div class="card-body">

            <div class="row">
                <div class="col-md-12">

                    <div class="form-group{{ $errors->has('short_about') ? ' has-error' : '' }}">
                        <label class="col-md-12"><strong class="text-uppercase">WebSite short About </strong></label>
                        <div class="col-md-12">
                            <textarea name="short_about" rows="5" class="form-control"
                                      required>{{ $basic->short_about }}</textarea>
                            @if ($errors->has('short_about'))
                                <span class="help-block">
                                                <strong>{{ $errors->first('short_about') }}</strong>
                                            </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group{{ $errors->has('news_h') ? ' has-error' : '' }}">
                        <label class="col-md-12"><strong class="text-uppercase">News Title </strong></label>
                        <div class="col-md-12">
                            <textarea name="news_h" class="form-control" required>{{$basic->news_h}}</textarea>
                            @if ($errors->has('news_h'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('news_h') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('news_p') ? ' has-error' : '' }}">
                        <label class="col-md-12"><strong class="text-uppercase">News Sub-Title </strong></label>
                        <div class="col-md-12">
                            <textarea name="news_p" class="form-control" required>{{$basic->news_p}}</textarea>
                            @if ($errors->has('news_p'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('news_p') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>



                    <div class="form-group{{ $errors->has('enquiry_h') ? ' has-error' : '' }}">
                        <label class="col-md-12"><strong class="text-uppercase">Enquiry Title </strong></label>
                        <div class="col-md-12">
                            <textarea name="enquiry_h" class="form-control" required>{{$basic->enquiry_h}}</textarea>
                            @if ($errors->has('enquiry_h'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('enquiry_h') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('enquiry_p') ? ' has-error' : '' }}">
                        <label class="col-md-12"><strong class="text-uppercase">Enquiry Sub-Title </strong></label>
                        <div class="col-md-12">
                            <textarea name="enquiry_p" class="form-control" required>{{$basic->enquiry_p}}</textarea>
                            @if ($errors->has('enquiry_p'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('enquiry_p') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group{{ $errors->has('fb_comment') ? ' has-error' : '' }}">
                        <label class="col-md-12"><strong class="text-uppercase">Facebook Comment Script</strong></label>
                        <div class="col-md-12">
                            <textarea name="fb_comment" rows="10" class="form-control"
                                      required>{{ $basic->fb_comment }}</textarea>
                            @if ($errors->has('fb_comment'))
                                <span class="help-block">
                                                <strong>{{ $errors->first('fb_comment') }}</strong>
                                            </span>
                            @endif
                        </div>
                    </div>



                </div>
            </div><!-- row -->

        </div>
        <div class="card-footer bg-white">
            <button class="btn btn-primary btn-block btn-lg" type="submit"> <i class="fa fa-send"></i> Update</button>
        </div>


        {!! Form::close() !!}
    </div>


@stop

@section('import-script')
    <script src="{{ asset('assets/admin/js/bootstrap-fileinput.js') }}"></script>
@stop
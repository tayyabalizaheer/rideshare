@extends('admin.layout.master')
@section('import-css')
    <link href="{{ asset('assets/admin/css/bootstrap-fileinput.css') }}" rel="stylesheet">
@stop
@section('body')
    <div class="card">
        <div class="card-header bg-white font-weight-bold">
            <h4>{{$page_title}}</h4>
        </div>

        <form class="form-horizontal" method="post" role="form" enctype="multipart/form-data">
            {!! csrf_field() !!}
            <div class="card-body">

                <div class="form-group{{ $errors->has('about') ? ' has-error' : '' }}">
                    <label class="col-md-12"><strong style="text-transform: uppercase;">About Page</strong></label>
                    <div class="col-md-12">
                        <textarea id="area1" class="form-control form-control-lg" rows="10" name="about">{{ $basic->about }}</textarea>
                        @if ($errors->has('about'))
                            <span class="help-block">
                                            <strong>{{ $errors->first('about') }}</strong>
                                        </span>
                        @endif
                    </div>
                </div>
                <br>

                <div class="form-group">
                    <div class="col-md-12">
                        <h6> Thumbnail</h6>
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;"
                                 data-trigger="fileinput">
                                <img style="width: 200px" src="{{asset('assets/images/about-video-image.jpg')}}"
                                     alt="...">
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail"
                                 style="max-width: 200px; max-height: 150px"></div>
                            <div>
                                                <span class="btn btn-info btn-file">
                                                    <span class="fileinput-new bold uppercase"><i
                                                                class="fa fa-file-image-o"></i> Select image</span>
                                                    <span class="fileinput-exists bold uppercase"><i
                                                                class="fa fa-edit"></i> Change</span>
                                                    <input type="file" name="image" accept="image/*">
                                                </span>
                                <a href="#" class="btn btn-danger fileinput-exists bold uppercase"
                                   data-dismiss="fileinput"><i class="fa fa-trash"></i> Remove</a>
                            </div>
                        </div>
                        @if ($errors->has('image'))
                            <div class="error">{{ $errors->first('image') }}</div>
                        @endif
                    </div>
                    <br>


                </div>

            </div>
            <div class="card-footer bg-white">
                <button class="btn btn-primary btn-block btn-lg" type="submit">Update About</button>
            </div>


        </form>
    </div>



@stop
@section('script')
    <script type="text/javascript" src="{{asset('assets/admin/js/nicEdit-latest.js')}}"></script>

    <script type="text/javascript">
        bkLib.onDomLoaded(function () {
            new nicEditor({fullPanel: true}).panelInstance('area1');
        });
    </script>
@stop
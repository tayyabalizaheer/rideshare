@extends('admin.layout.master')

@section('import-css')
    <link href="{{ asset('assets/admin/css/bootstrap-fileinput.css') }}" rel="stylesheet">
@stop
@section('body')

    <div class="card">

        <div class="card-header bg-white font-weight-bold">
            <h4 class="float-left">{{$page_title}}</h4>
            <a href="{{route('admin.whyUs')}}" class="btn btn-success btn-md float-right ">
                <i class="fa fa-list-alt"></i> All  List
            </a>
        </div>


        <div class="card-body">

            <form role="form" method="POST" action="{{route('whyUs.update')}}" name="editForm" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{$post->id}}">
                <div class="row">
                    <div class="col-md-10 offset-1">
                        <h4> Title</h4>
                        <div class="input-group">
                            <input type="text" value="{{$post->name}}" class="form-control form-control-lg"
                                   name="name">
                            <div class="input-group-append"><span class="input-group-text">
                                            <i class="fa fa-font"></i>
                                            </span>
                            </div>
                        </div>
                        @if ($errors->has('name'))
                            <div class="error">{{ $errors->first('name') }}</div>
                        @endif

                    </div>
                </div>
                <br>
                <br>
                <div class="row">
                    <div class="col-md-10 offset-1">
                        <h5> Icon</h5>
                        <div class="input-group">
                            <input type="text" class="form-control form-control-lg" value="{{$post->icon}}" name="icon">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fa fa-font"></i></span>
                            </div>
                        </div>
                        @if ($errors->has('icon'))
                            <div class="error">{{ $errors->first('icon') }}</div>
                        @endif

                    </div>
                </div>
                <br>



                <div class="row">
                    <div class="col-md-10 offset-1">
                        <h4>Details</h4>
                        <textarea name="details"   rows="6" class="form-control form-control-lg">{{$post->details}}</textarea>
                    </div>
                </div>
                <br><br>
                <div class="form-group row">
                    <div class="col-md-10 offset-1">
                        <button class="btn btn-primary btn-lg btn-block" type="submit">Update</button>
                    </div>
                </div>


            </form>
        </div>
    </div>


@endsection

@section('import-script')
    <script src="{{ asset('assets/admin/js/bootstrap-fileinput.js') }}"></script>
@stop
@section('script')
@stop

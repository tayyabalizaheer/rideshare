@extends('admin.layout.master')

@section('import-css')
    <link href="{{ asset('assets/admin/css/bootstrap-fileinput.css') }}" rel="stylesheet">
@stop
@section('body')

    <div class="card">

        <div class="card-header bg-white font-weight-bold">
            <h4 class="float-left">{{$page_title}}</h4>
            <a href="{{route('admin.whyUs')}}" class="btn btn-success btn-md float-right ">
                <i class="fa fa-list-alt"></i> All
            </a>
        </div>


        <div class="card-body">

            <form role="form" method="POST" action="" name="editForm" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="row">
                    <div class="col-md-10 offset-1">
                        <h5> Title</h5>
                        <div class="input-group">
                            <input type="text" class="form-control form-control-lg" value="{{old('name')}}"
                                   name="name">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fa fa-font"></i></span>
                            </div>
                        </div>
                        @if ($errors->has('name'))
                            <div class="error">{{ $errors->first('name') }}</div>
                        @endif

                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-10 offset-1">
                        <h5> Icon</h5>
                        <div class="input-group">
                            <input type="text" class="form-control form-control-lg" value="{{old('icon')}}" name="icon">
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
                        <h6>Details</h6>
                        <textarea name="details" id="area1" cols="30" rows="6" class="form-control form-control-lg">{{old('details')}}</textarea>
                    </div>
                </div>
                <br>

                <div class="row form-group">
                    <div class="col-md-10 offset-1">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Save</button>
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

@extends('admin.layout.master')
@section('import-css')
    <link href="{{ asset('assets/admin/css/bootstrap-fileinput.css') }}" rel="stylesheet">
@stop
@section('body')
    <div class="card">

        <div class="card-header bg-white font-weight-bold">
            <h2>{{$page_title}}</h2>
        </div>


        <form class="form-horizontal" action="" method="post" role="form" enctype="multipart/form-data">

            {!! csrf_field() !!}
        <div class="card-body">
            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                <label class="col-md-12"><strong style="text-transform: uppercase;">Title</strong></label>
                <div class="col-md-12">
                    <input class="form-control form-control-lg" name="title" placeholder="" type="text" required>
                    @if ($errors->has('title'))
                        <span class="help-block">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('sub_title') ? ' has-error' : '' }}">
                <label class="col-md-12"><strong style="text-transform: uppercase;">Sub title</strong></label>
                <div class="col-md-12">
                    <input class="form-control form-control-lg" name="sub_title" placeholder="" type="text" required>
                    @if ($errors->has('sub_title'))
                        <span class="help-block">
                            <strong>{{ $errors->first('sub_title') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-12"><strong style="text-transform: uppercase;">Details</strong></label>
                <div class="col-md-12">
                    <textarea id="area1" class="form-control form-control-lg" rows="5" name="description"></textarea>
                </div>
            </div>


        </div>

            <div class="card-footer bg-white">
                <button class="btn btn-primary btn-block btn-lg" type="submit">Create Slider</button>
            </div>

        </form>
    </div>


    <div class="card">
        <div class="card-body">
            <div class="row">
                @foreach($slider as $data)
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body text-center">
                                <h3>{{$data->title}}</h3>

                                <h5 style="margin-bottom: 20px">{{$data->sub_title}}</h5>
                                <p>{{$data->description}}</p>



                            </div>
                            <div class="card-footer">
                                <button type="button" class="btn btn-danger btn-block btn-lg delete_button"
                                        data-toggle="modal" data-target="#DelModal"
                                        data-id="{{ $data->id }}">
                                    <i class='fa fa-trash'></i> Delete
                                </button>
                            </div>



                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>



    <div class="modal fade" id="DelModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel2"><i class='fa fa-trash'></i> Delete !</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>


                <form method="post" action="{{ route('slider-delete') }}" >
                    {!! csrf_field() !!}
                    {{ method_field('DELETE') }}
                <div class="modal-body">
                    <strong>Are you sure you want to Delete ?</strong>
                </div>

                <div class="modal-footer">
                        <input type="hidden" name="id" class="abir_id" value="0">
                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> DELETE</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        Close
                    </button>

                </div>
                </form>

            </div>
        </div>
    </div>
@stop
@section('import-script')
    <script src="{{ asset('assets/admin/js/bootstrap-fileinput.js') }}"></script>
@stop
@section('script')
    <script>
        $(document).ready(function () {
            $(document).on("click", '.delete_button', function (e) {
                var id = $(this).data('id');
                $(".abir_id").val(id);
            });
        });
    </script>
@stop

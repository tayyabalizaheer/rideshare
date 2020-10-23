@extends('admin.layout.master')

@section('body')

    <div class="card">

        <div class="card-header bg-white font-weight-bold">
            <h4>{{$page_title}} Title</h4>
        </div>


        <div class="card-body">

            <form role="form" method="POST" action="" name="editForm" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="row">
                    <div class="col-md-10 offset-1">
                        <h5> Title</h5>
                        <div class="input-group">
                            <input type="text" class="form-control form-control-lg" value="{{$basic->why_us_h}}" name="why_us_h">
                            <div class="input-group-append"><span class="input-group-text"><i class="fa fa-font"></i></span></div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-10 offset-1">
                        <h5>Sub Title</h5>
                        <div class="input-group">
                            <input type="text" class="form-control form-control-lg" value="{{$basic->why_us_p}}" name="why_us_p">
                            <div class="input-group-append"><span class="input-group-text"><i class="fa fa-font"></i></span></div>
                        </div>
                    </div>
                </div>
                <br>

                <div class="row form-group">
                    <div class="col-md-10 offset-1">
                        <button type="submit" class="btn btn-success btn-lg btn-block">Update</button>
                    </div>
                </div>

            </form>

        </div>
    </div>


    <div class="card" style="margin-top: 20px">

        <div class="card-header bg-white font-weight-bold">
            <h4 class="float-left">{{$page_title}}</h4>
            <a href="{{route('whyUs.create')}}" class="btn btn-success btn-md float-right ">
                <i class="fa fa-plus"></i> Add New
            </a>
        </div>


        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th scope="col">SL</th>
                        <th scope="col">Icon</th>
                        <th scope="col" style="width: 25%">Icon Code</th>
                        <th scope="col">Title</th>
                        <th scope="col">Details</th>
                        <th scope="col" style="width: 10%">Action</th>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach($posts as $k=>$data)
                        <tr>
                            <td data-label="SL">{{++$k}}</td>
                            <td data-label="Icon">
                                <strong>{!! $data->icon !!}</strong>
                            </td>
                            <td data-label="Icon Code">
                                <strong>{{$data->icon}}</strong>
                            </td>


                            <td data-label="Name">
                                <strong>{{$data->name }}</strong>
                            </td>

                            <td data-label="Details">{{$data->details }}</td>
                            <td data-label="Action">
                                <a class=" btn btn-info btn-sm"
                                   href="{{route('whyUs.edit',$data->id)}}"><i
                                            class="fa fa-pencil-alt"></i></a>

                                <a href="#" class=" delete_button btn btn-sm btn-danger"
                                   data-toggle="modal" data-target="#DelModal"
                                   data-id="{{ $data->id }}">
                                    <i class='fa fa-trash'></i>
                                </a>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                {{$posts->links()}}
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

                <div class="modal-body">
                    <strong>Are you sure you want to Delete ?</strong>
                </div>


                <div class="modal-footer">
                    <form method="post" action="{{ route('whyUs.delete') }}" >
                        {!! csrf_field() !!}
                        {{ method_field('DELETE') }}

                        <input type="hidden" name="id" class="abir_id" value="0">
                        <button type="submit" class="btn btn-success"><i class="fa fa-trash"></i> Yes</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> No
                        </button>&nbsp;

                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $(document).on("click", '.delete_button', function (e) {
                var id = $(this).data('id');
                $(".abir_id").val(id);
            });
        });
    </script>
@endsection

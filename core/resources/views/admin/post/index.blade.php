@extends('admin.layout.master')

@section('body')

    <h2 class="mb-4">{{$page_title}}</h2>

    <div class="card">
        <div class="card-header bg-white font-weight-bold">
            <a href="{{route('blog.create')}}" class="btn btn-success btn-md float-right ">
                <i class="fa fa-plus"></i> Add Blog
            </a>
        </div>
        <div class="card-body">

            <table class="table table-hover">
                <thead>
                <tr>
                    <th>SL</th>
                    <th> Title</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>ACTION</th>
                </tr>
                </thead>
                <tbody>

                @foreach($posts as $k=>$data)
                    <tr>
                        <td data-label="SL">{{++$k}}</td>
                        <td data-label="Title">{{($data->title) ?? ''}}</td>
                        <td data-label="Category"><strong>{{($data->category->name) ?? ''}}</strong></td>
                        <td data-label="Status">
                            <span class="badge  badge-pill  badge-{{ $data->status ==0 ? 'warning' : 'success' }}">{{ $data->status == 0 ? 'Deactive' : 'Active' }}</span>
                        </td>
                        <td data-label="Action">
                            <a href="{{route('blog.edit',$data->id)}}" class="btn btn-primary  btn-icon btn-pill" title="Edit">
                                <i class="fa fa-edit"></i>
                            </a>


                            <button type="button" class="btn btn-danger  btn-icon btn-pill delete_button" title="Delete"
                                    data-toggle="modal" data-target="#DelModal"
                                    data-id="{{ $data->id }}">
                                <i class='fa fa-trash'></i>
                            </button>

                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>

            {!! $posts->render() !!}
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


                <form method="post" action="{{ route('blog.delete') }}">
                    {!! csrf_field() !!}
                    {{ method_field('DELETE') }}

                    <div class="modal-body">
                        <input type="hidden" name="id" class="abir_id" value="0">
                        <strong>Are you sure you want to Delete ?</strong>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success"> Yes</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal"> No</button>&nbsp;
                    </div>

                </form>

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
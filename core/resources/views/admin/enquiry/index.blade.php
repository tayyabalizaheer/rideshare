@extends('admin.layout.master')

@section('body')
    <div class="card">
        <div class="card-header bg-white font-weight-bold">
            <h2 class="mb-4">{{$page_title}}</h2>
        </div>
        <div class="card-body">

            <table class="table table-hover">
                <thead>
                <tr>
                    <th>SL</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th style="width: 40%">Enquiry</th>
                    <th>Read</th>
                    <th style="width: 15%">ACTION</th>
                </tr>
                </thead>
                <tbody>

                @foreach($enquiries as $k=>$data)
                    <tr>
                        <td data-label="SL">{{++$k}}</td>
                        <td data-label="Name"><strong>{{$data->name}}</strong></td>
                        <td data-label="Email"><strong>{{$data->email}}</strong></td>
                        <td data-label="Phone">{{$data->phone}}</td>
                        <td data-label="Enquiry">{{$data->enquiry}}</td>
                        <td data-label="Read">
                            <span class="badge  badge-pill  badge-{{ $data->read ==0 ? 'danger' : 'success' }}">{{ $data->read == 0 ? 'No' : 'Yes' }}</span>
                        </td>
                        <td data-label="Action">

                            <a href="{{route('enquiry.show',$data->id)}}" class="btn btn-success  btn-icon btn-pill"
                               title="Details">
                                <i class="fa fa-eye"></i>
                            </a>


                            <a href="javascript:void(0)" data-route="{{route('enquiry.destroy',$data->id)}}" data-id="{{$data->id}}" class="btn btn-danger  btn-icon btn-pill delete_button "
                               data-toggle="modal" data-target="#DelModal" title="Delete">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
            {!! $enquiries->render() !!}
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


                <form method="post"  class="action-route">
                    {!! csrf_field() !!}
                    {{ method_field('DELETE') }}

                    <div class="modal-body">
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

    <script type="text/javascript">
        $(document).ready(function () {
            $(document).on("click", '.delete_button', function (e) {
                var id = $(this).data('id');
                var route = $(this).data('route');
                $(".delete_id").val(id);
                $(".action-route").attr('action',route);

                console.log(route)
            });
        })
    </script>

@endsection
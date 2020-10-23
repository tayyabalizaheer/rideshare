@extends('admin.layout.master')
@section('import-css')
    <link href="{{ asset('assets/admin/css/bootstrap-fileinput.css') }}" rel="stylesheet">
@stop
@section('body')
    <div class="card">
        <div class="card-header bg-white font-weight-bold">
            <div class="float-left">
            <h2 class="mb-4">{{$page_title}}</h2>
            </div>

            <div class="float-right">
                <a href="javascript:void(0)" class="btn btn-success  btn-icon"
                   data-toggle="modal" data-target="#addModal">
                    <i class="fa fa-plus"></i> Add Vehical
                </a>
            </div>
        </div>
        <div class="card-body">
            @include('errors.error')

            <table class="table table-hover">
                <thead>
                <tr>
                    <th>SL</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Image</th>
                    <th>ACTION</th>
                </tr>
                </thead>
                <tbody>

                @foreach($fleet_type as $k=>$data)
                    <tr>
                        <td data-label="SL">{{++$k}}</td>
                        <td data-label="Name"><strong>{{$data->name}}</strong></td>
                        <td data-label="Status">
                            <span class="badge  badge-pill  badge-{{ $data->status ==0 ? 'danger' : 'success' }}">{{ $data->status == 0 ? 'Deactive' : 'Active' }}</span>
                        </td>
                        <td data-label="img">
                            <img src="{{ asset('core/public/assets/images/'. $data->fleet_img) }}" class="col-md-2">
                        </td>
                        <td data-label="Action">
                            <a href="javascript:void(0)" data-route="{{route('fleet-type.update',$data->id)}}"
                               data-id="{{$data->id}}" data-name="{{$data->name}}" data-status="{{$data->status}}" data-img ="{{ asset('core/public/assets/images/'. $data->fleet_img) }}" class="btn btn-info  btn-icon btn-pill edit_button"
                               data-toggle="modal" data-target="#DelModal" title="Edit">
                                <i class="fa fa-pencil-alt"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
            {!! $fleet_type->render() !!}
        </div>
    </div>




    <!--Vehical Type Add-->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel2"><i class='fa fa-check-circle'></i> Add New Vehical Type</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>


                <form method="post" action="{{route('fleet-type.store')}}" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="Name">Name</label>
                            <input type="text"  name="name" value="{{old('name')}}" class="form-control" placeholder="Name" >
                        </div>
                        <div class="form-group">
                            <label for="Name">Select Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="Status">Status</label>
                            <input data-toggle="toggle"  data-onstyle="success" data-offstyle="danger" data-on="Active" data-off="DeActive" data-width="100%" type="checkbox" name="status" checked>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success"> Yes</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal"> No</button>&nbsp;
                    </div>

                </form>

            </div>
        </div>
    </div>



    <!--Fleet Type Edit-->
    <div class="modal fade" id="DelModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel2"><i class='fa fa-edit'></i> Edit Vehical Type</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>


                <form method="post" action="" class="action-route" enctype="multipart/form-data">
                    {{method_field('put')}}
                    {!! csrf_field() !!}
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="Name">Name</label>
                            <input type="text"  name="name" class="form-control edit_name" placeholder="Name" >
                        </div>
                        <div class="form-group">
                            <img src="" class="fleetimg col-md-4">
                        </div>
                        <div class="form-group">
                            <label for="Name">Select Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        
                        <div class="form-group fleetStatus">
                            <label for="Status">Status</label>
                            <input class="edit_status" id="edit_status" data-toggle="toggle"  data-onstyle="success" data-offstyle="danger" data-on="Active" data-off="DeActive" data-width="100%" type="checkbox" name="status" >
                        </div>
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

@section('import-script')
    <script src="{{ asset('assets/admin/js/bootstrap-fileinput.js') }}"></script>
@stop
@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            $(document).on("click", '.edit_button', function (e) {

                var id = $(this).data('id');
                var name = $(this).data('name');
                var status = $(this).data('status');
                var route = $(this).data('route');
                var img = $(this).data('img');
                
                $(".delete_id").val(id);
                $(".edit_name").val(name);
                $(".action-route").attr('action', route);
                
                $(".fleetimg").attr('src', img);

                if(status == 1)
                {
                    $(".fleetStatus .toggle.btn").removeClass('btn-danger off');
                    $(".fleetStatus .toggle.btn").addClass('btn-success ');
                    $("#edit_status").attr('checked', true);
                }else{
                    $(".fleetStatus .toggle.btn").removeClass('btn-success ');
                    $(".fleetStatus .toggle.btn").addClass('btn-danger off');
                    $("#edit_status").attr('checked', false);
                }

            });
        })
    </script>

@endsection
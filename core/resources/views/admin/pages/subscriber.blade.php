@extends('admin.layout.master')

@section('body')
    <div class="card">

        <div class="card-header bg-white font-weight-bold">
            <h4 class="float-left">{{$page_title}}</h4>
            <a href="{{route('send.mail.subscriber')}}" class="btn btn-success btn-lg float-right">
                <i class="fa fa-envelope"></i> Send Email For Subscribers
            </a>
        </div>


                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Email</th>
                                <th>STATUS</th>
                                <th>ACTION</th>
                            </tr>
                            </thead>

                            <tbody>

                            @foreach($events as $k=>$mac)
                                <tr>
                                    <td>{{++$k}}</td>
                                    <td>{{$mac->email}}</td>
                                    <td>
                                        <span class="badge  badge-pill  badge-{{ $mac->status ==0 ? 'warning' : 'success' }}">{{ $mac->status == 0 ? 'Deactive' : 'Active' }}</span>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-sm btn-icon btn-pill edit_button" title="EDIT"
                                                data-toggle="modal" data-target="#myModal"
                                                data-act="Edit"
                                                data-status="{{$mac->status}}"
                                                data-id="{{$mac->id}}">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

    <!-- Modal for Edit button -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel"><b class="abir_act"></b> Category </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <form method="post" action="{{route('update.subscriber')}}">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="form-group">
                            <input class="form-control abir_id" type="hidden" name="id">

                        </div>
                        <div class="form-group">
                            <select name="status" id="event-status" class="form-control input-lg abir_status" required>
                                <option value="">Status</option>
                                <option value="1">Active</option>
                                <option value="0">Blocked</option>
                            </select>
                            <br>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Save changes</button>

                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $(document).on("click", '.edit_button', function (e) {
                var status = $(this).data('status');
                var id = $(this).data('id');
                var act = $(this).data('act');
                $(".abir_id").val(id);
                $(".abir_status").val(status).attr('selected', 'selected');
                $(".abir_act").text(act);
            });
        });
    </script>
@endsection
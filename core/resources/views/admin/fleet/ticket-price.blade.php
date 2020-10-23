@extends('admin.layout.master')
@section('import-css')
    <link rel="stylesheet" href="{{asset('assets/admin/css/bootstrap-select.min.css')}}">
@endsection
@section('css')
    <style>
        .btn-light {
            background-color: #f8f9fa;
            border-color: #ced4da;
        }

        .bootstrap-tagsinput .tag {
            margin-right: 2px;
            color: #fffdfd;
            background: #555f69;
            padding: 2px 5px;
            border-radius: 2px;
        }

        .bootstrap-tagsinput {
            width: 100%;
            min-height: 40px;
        }

        .bootstrap-select > .dropdown-toggle.bs-placeholder, .bootstrap-select > .dropdown-toggle.bs-placeholder:active, .bootstrap-select > .dropdown-toggle.bs-placeholder:focus, .bootstrap-select > .dropdown-toggle.bs-placeholder:hover {
            color: #1d1919;
        }

    </style>
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
                    <i class="fa fa-plus"></i> Add Price
                </a>
            </div>
        </div>
        <div class="card-body">
            @include('errors.error')

            <table class="table table-hover">
                <thead>
                <tr>
                    <th>SL</th>
                    <th>Route</th>
                    <th>Fleet Type</th>
                    <th>Price (per person)</th>
                    <th>Last Updated</th>
                    <th>ACTION</th>
                </tr>
                </thead>
                <tbody>

                @foreach($ticketPrice as $k=>$data) 
                    <tr>
                        <td data-label="SL">{{++$k}}</td>
                        <td data-label="Route">{{$data->tripRoute->name}}</td>
                        <td data-label="Fleet Type"><strong>{{$data->fleetType->name}}</strong></td>
                        <td data-label="Price"><strong>{{number_format($data->price,2)}} {{$basic->currency}}</strong>
                        <td data-label="Last Updated">{{date('d M Y',strtotime($data->updated_at))}}
                        </td>
                        <td data-label="Action">
                            <a href="javascript:void(0)" data-route="{{route('ticket-price.update',$data->id)}}"
                               data-id="{{$data->id}}" data-price="{{$data->price}}"
                               data-trip_route="{{$data->trip_route_id}} "
                               data-trip_route_name="{{$data->tripRoute->name}} "
                               data-fleet_type="{{$data->fleet_type_id}}"
                               class="btn btn-info  btn-icon btn-pill edit_button"
                               data-toggle="modal" data-target="#editModal" title="Edit">
                                <i class="fa fa-pencil-alt"></i>
                            </a>

                            <a href="javascript:void(0)" data-route="{{route('ticket-price.delete',$data->id)}}" data-id="{{$data->id}}"
                               class="btn btn-danger  btn-icon btn-pill delete_button"
                               data-toggle="modal" data-target="#delModal" title="Delete">
                                <i class="fa fa-trash"></i>
                            </a>

                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
            {!! $ticketPrice->render() !!}
        </div>
    </div>




    <!--Fleet Type Add-->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel2"><i class='fa fa-check-circle'></i> Add Price</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>


                <form method="post" action="{{route('ticket-price.store')}}">
                    {!! csrf_field() !!}

                    <div class="modal-body">

                        <div class="form-group">
                            <label><strong>Trip Route</strong></label>
                            <select name="trip_route_id"
                                    class="form-control form-control-lg selectpicker @if ($errors->has('trip_route_id'))  is-invalid @endif"
                                    data-live-search="true">
                                <option value="">Select Trip route</option>
                                @foreach($trip_route as $data)
                                    <option value="{{$data->id}}">{{$data->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label><strong>Fleet Type</strong></label>
                            <select name="fleet_type_id"
                                    class="form-control form-control-lg selectpicker @if ($errors->has('fleet_type_id'))  is-invalid @endif"
                                    data-live-search="true">
                                <option value="">Select Fleet type</option>
                                @foreach($fleet_type as $data)
                                    <option value="{{$data->id}}">{{$data->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Price"><strong>Price</strong></label>
                            <div class="input-group mb-3">
                                <input type="text" name="price" value="{{old('price')}}" class="form-control form-control-lg" placeholder="Price" onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">{{$basic->currency}}</span>
                                </div>
                            </div>
                        </div>



                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success"> Save</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal"> No</button>&nbsp;
                    </div>

                </form>

            </div>
        </div>
    </div>



    <!--Fleet Type Edit-->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel2"><i class='fa fa-edit'></i> Edit Ticket Price </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>


                <form method="post" action="" class="action-route">
                    {{method_field('put')}}
                    {!! csrf_field() !!}
                    <div class="modal-body">

                        <div class="form-group">
                            <label><strong>Trip Route</strong></label>
                            <select name="trip_route_id"
                                    class="edit_trip_route form-control form-control-lg selectpicker"
                                    data-live-search="true">
                                <option value="">Select Trip route</option>
                                @foreach($trip_route as $data)
                                    <option id="tr{{$data->id}}" value="{{$data->id}}">{{$data->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label><strong>Fleet Type</strong></label>
                            <select name="fleet_type_id"
                                    class="form-control form-control-lg edit_fleet_type selectpicker @if ($errors->has('fleet_type_id'))  is-invalid @endif"
                                    data-live-search="true">
                                <option value="">Select Fleet Type </option>
                                @foreach($fleet_type as $data)
                                    <option value="{{$data->id}}">{{$data->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="Price"><strong>Price</strong></label>
                            <div class="input-group mb-3">
                                <input type="text" name="price" value="{{old('price')}}" class="form-control form-control-lg edit_price" placeholder="Price" onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">{{$basic->currency}}</span>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success"> Save</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal"> No</button>&nbsp;
                    </div>

                </form>

            </div>
        </div>
    </div>




    <!--Fleet Type Delete-->
    <div class="modal fade" id="delModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel2"><i class='fa fa-trash'></i> Delete Ticket Price </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>


                <form method="post" action="" class="delete-route">
                    {{method_field('delete')}}
                    {!! csrf_field() !!}
                    <div class="modal-body">
                        <input type="hidden" value="" class="deleteId">
                        <strong>Are you want delete this??</strong>
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
    <script src="{{asset('assets/admin/js/bootstrap-select.min.js')}}"></script>
@stop
@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            $(document).on("click", '.edit_button', function (e) {
                var id = $(this).data('id');
                var price = $(this).data('price');
                var trip_route = $(this).data('trip_route');
                var trip_route_name = $(this).data('trip_route_name');
                var fleet_type = $(this).data('fleet_type');
                var route = $(this).data('route');
                $(".delete_id").val(id);
                $(".edit_price").val(price);

                $("#tr"+trip_route).attr('selected', true);
                $(".edit_trip_route").find(".filter-option-inner-inner").html(trip_route_name);

                $(".edit_fleet_type").val(fleet_type).trigger("change");
                $(".action-route").attr('action', route);

            });

            $(document).on('click', '.delete_button', function (e) {
                var id = $(this).data('id');
                var delRoute = $(this).data('route');
                $(".deleteId").val(id)
                $(".delete-route").attr('action',delRoute)
            });

        })
    </script>

@endsection
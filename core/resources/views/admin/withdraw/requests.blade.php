@extends('admin.layout.master')

@section('body')
        <div class="card">
                <div class="card-header bg-white font-weight-bold">
                    <h4>{{$page_title}}</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th> User </th>
                                <th> Transaction  </th>
                                <th> Method </th>
                                <th> Request Amount </th>
                                <th> Total Amount </th>
                                <th> Status </th>
                                <th> Action </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($withdrawLog as $data)
                                <tr>
                                    <td>
                                        @if($data->type == 1)
                                            <a href="{{route('user.single',$data->user->id)}}"> {{$data->user->username}}</a>
                                        @elseif($data->type == 2)
                                            <a href="#"> {{$data->agent->username}}</a>
                                        @endif
                                    </td>
                                    <td>
                                        {{$data->transaction_id}}
                                    </td>
                                    <td> <strong>{!! ($data->method->name) ?? '' !!}</strong></td>
                                    <td> <strong>{{number_format($data->amount, $basic->decimal) }}  {{$basic->currency}} </strong></td>
                                    <td> <strong>{{number_format($data->net_amount, $basic->decimal)}}   {{$basic->currency}} </strong></td>
                                    <td>
                                        @if($data->status == 2)
                                            <span  class="badge  badge-pill  badge-success "> Approved </span>
                                        @elseif($data->status == 1)
                                            <span class="badge  badge-pill  badge-warning ">Pending </span>
                                        @elseif($data->status == -2)
                                            <span class="badge  badge-pill  badge-danger ">Refund </span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($data->status == 2)
                                            <button  class="btn btn-outline-dark btn-sm "> Completed </button>
                                        @elseif($data->status == -2)
                                            <button  class="btn btn-outline-info btn-sm "> Refunded </button>
                                        @else
                                            <a class="btn btn-success  btn-icon btn-pill " href="#" data-toggle="modal" data-target="#Modal{{$data->id}}" title="Approve">
                                                <i class="fa fa-check"></i>
                                            </a>

                                            <a class="btn btn-danger  btn-icon btn-pill " href="#" title="Refund"
                                               data-toggle="modal" data-target="#DelModal{{$data->id}}">
                                                <i class="fa fa-times"></i>  </a>
                                        @endif
                                    </td>

                                </tr>


                                <!-- Modal for Edit button -->
                                <div class="modal fade" id="DelModal{{$data->id}}" tabindex="-1" role="dialog">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form role="form" method="post"
                                              action="{{ route('withdraw.refund')}}"
                                              enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel">
                                                    <b class="abir_act"></b> <i class="fa fa-check-circle-o"></i> Refund withdraw request </h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="black">X</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <p><strong>Account Info:</strong> {{$data->send_details}}</p>
                                                @if($data->message != null)<p><strong>Message :</strong> {{$data->message}}</p>@endif

                                                <h6>Are You  wan't to refund this ??</h6>
                                                <input type="hidden" name="net_amount" value="{{$data->net_amount}}">
                                                <input type="hidden" name="id" value="{{$data->id}}">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn  btn-danger "> Yes </button>
                                                <button type="button" class="btn btn-default" data-dismiss="modal"> No </button>
                                            </div>
                                        </form>
                                    </div>
                                    </div>
                                </div>


                                <!-- Modal for Edit button -->
                                <div class="modal fade" id="Modal{{$data->id}}" tabindex="-1" role="dialog">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form role="form" method="POST"
                                              action="{{route('withdraw.approve',$data->id)}}"
                                              enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            {{method_field('put')}}
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel"><b
                                                            class="abir_act"></b> <i class="fa fa-check-circle-o"></i> Approve withdraw request </h4>

                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-hidden="true"><span class="black">X</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <p><strong>Account Info:</strong> {{$data->send_details}}</p>
                                                @if($data->message != null)<p><strong>Message :</strong> {{$data->message}}</p>@endif


                                                <input type="hidden" name="net_amount" value="{{$data->net_amount}}">
                                                <h6>Are you  want to approve this request?</h6>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn  btn-success "> Yes </button>
                                                <button type="button" class="btn btn-default" data-dismiss="modal"> No </button>
                                            </div>
                                        </form>

                                    </div>
                                    </div>
                                </div>


                            @endforeach
                            <tbody>
                        </table>

                        {!!  $withdrawLog->links()!!}

                    </div>
                </div>
            </div>


@endsection
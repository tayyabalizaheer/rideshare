@extends('admin.layout.master')

@section('body')
    <div class="row">
        <div class="col-md">
            <div class="card">
                <div class="card-header bg-white font-weight-bold ">
                    <h2>{{$page_title}}</h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Username</th>
                                <th scope="col">#TRX</th>
                                <th scope="col">Withdraw Method</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Status</th>
                                <th scope="col">Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($deposits as $data)
                                <tr>
                                    <td data-label="Username">
                                        <a href="{{route('user.single', $data->user->id)}}">
                                            {{$data->user->username}}
                                        </a>
                                    </td>

                                    <td  data-label="#Trx">{{$data->transaction_id}}</td>
                                    <td data-label="Withdraw Method"><strong>{{ $data->method->name or '' }}</strong></td>
                                    <td data-label="Amount">
                                        <strong>{{  number_format($data->amount, $basic->decimal)  }}   @if($data->currency_id == null)  {{ $basic->currency }} @else  {{ $data->currency->code }} @endif</strong></td>
                                    <td data-label="Status">
                                        @if($data->status == 1)
                                            <span class="badge badge-warning">   Pending </span>
                                        @elseif($data->status == 2)
                                            <span class="badge badge-success"> Approved </span>
                                        @elseif($data->status == -2)
                                            <span class="badge badge-danger">  Refunded </span>
                                        @endif
                                    </td>
                                    <td data-label="Time">
                                        <p><i class="fa fa-calendar"></i> {!! date(' d M, Y ', strtotime($data->created_at)) !!} &nbsp;<i class="fa fa-clock"></i> {!! date(' H:i A ', strtotime($data->created_at)) !!}  </p>
                                    </td>
                                </tr>
                            @endforeach
                            <tbody>
                        </table>

                        {!! $deposits->links() !!}
                    </div>
                </div>
            </div>
        </div>

@endsection
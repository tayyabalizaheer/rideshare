@extends('admin.layout.master')

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-white font-weight-bold ">
                    <h2>{{$page_title}}</h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th data-scope="col">Username</th>
                                <th data-scope="col">#TRX</th>
                                <th data-scope="col">Gateway</th>
                                <th data-scope="col">Amount</th>
                                <th data-scope="col">Status</th>
                                <th data-scope="col">Date</th>
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

                                    <td data-label="#Trx">{{$data->trx}}</td>
                                    <td data-label="Gateway">{{$data->gateway->name}}</td>
                                    <td data-label="Amount"><strong>{{$data->amount}} @if($data->currency_id == null)  {{ $basic->currency }} @else  {{ $data->currency->code }} @endif</strong></td>
                                    <td data-label="Status">
                                        @if($data->status == 1)
                                            <span class="badge badge-success"> Completed </span>
                                        @else
                                            <span  class="badge badge-warning">Pending </span>
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
    </div>


@endsection
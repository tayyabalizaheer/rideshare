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
                                        @if($data->role == 1)
                                        <a href="{{route('user.single', $data->user->id)}}">
                                            {{$data->user->username}}
                                        </a>
                                        @elseif($data->role == 2)
                                        <a href="{{route('agent.edit', $data->agent->id)}}">
                                            {{$data->agent->username}}
                                        </a>
                                        @endif
                                    </td>

                                    <td data-label="#Trx">{{$data->trx}}</td>
                                    <td data-label="Gateway">{{($data->gateway->name) ?? ''}}</td>
                                    <td data-label="Amount"><strong>{{$data->amount}} {{ $basic->currency}}</strong></td>
                                    <td data-label="Status">
                                        @if($data->status == 1)
                                            <span class="badge badge-success">
                                                <i class="fa fa-check"></i> Completed </span>
                                        @else
                                            <span href="" class="badge badge-warning ">
                                                <i class="fa fa-check"></i> Pending </span>
                                        @endif
                                    </td>
                                    <td data-label="Date">{{date('d M Y h:i A', strtotime($data->updated_at))}}</td>
                                </tr>
                            @endforeach
                            <tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
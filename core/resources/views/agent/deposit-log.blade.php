@extends('agent.layout.master')
@section('body')
    <div class="card">
        <div class="card-header bg-white font-weight-bold">
                <h2 class="mb-4">{{$page_title}}</h2>
        </div>



        <div class="card-body">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">SL</th>
                    <th scope="col">Transaction ID</th>
                    <th scope="col">Details</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Time</th>
                </tr>
                </thead>
                <tbody>


                @if(count($invests) >0)
                    @foreach($invests as $k=>$data)
                        <tr>
                            <td data-label="SL">{{++$k}}</td>
                            <td data-label="#Trx">{{isset($data->trx ) ? $data->trx  : 'N/A'}}</td>
                            <td data-label="Details">{{isset($data->gateway->name) ? $data->gateway->name : 'N/A'}} </td>
                            <td data-label="Amount">{{$data->amount}}</span> {!! $basic->currency !!}</td>
                            <td data-label="Time">
                                {!! date(' d M Y h:i A', strtotime($data->created_at)) !!}
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5"> You don't have any deposit history !!</td>
                    </tr>
                @endif
                </tbody>
            </table>


            <div class="col-sm-12 text-center margin_0">
                {{ $invests->links() }}
            </div>
        </div>
    </div>


@stop

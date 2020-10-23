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
                        <table class="table" >
                            <thead>
                            <tr>
                                <th scope="col">#TRX</th>
                                <th scope="col">Details</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Remaining Balance</th>
                                <th scope="col">Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($deposits as $data)
                                <tr>
                                    <td data-label="#Trx">{{$data->trx}}</td>
                                    <td data-label="Details">{{$data->title or ''}}</td>
                                    <td data-label="Amount"><strong>{!! $data->amount  or 'N/A' !!} @if($data->currency_id == null)  {!! $basic->currency !!} @else  {!! $data->currency->code !!} @endif</strong></td>
                                    <td data-label="Remaining Balance">{!! $data->main_amo  or 'N/A' !!} @if($data->currency_id == null)  {!! $basic->currency !!} @else  {!! $data->currency->code !!} @endif</td>

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
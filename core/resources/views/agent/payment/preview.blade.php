@extends('agent.layout.master')
@section('body')
    <h4 class="mb-4"><i class="fas fa-dollar-sign"></i> {{$page_title}}</h4>

    <div class="row m-2">

        <div  class="offset-md-2 col-md-8 ">
            <form method="POST" action="{{route('deposit.confirm')}}">
                {{csrf_field()}}
                <div class="card text-center">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <img src="{{asset('assets/images/gateway')}}/{{$data->gateway_id}}.jpg"
                                 style="max-width:100px; max-height:100px; margin:0 auto;"/>
                        </li>
                        <li class="list-group-item"> Amount : {{$data->amount}}
                            <strong>{{$basic->currency}}</strong>
                        </li>


                        <li class="list-group-item"> Charge :
                            <strong>{{$data->charge}} </strong>{{ $basic->currency }}</li>
                        <li class="list-group-item "> Payable :
                            <strong>{{$data->charge + $data->amount}} </strong>{{ $basic->currency }}</li>


                        <li class="list-group-item"> In USD :
                            <strong>${{$data->usd}}</strong>
                        </li>

                        <li class="list-group-item">
                            <div class="btn-wrapper">
                                <input type="submit" class="submit-btn btn btn-success btn-lg btn-block" id="btn-confirm" value="Pay Now">
                            </div>
                        </li>
                    </ul>
                </div>

            </form>
        </div>
    </div>





@stop
@section('script')
    @if($data->gateway_id == 107)
        <form action="{{ route('ipn.paystack') }}" method="POST">
            @csrf
            <script
                src="//js.paystack.co/v1/inline.js"
                data-key="{{ $data->gateway->val1 }}"
                @if($data->role==2)
                data-email="{{ $data->agent->email }}"
                @else
                data-email="{{ $data->user->email }}"
                @endif
                data-amount="{{ round($data->usd, 2)*100 }}"
                data-currency="NGN"
                data-ref="{{ $data->trx }}"
                data-custom-button="btn-confirm">
            </script>
        </form>
    @elseif($data->gateway_id == 108)
        <script src="//voguepay.com/js/voguepay.js"></script>
        <script>
            closedFunction = function () {

            }
            successFunction = function (transaction_id) {
                window.location.href = '{{ url('/vogue') }}/' + transaction_id + '/success';
            }
            failedFunction = function (transaction_id) {
                window.location.href = '{{ url('/vogue') }}/' + transaction_id + '/error';
            }

            function pay(item, price) {
                //Initiate voguepay inline payment
                Voguepay.init({
                    v_merchant_id: "{{ $data->gateway->val1 }}",
                    total: price,
                    notify_url: "{{ route('ipn.voguepay') }}",
                    cur: 'USD',
                    merchant_ref: "{{ $data->trx }}",
                    memo: 'Buy ICO',
                    recurrent: true,
                    frequency: 10,
                    developer_code: '5af93ca2913fd',
                    store_id: "{{ $data->user_id }}",
                    custom: "{{ $data->trx }}",

                    closed: closedFunction,
                    success: successFunction,
                    failed: failedFunction
                });
            }

            $(document).ready(function () {
                $(document).on('click', '#btn-confirm', function (e) {
                    e.preventDefault();
                    pay('Buy', {{ $data->usd }});
                });
            })
        </script>

    @endif
@endsection

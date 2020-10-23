@extends('agent.layout.master')
@section('body')
    <h4 class="mb-4"> {{$page_title}}</h4>
    <div class="row mb-4">
        <div class="offset-md-2 col-md-8">
            <div class="card">
                <div class="card-body text-center">
                    <h3 class="text-color"> PLEASE SEND EXACTLY <span style="color: green"> {{ $bitcoin['amount'] }}</span> BTC</h3>
                    <h5>TO <span style="color: green"> {{ $bitcoin['sendto'] }}</span></h5>
                    {!! $bitcoin['code'] !!}
                    <h4 class="text-color bold">SCAN TO SEND</h4>
                </div>
            </div>
        </div>
    </div>


@endsection

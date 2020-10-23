@extends('agent.layout.master')
@section('body')

    <h4 class="mb-4"> {{$page_title}}</h4>
    <div class="row mb-4">
        <div class="offset-md-2 col-md-8">
            <div class="card">
                <div class="card-body text-center">
                    <h3 class="text-color"> PLEASE SEND EXACTLY <span style="color: green">  {{ $bcoin }}</span> BCH</h3>
                    <h5>TO <span style="color: green">  {{ $wallet}}</span></h5>
                    {!! $qrurl !!}
                    <h4 class="text-color bold">SCAN TO SEND</h4>

                </div>
            </div>
        </div>
    </div>

@endsection

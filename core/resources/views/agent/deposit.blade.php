@extends('agent.layout.master')


@section('body')


    <h4 class="mb-4"><i class="fas fa-dollar-sign"></i> {{$page_title}}</h4>

    <div class="row m-2">
        <div class="col-lg-12 col-md-12">
            @include('errors.alert')
        </div>
    </div>


    @foreach($gates->chunk(6) as $data)
        <div class="row mb-4">
            @foreach($data  as $gate)
                <div class="col-md-2">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center">{{$gate->name}}</h5>
                        </div>
                        <img class="card-img-top" src="{{asset('assets/images/gateway')}}/{{$gate->id.'.jpg'}}" alt="..">
                        <div class="card-footer">
                            <a href="javascript:void(0)" class="btn btn-success btn-lg btn-block" data-toggle="modal" data-target="#depositModal{{$gate->id}}">Select {{$gate->name}}</a>
                        </div>
                    </div>
                </div>


                <!-- Modal -->
                <div class="modal fade" id="depositModal{{$gate->id}}" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content modal-bg-color">
                            <div class="modal-header">
                                <h4 class="modal-title"><strong> Deposit via {{$gate->name}}</strong></h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="post" action="{{route('deposit.data-insert')}}">
                                @csrf
                                <div class="modal-body">
                                    <input type="hidden" name="gateway" value="{{$gate->id}}">
                                    <label><span class="modal-msg"> <strong>DEPOSIT AMOUNT</strong>
                                            ({{ $gate->minamo }} - {{$gate->maxamo }}) {{$basic->currency}}
                                            <br>
                                               <code>Charged {{ $gate->fixed_charge }} {{$basic->currency}}
                                                   + {{$gate->percent_charge }}%</code>
                                        </span>
                                    </label>


                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-lg" name="amount"
                                               placeholder="0.00"
                                               onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')"
                                               placeholder=" Enter Amount" required>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">{{$basic->currency}}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success btn-lg">Preview</button>
                                    <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">Close
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach


@stop

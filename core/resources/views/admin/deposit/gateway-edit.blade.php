@extends('admin.layout.master')
@section('import-css')
    <link href="{{ asset('assets/admin/css/bootstrap-fileinput.css') }}" rel="stylesheet">
@stop
@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-white font-weight-bold ">
                    <h2>Edit
                        <strong>{{$gateway->name}}</strong></h2>
                </div>

                <form method="post" action="{{route('update.gateway')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}


                    <div class="card-body">


                        <input class="form-control abir_id" value="{{$gateway->id}}"
                               type="hidden" name="id">

                        <div class="col-md-12">

                            @include('errors.error')

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6><strong>Name of Gateway</strong></h6>
                                        <input type="text" value="{{$gateway->name}}"
                                               class="form-control form-control-lg" id="name" name="name">
                                    </div>
                                    <div class="col-md-6">
                                        <h6><strong>Rate</strong></h6>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <strong> 1 @if($gateway->id==107 or $gateway->id==108)
                                                            NGN @else  USD @endif =</strong>
                                                </span>
                                            </div>
                                            <input type="text" value="{{$gateway->rate}}"
                                                   class="form-control form-control-lg" id="rate" name="rate">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <strong> {{ $basic->currency }}</strong>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card ">
                                            <div class="card-header">
                                                <h5 class="card-title"> Deposit Limit</h5>
                                            </div>
                                            <div class="card-body">
                                                <h6 for="minamo"><strong>Minimum Amount</strong></h6>
                                                <div class="input-group">
                                                    <input type="text"
                                                           value="{{$gateway->minamo}}"
                                                           class="form-control form-control-lg" id="minamo"
                                                           name="minamo">
                                                    <div class="input-group-prepend">
                                                                            <span class="input-group-text">
                                                                            <strong>{{ $basic->currency }}</strong>
                                                                        </span>
                                                    </div>
                                                </div>
                                                <br>
                                                <h6 for="maxamo"><strong>Maximum Amount</strong>
                                                </h6>
                                                <div class="input-group">
                                                    <input type="text"
                                                           value="{{$gateway->maxamo}}"
                                                           class="form-control form-control-lg" id="maxamo"
                                                           name="maxamo">
                                                    <div class="input-group-prepend">
                                                                            <span class="input-group-text">
                                                                                    <strong>{{ $basic->currency }}</strong>
                                                                                </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="card ">
                                            <div class="card-header">
                                                <h5 class="card-title">Deposit Charge</h5>
                                            </div>
                                            <div class="card-body">
                                                <h6 for="chargefx"><strong>Fixed Charge</strong>
                                                </h6>
                                                <div class="input-group">
                                                    <input type="text"
                                                           value="{{$gateway->fixed_charge}}"
                                                           class="form-control form-control-lg" id="chargefx"
                                                           name="chargefx">
                                                    <div class="input-group-prepend">
                                                                                <span class="input-group-text">
                                                                                    <strong>{{ $basic->currency }}</strong>
                                                                                </span>
                                                    </div>
                                                </div>
                                                <br>
                                                <h6 for="chargepc"><strong>Charge in
                                                        Percentage</strong></h6>
                                                <div class="input-group">
                                                    <input type="text"
                                                           value="{{$gateway->percent_charge}}"
                                                           class="form-control form-control-lg" id="chargepc"
                                                           name="chargepc">
                                                    <div class="input-group-prepend">
                                                                                <span class="input-group-text">
                                                                                    <strong>%</strong>
                                                                                </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            @if($gateway->id==101)
                                <div class="form-group">
                                    <h6 for="val1"><strong>PAYPAL BUSINESS EMAIL</strong></h6>
                                    <input type="text" value="{{$gateway->val1}}"
                                           class="form-control form-control-lg" id="val1" name="val1">
                                </div>
                            @elseif($gateway->id==102)
                                <div class="form-group">
                                    <h6 for="val1"><strong>PM USD ACCOUNT</strong></h6>
                                    <input type="text" value="{{$gateway->val1}}"
                                           class="form-control form-control-lg" id="val1" name="val1">
                                </div>
                                <div class="form-group">
                                    <h5 for="val2"><strong>ALTERNATE PASSPHRASE</strong></h5>
                                    <input type="text" value="{{$gateway->val2}}"
                                           class="form-control form-control-lg" id="val2" name="val2">
                                </div>

                            @elseif($gateway->id==103)
                                <div class="form-group">
                                    <h6 for="val1"><strong>SECRET KEY</strong></h6>
                                    <input type="text" value="{{$gateway->val1}}"
                                           class="form-control form-control-lg" id="val1" name="val1">
                                </div>
                                <div class="form-group">
                                    <h6 for="val2"><strong>PUBLISHABLE KEY</strong></h6>
                                    <input type="text" value="{{$gateway->val2}}"
                                           class="form-control form-control-lg" id="val2" name="val2">
                                </div>

                            @elseif($gateway->id==104)
                                <div class="form-group">
                                    <h6 for="val1"><strong>Merchant Email</strong></h6>
                                    <input type="text" value="{{$gateway->val1}}"
                                           class="form-control form-control-lg" id="val1" name="val1">
                                </div>
                                <div class="form-group">
                                    <h6 for="val2"><strong>Secret KEY</strong></h6>
                                    <input type="text" value="{{$gateway->val2}}"
                                           class="form-control form-control-lg" id="val2" name="val2">
                                </div>
                            @elseif($gateway->id==105)
                                <div class="form-group">
                                    <h6 for="val1"><strong>Merchant ID</strong></h6>
                                    <input type="text" value="{{$gateway->val1}}"
                                           class="form-control form-control-lg" id="val1" name="val1">
                                </div>
                                <div class="form-group">
                                    <h6 for="val2"><strong>Merchant KEY</strong></h6>
                                    <input type="text" value="{{$gateway->val2}}"
                                           class="form-control form-control-lg" id="val2" name="val2">
                                </div>
                                <div class="form-group">
                                    <h6 for="val3"><strong>Website </strong></h6>
                                    <input type="text" value="{{$gateway->val3}}"
                                           class="form-control form-control-lg" id="val3" name="val3">
                                </div>

                                <div class="form-group">
                                    <h6 for="val4"><strong>Industry Type </strong></h6>
                                    <input type="text" value="{{$gateway->val4}}"
                                           class="form-control form-control-lg" id="val4" name="val4">
                                </div>
                                <div class="form-group">
                                    <h6 for="val5"><strong>Channel ID </strong></h6>
                                    <input type="text" value="{{$gateway->val5}}"
                                           class="form-control form-control-lg" id="val5" name="val5">
                                </div>

                                <div class="form-group">
                                    <h6 for="val6"><strong>Transaction URL </strong></h6>
                                    <input type="text" value="{{$gateway->val6}}"
                                           class="form-control form-control-lg" id="val6" name="val6">
                                </div>

                                <div class="form-group">
                                    <h6 for="val7"><strong>Transaction Status URL </strong></h6>
                                    <input type="text" value="{{$gateway->val7}}"
                                           class="form-control form-control-lg" id="val7" name="val7">
                                </div>

                            @elseif($gateway->id==106)
                                <div class="form-group">
                                    <h6 for="val1"><strong>Merchant ID</strong></h6>
                                    <input type="text" value="{{$gateway->val1}}"
                                           class="form-control form-control-lg" id="val1" name="val1">
                                </div>
                                <div class="form-group">
                                    <h6 for="val2"><strong>Secret ID</strong></h6>
                                    <input type="text" value="{{$gateway->val2}}"
                                           class="form-control form-control-lg" id="val2" name="val2">
                                </div>

                            @elseif($gateway->id==107)
                                <div class="form-group">
                                    <h6 for="val1"><strong>Public Key</strong></h6>
                                    <input type="text" value="{{$gateway->val1}}"
                                           class="form-control form-control-lg" id="val1" name="val1">
                                </div>
                                <div class="form-group">
                                    <h6 for="val2"><strong>Secret Key</strong></h6>
                                    <input type="text" value="{{$gateway->val2}}"
                                           class="form-control form-control-lg" id="val2" name="val2">
                                </div>
                            @elseif($gateway->id==108)
                                <div class="form-group">
                                    <h6 for="val1"><strong>Merchant ID</strong></h6>
                                    <input type="text" value="{{$gateway->val1}}"
                                           class="form-control form-control-lg" id="val1" name="val1">
                                </div>
                            @elseif($gateway->id==501)
                                <div class="form-group">
                                    <h6 for="val1"><strong>API KEY</strong></h6>
                                    <input type="text" value="{{$gateway->val1}}"
                                           class="form-control form-control-lg" id="val1" name="val1">
                                </div>
                                <div class="form-group">
                                    <h6 for="val2"><strong>XPUB CODE</strong></h6>
                                    <input type="text" value="{{$gateway->val2}}"
                                           class="form-control form-control-lg" id="val2" name="val2">
                                </div>
                            @elseif($gateway->id==502)
                                <div class="form-group">
                                    <h6 for="val1"><strong>API KEY</strong></h6>
                                    <input type="text" value="{{$gateway->val1}}"
                                           class="form-control form-control-lg" id="val1" name="val1">
                                </div>
                                <div class="form-group">
                                    <h6 for="val2"><strong>API PIN</strong></h6>
                                    <input type="text" value="{{$gateway->val2}}"
                                           class="form-control form-control-lg" id="val2" name="val2">
                                </div>
                            @elseif($gateway->id==503)
                                <div class="form-group">
                                    <h6 for="val1"><strong>API KEY</strong></h6>
                                    <input type="text" value="{{$gateway->val1}}"
                                           class="form-control form-control-lg" id="val1" name="val1">
                                </div>
                                <div class="form-group">
                                    <h6 for="val2"><strong>API PIN</strong></h6>
                                    <input type="text" value="{{$gateway->val2}}"
                                           class="form-control form-control-lg" id="val2" name="val2">
                                </div>
                            @elseif($gateway->id==504)
                                <div class="form-group">
                                    <h5 for="val1"><strong>API KEY</strong></h5>
                                    <input type="text" value="{{$gateway->val1}}"
                                           class="form-control form-control-lg" id="val1" name="val1">
                                </div>
                                <div class="form-group">
                                    <h6 for="val2"><strong>API PIN</strong></h6>
                                    <input type="text" value="{{$gateway->val2}}"
                                           class="form-control form-control-lg" id="val2" name="val2">
                                </div>
                            @elseif($gateway->id==505)
                                <div class="form-group">
                                    <h6 for="val1"><strong>Public KEY</strong></h6>
                                    <input type="text" value="{{$gateway->val1}}"
                                           class="form-control form-control-lg" id="val1" name="val1">
                                </div>
                                <div class="form-group">
                                    <h6 for="val2"><strong>Private KEY</strong></h6>
                                    <input type="text" value="{{$gateway->val2}}"
                                           class="form-control form-control-lg" id="val2" name="val2">
                                </div>
                            @elseif($gateway->id==506)
                                <div class="form-group">
                                    <h6 for="val1"><strong>Public KEY</strong></h6>
                                    <input type="text" value="{{$gateway->val1}}"
                                           class="form-control form-control-lg" id="val1" name="val1">
                                </div>
                                <div class="form-group">
                                    <h6 for="val2"><strong>Private KEY</strong></h6>
                                    <input type="text" value="{{$gateway->val2}}"
                                           class="form-control form-control-lg" id="val2" name="val2">
                                </div>
                            @elseif($gateway->id==507)
                                <div class="form-group">
                                    <h6 for="val1"><strong>Public KEY</strong></h6>
                                    <input type="text" value="{{$gateway->val1}}"
                                           class="form-control form-control-lg" id="val1" name="val1">
                                </div>
                                <div class="form-group">
                                    <h6 for="val2"><strong>Private KEY</strong></h6>
                                    <input type="text" value="{{$gateway->val2}}"
                                           class="form-control form-control-lg" id="val2" name="val2">
                                </div>
                            @elseif($gateway->id==508)
                                <div class="form-group">
                                    <h6 for="val1"><strong>Public KEY</strong></h6>
                                    <input type="text" value="{{$gateway->val1}}"
                                           class="form-control form-control" id="val1" name="val1">
                                </div>
                                <div class="form-group">
                                    <h6 for="val2"><strong>Private KEY</strong></h6>
                                    <input type="text" value="{{$gateway->val2}}" class="form-control form-control-lg"
                                           id="val2" name="val2">
                                </div>
                            @elseif($gateway->id==509)
                                <div class="form-group">
                                    <h6 for="val1"><strong>Public KEY</strong></h6>
                                    <input type="text" value="{{$gateway->val1}}"
                                           class="form-control form-control-lg" id="val1" name="val1">
                                </div>
                                <div class="form-group">
                                    <h6 for="val2"><strong>Private KEY</strong></h6>
                                    <input type="text" value="{{$gateway->val2}}"
                                           class="form-control form-control-lg" id="val2" name="val2">
                                </div>
                            @elseif($gateway->id==510)
                                <div class="form-group">
                                    <h6 for="val1"><strong>Public KEY</strong></h6>
                                    <input type="text" value="{{$gateway->val1}}"
                                           class="form-control form-control-lg" id="val1" name="val1">
                                </div>
                                <div class="form-group">
                                    <h6 for="val2"><strong>Private KEY</strong></h6>
                                    <input type="text" value="{{$gateway->val2}}"
                                           class="form-control form-control-lg" id="val2" name="val2">
                                </div>

                            @elseif($gateway->id==512)
                                <div class="form-group">
                                    <h6 for="val1"><strong>SECRET KEY</strong></h6>
                                    <input type="text" value="{{$gateway->val1}}"
                                           class="form-control form-control-lg" id="val1" name="val1">
                                </div>
                            @elseif($gateway->id==513)
                                <div class="form-group">
                                    <h6 for="val1"><strong>API Key</strong></h6>
                                    <input type="text" value="{{$gateway->val1}}"
                                           class="form-control form-control-lg" id="val1" name="val1">
                                </div>
                                <div class="form-group">
                                    <h6 for="val2"><strong>API ID</strong></h6>
                                    <input type="text" value="{{$gateway->val2}}"
                                           class="form-control form-control-lg" id="val2" name="val2">
                                </div>
                            @else
                                <div class="form-group">
                                    <h6 for="val1">
                                        <storng>Payment Details</storng>
                                    </h6>
                                    <input type="text" value="{{$gateway->val1}}"
                                           class="form-control form-control-lg" id="val1" name="val1">
                                </div>
                            @endif

                            <div class="form-group">
                                <h6 for="status"><strong>Status</strong></h6>
                                <select class="form-control form-control-lg" name="status">
                                    <option value="1" {{ $gateway->status == "1" ? 'selected' : '' }}>
                                        Active
                                    </option>
                                    <option value="0" {{ $gateway->status == "0" ? 'selected' : '' }}>
                                        Deactive
                                    </option>
                                </select>

                            </div>

                            <div class="form-group">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail"
                                         style="width: 200px; height: 200px;">
                                        <img src="{{ asset('assets/images/gateway') }}/{{$gateway->id}}.jpg"
                                             alt="*"/></div>
                                    <div class="fileinput-preview fileinput-exists thumbnail"
                                         style="max-width: 200px; max-height: 200px;"></div>
                                    <div>
                                                        <span class="btn btn-success btn-file">
                                                            <span class="fileinput-new"> Change Logo </span>
                                                            <span class="fileinput-exists"> Change </span>
                                                            <input type="file" name="gateimg"> </span>
                                        <a href="javascript:;" class="btn btn-danger fileinput-exists"
                                           data-dismiss="fileinput"> Remove </a>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

                    <div class="card-footer bg-white">
                        <button class="btn btn-success btn-block btn-lg">Update Gateway</button>
                    </div>
                </form>

            </div>
        </div>
    </div>


@endsection

@section('import-script')
    <script src="{{ asset('assets/admin/js/bootstrap-fileinput.js') }}"></script>
@stop
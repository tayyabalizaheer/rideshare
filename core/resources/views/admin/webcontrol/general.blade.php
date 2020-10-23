@extends('admin.layout.master')

@section('body')
    <div class="card">

        <div class="card-header bg-white font-weight-bold">
            <h4>{{$page_title}}</h4>
        </div>

        <form role="form" method="POST" action="">
            {{ csrf_field() }}
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-3">
                        <h6 class="text-uppercase">Website Title</h6>
                        <div class="input-group">
                            <input type="text" class="form-control form-control-lg" value="{{$general->sitename}}" name="sitename">
      
                        </div>
                        <span class="text-danger">{{$errors->first('sitename')}}</span>
                    </div>

                    <div class="form-group col-md-3">
                        <h6>COLOR</h6>
                        <div class="input-group">
                            <input type="text" class="form-control form-control-lg"
                                   style="background-color: #{!! $general->color !!} " value="#{!! $general->color !!}" name="color">
                            <div class="input-group-append"><span class="input-group-text">
                                            <i class="fa fa-paint-brush"></i>
                                        </span>
                            </div>
                        </div>
                        <span class="text-danger">{{ $errors->first('color') }}</span>
                    </div>



                    <div class="form-group col-md-3">
                        <h6 class="text-uppercase">Ticket Payment Time</h6>
                        <div class="input-group">
                            <input type="text" class="form-control form-control-lg" value="{{$general->addtime}}"
                                   name="addtime">
                            <div class="input-group-append"><span class="input-group-text"> Minutes</span>
                            </div>
                        </div>
                        <span class="text-danger">{{ $errors->first('addtime') }}</span>
                    </div>
                    <div class="form-group col-md-3">
                        <h6 class="text-uppercase">Ticket Cancel Before Trip </h6>
                        <div class="input-group">
                            <input type="text" class="form-control form-control-lg" value="{{$general->cancel_endtime}}"
                                   name="cancel_endtime">
                            <div class="input-group-append"><span class="input-group-text"> Minutes</span>
                            </div>
                        </div>
                        <span class="text-danger">{{ $errors->first('cancel_endtime') }}</span>
                    </div>

                </div>


           

                <div class="row">

                    <div class="form-group col-3">
                        <h6>BASE CURRENCY </h6>
                        <div class="input-group">
                            <input type="text" class="form-control form-control-lg" value="{{$general->currency}}"
                                   name="currency">
                            <div class="input-group-append"><span class="input-group-text">
                                    <i class="fas fa-money-bill-alt"></i>
                                            </span>
                            </div>
                        </div>
                        <span class="text-danger">{{ $errors->first('currency') }}</span>
                    </div>
                    <div class="form-group col-3">
                        <h6>CURRENCY SYMBOL</h6>
                        <div class="input-group">
                            <input type="text" class="form-control form-control-lg" value="{{$general->currency_sym}}"
                                   name="currency_sym">
                            <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="fas fa-exclamation-circle"></i>
                                        </span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-3">
                        <h6>Price per kilo</h6>
                        <div class="input-group">
                            <input type="number" class="form-control form-control-lg" value="{{$general->price_per_kilo}}"
                                   name="price_per_kilo">
                            <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="fas fa-exclamation-circle"></i>
                                        </span>
                            </div>
                        </div>
                    </div>



                    <div class="form-group col-md-3">
                        <h6 class="text-uppercase">Decimal After Point</h6>
                        <div class="input-group">
                            <input type="text" class="form-control form-control-lg" value="{{$general->decimal}}"
                                   name="decimal">
                            <div class="input-group-append"><span class="input-group-text"> Decimal</span>
                            </div>
                        </div>
                        <span class="text-danger">{{ $errors->first('decimal') }}</span>
                    </div>

                    <div class="form-group col-3">
                        <h6>REGISTRATION</h6>
                        <input data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-size="large"
                               data-width="100%" type="checkbox"
                               name="registration" {{$general->registration == "1" ? 'checked' : '' }}>
                    </div>

                </div>


                <div class="row">
                    <div class="form-group col-md-3">
                        <h6>EMAIL VERIFICATION</h6>
                        <input data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-size="large"
                               data-width="100%" type="checkbox"
                               name="email_verification" {{ $general->email_verification == "1" ? 'checked' : '' }}>
                    </div>

                    <div class="form-group col-md-3">
                        <h6>EMAIL NOTIFICATION</h6>
                        <input data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-size="large"
                               data-width="100%" type="checkbox"
                               name="email_notification" {{ $general->email_notification == "1" ? 'checked' : '' }}>
                    </div>

                    
                </div>

            </div>

            <div class="card-footer bg-white">
                <button class="btn btn-primary btn-block btn-lg" type="submit">Update</button>
            </div>

        </form>
    </div>


@endsection

@section('script')

@stop
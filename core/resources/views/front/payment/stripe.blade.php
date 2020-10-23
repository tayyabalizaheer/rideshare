@extends('layout')
@section('force-css','bc blog blogdetails')

@section('content')
    @include('partials.breadcrumb')

    <style>
        .credit-card-box .form-control.error {
            border-color: red;
            outline: 0;
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(255, 0, 0, 0.6);
        }

        .credit-card-box label.error {
            font-weight: bold;
            color: red;
            padding: 2px 8px;
            margin-top: 2px;
        }
    </style>

    <section id="pricePlan" class="pricePlan margin-top-100 margin-bottom-80">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-lg-12 col-md-12">
                    @include('errors.alert')
                </div>
                <div class="col-md-8 col-md-offset-2">
                    <div class="card ">
                        <div class="card-header text-center">
                            <h4 class="card-title"><strong>Stripe Payment</strong></h4>
                        </div>
                        <div class="card-body ">

                            <div class="card-wrapper"></div>
                            <br><br>


                            <form role="form" id="payment-form" method="POST" action="{{ route('ipn.stripe')}}">
                                {{csrf_field()}}
                                <input type="hidden" value="{{ $track }}" name="track">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label><strong>CARD NAME</strong></label>
                                        <div class="input-group">
                                            <input type="text" class="form-control white" name="name" placeholder="Card Name" autocomplete="off" required>
                                            <span class="input-group-addon modal-input-addon"></span>

                                            <div class="input-group-append">
                                                <span class="input-group-text" ><i class="fa fa-font"></i></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label><strong>CARD NUMBER</strong></label>
                                        <div class="input-group">
                                            <input type="tel" class="form-control white" name="cardNumber" placeholder="Valid Card Number" autocomplete="off" required autofocus>
                                            <div class="input-group-append">
                                                <span class="input-group-text" >
                                                  <i class="fa fa-credit-card"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <br>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label><strong>EXPIRATION DATE</strong></label>
                                        <input
                                                type="tel"
                                                class="form-control input-lg white"
                                                name="cardExpiry"
                                                placeholder="MM / YYYY"
                                                autocomplete="off"
                                                required
                                        />
                                    </div>
                                    <div class="col-md-6 pull-right">

                                        <label><strong>CVC CODE</strong></label>
                                        <input
                                                type="tel"
                                                class="form-control input-lg white"
                                                name="cardCVC"
                                                placeholder="CVC"
                                                autocomplete="off"
                                                required
                                        />

                                    </div>
                                </div>
                                <br>
                                <div class="btn-wrapper">
                                    <input class="submit-btn btn-block btn-success btn" type="submit" value="PAY NOW">
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>



@stop

@section('js')
    <script type="text/javascript" src="https://rawgit.com/jessepollak/card/master/dist/card.js"></script>

    <script>
        (function ($) {
            $(document).ready(function () {
                var card = new Card({
                    form: '#payment-form',
                    container: '.card-wrapper',
                    formSelectors: {
                        numberInput: 'input[name="cardNumber"]',
                        expiryInput: 'input[name="cardExpiry"]',
                        cvcInput: 'input[name="cardCVC"]',
                        nameInput: 'input[name="name"]'
                    }
                });
            });
        })(jQuery);
    </script>
@stop



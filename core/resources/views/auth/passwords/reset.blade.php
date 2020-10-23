@extends('layout')
@section('force-css','bc blog')
@section('content')
    @include('partials.breadcrumb')


    <!--================================
        contact us  part start
    =====================================-->
    <section id="contact-main">

        <div class="contact-form">
            <div class="container">
                <div class="row contact-form-area">
                    <div class="col-lg-8 offset-2 contact-form">
                        @include('errors.alert')
                        <form id="c-form" action="{{route('user.password.request')}}" method="post">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <h5>Your E-Mail  Address</h5>
                                        <input type="email" name="email" value="{{$email}}" class="form-control" placeholder="Enter E-mail Address" readonly>
                                        @if ($errors->has('email'))
                                            <strong class="error">{{ $errors->first('email') }}</strong>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <h5>New Password</h5>
                                        <input type="password" name="password" class="form-control" placeholder="New Password">
                                        @if ($errors->has('password'))
                                            <strong class="error">{{ $errors->first('password') }}</strong>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <h5>Confirm Password</h5>
                                        <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password">
                                    </div>
                                </div>


                                <div class="col-12">
                                    <button type="submit" class="btn btn-contact btn-block">Send Reset Link</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!--================================
        contact us part end
    =====================================-->

@endsection







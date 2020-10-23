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
                        <form id="c-form" action="{{ route('user.password.email') }}" method="post">
                            @csrf

                            <div class="row">
                                <div class="col-md-12">
                                    <h5>E-Mail  Address</h5>
                                    <input type="email" name="email" class="form-control" placeholder="Enter E-mail Address">
                                    @if ($errors->has('email'))
                                        <strong class="error">{{ $errors->first('email') }}</strong>
                                    @endif
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







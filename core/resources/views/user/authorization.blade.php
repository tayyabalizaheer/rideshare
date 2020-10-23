@extends('user')
@section('force-css','bc blog')
@section('style')

@endsection
@section('content')
    @include('partials.breadcrumb')




    <!--================================
        contact us  part start
    =====================================-->
    <section id="contact-main">
        <div class="container">
            <div class="row contact-form-area">
                <div class="offset-2 col-8 contact-form">
                    @if(Auth::user()->status == 0)
                        <h3 class="text-danger text-center">Your Account Has been Blocked By Admin</h3>
                    @else

                        @if(Auth::user()->email_verify == 0)
                            <div class="row">
                                @include('errors.alert')
                                <form action="{{route('user.send-emailVcode') }}" method="post" class="c-form">
                                    @csrf
                                    <input type="hidden" name="id" value="{{Auth::user()->id}}">
                                    <div class="col-12">
                                        <div class="contact-block-form text-center">
                                            <h1 class="margin-bottom-20">Email Verification</h1>
                                            <p>Your E-mail : <strong> {{Auth::user()->email}}</strong></p>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-block btn-contact">Resend Code</button>
                                    </div>
                                </form>
                            </div>


                            <form action="{{ route('user.email-verify')}}" method="post" class="c-form">
                                @csrf
                                <input type="hidden" name="id" value="{{Auth::user()->id}}">
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="margin-bottom-50"></div>
                                        <div class="form-group">
                                            <input type="text" name="email_code"  value="{{old('email_code')}}" class="form-control" placeholder="@lang('Enter Code')" required>
                                            @if ($errors->has('email_code'))
                                                <strong class="error">{{ $errors->first('email_code') }}</strong>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-block btn-contact">Submit</button>
                                    </div>
                                </div>
                            </form>


                        @endif


                    @endif


                </div>
            </div>
        </div>
    </section>
    <!--================================
    contact us part end
    =====================================-->
@endsection

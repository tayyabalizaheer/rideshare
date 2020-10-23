@extends('user')
@section('force-css','bc blog')
@section('style')

@stop
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
                        <form id="c-form" action="" method="post">
                            @csrf

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <h5>@lang('Current Password')</h5>
                                        <input type="password" name="current_password" value="" class="form-control" placeholder="@lang('Current Password')">
                                        @if ($errors->has('current_password'))
                                            <strong class="error">{{ $errors->first('current_password') }}</strong>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <h5>New Password</h5>
                                        <input type="password" name="password" class="form-control" placeholder="@lang('New Password')">
                                        @if ($errors->has('password'))
                                            <strong class="error">{{ $errors->first('password') }}</strong>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <h5>Confirm Password</h5>
                                        <input type="password" name="password_confirmation" class="form-control" placeholder="@lang('Confirm Password')">
                                    </div>
                                </div>


                                <div class="col-12">
                                    <button type="submit" class="btn btn-contact btn-block">@lang('Submit')</button>
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

@stop


@section('script')
@stop
@section('js')

@stop
@extends('user')
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


                        @if (session('logout'))
                            <div class="alert alert-danger alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                {{ session('logout') }}
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (session('danger'))
                            <div class="alert alert-danger alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                {{ session('danger') }}
                            </div>
                        @endif

                        <form id="c-form" action="{{route('login')}}" method="post">
                            @csrf

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <h5>Username</h5>
                                        <input type="text" name="username" value="{{old('username')}}" class="form-control" placeholder="Enter Username">
                                        @if ($errors->has('username'))
                                            <strong class="error">{{ $errors->first('username') }}</strong>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <h5>Password</h5>
                                    <input type="password" name="password" class="form-control" placeholder="Enter Password">
                                    @if ($errors->has('password'))
                                        <strong class="error">{{ $errors->first('password') }}</strong>
                                    @endif
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-contact btn-block">Sign In</button>
                                </div>
                                <div class="col-12">
                                    <a href="{{ route('register') }}" class="btn btn-contact btn-block">Create an Account</a>
                                </div>
                            </div>



                            <div class="form-row  margin-top-30">
                                <div class="col-md-6">
                                    <a href="{{ route('password.request') }}" class="lostpass">Forgot Password</a>
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







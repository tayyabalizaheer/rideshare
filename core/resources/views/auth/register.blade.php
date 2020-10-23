@extends('user')
@section('force-css','bc blog')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/css/otherPageResponsive.css')}}">

@endsection
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

                        <form id="c-form" action="{{route('register')}}" method="post">
                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>First Name</h5>
                                        <input type="text" value="{{old('fname')}}" name="fname" id="fname"  class="form-control" placeholder="First Name" autocomplete="off">
                                        @if ($errors->has('fname'))
                                            <strong class="error">{{ $errors->first('fname') }}</strong>
                                        @endif
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Last Name</h5>
                                        <input type="text" value="{{old('lname')}}" name="lname" id="lname"  class="form-control" placeholder="Last Name" autocomplete="off">
                                        @if ($errors->has('lname'))
                                            <strong class="error">{{ $errors->first('lname') }}</strong>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="margin-bottom-20"></div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Username</h5>
                                        <input type="text" value="{{old('username')}}" name="username" id="username"  class="form-control checkUsername" placeholder="Username" autocomplete="off">
                                        @if ($errors->has('username'))
                                            <strong class="error">{{ $errors->first('username') }}</strong>
                                        @endif

                                        <span class="checkUsernameMsg text-danger"></span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Contact Number</h5>
                                        <input type="text" value="{{old('phone')}}" name="phone" id="phone"  class="form-control" placeholder="Phone" autocomplete="off">
                                        @if ($errors->has('phone'))
                                            <strong class="error">{{ $errors->first('phone') }}</strong>
                                        @endif
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <div class="margin-bottom-20"></div>
                                </div>


                                <div class="col-md-12">
                                    <div class="form-group">
                                        <h5>E-mail Address</h5>
                                        <input type="email" value="{{old('email')}}" name="email" id="email"  class="form-control checkUserEmail" placeholder="E-mail Address" autocomplete="off">
                                        @if ($errors->has('email'))
                                            <strong class="error">{{ $errors->first('email') }}</strong>
                                        @endif
                                        <span class="checkUserEmailMsg text-danger"></span>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="margin-bottom-20"></div>
                                </div>


                                <div class="col-md-6">
                                    <h5>Password</h5>
                                    <input type="password" name="password" class="form-control" placeholder="Enter Password">
                                    @if ($errors->has('password'))
                                        <strong class="error">{{ $errors->first('password') }}</strong>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <h5>Confirm Password</h5>
                                    <input type="password" name="password_confirmation" class="form-control" placeholder="Enter Password">
                                    @if ($errors->has('password_confirmation'))
                                        <strong class="error">{{ $errors->first('password_confirmation') }}</strong>
                                    @endif
                                </div>

                                <div class="col-md-12">
                                    <div class="margin-bottom-30"></div>
                                    <button type="submit" class="btn btn-contact btn-continue btn-block">Sign Up</button>
                                </div>
                            </div>



                            <div class="form-row  margin-top-30">
                                <div class="col-md-6">
                                    <span>Already Registered <a href="{{ route('login') }}" class="lostpass">Sign In</a></span>
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




@section('js')
    <script>


        $(document).ready(function () {
            $(".checkUserEmail").on('keyup', function(){
                var email = $('.checkUserEmail').val();
                $.ajax({
                    type: "post",
                    url: "{{route('checkMail')}}",
                    data: {
                        email : email
                    },
                    success:function(data){
                        if(data.status == "existEmail")
                        {
                            $('.checkUserEmailMsg').text("This Email already Exist!!");
                            $('.btn-continue').attr('disabled',true);
                        }else{
                             $('.checkUserEmailMsg').text("");
                             $('.btn-continue').attr('disabled',false);
                        }
                        console.log(data)
                    },
                    error:function(data){

                    }
                })
            });

            $(".checkUsername").on('keyup', function(){
                var username = $('.checkUsername').val();
                $.ajax({
                    type: "post",
                    url: "{{route('checkUsername')}}",
                    data: {
                        username : username
                    },
                    success:function(data){
                        if(data.status == "existUsername")
                        {
                            $('.checkUsernameMsg').text("This Username already Exist!!");
                            $('.btn-continue').attr('disabled',true);
                        }else{
                             $('.checkUsernameMsg').text("");
                             $('.btn-continue').attr('disabled',false);
                        }
                        console.log(data)
                    },
                    error:function(data){

                    }
                })
            });


        });
    </script>
@stop
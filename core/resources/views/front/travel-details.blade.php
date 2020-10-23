@extends('user')
@section('force-css','bc blog blogdetails')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/css/blog.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/css/otherPageResponsive.css')}}">
    <style>
        .margin-top-10 {
            margin-top: 10px !important;
        }
        .padding-left-10 {
            padding-left: 10px !important;
        }
        .sidebar {
            background: #fff;
            padding: 20px 0px 10px 15px;
        }
    </style>

@stop

@section('content')
    @include('partials.breadcrumb')

    <section id="latest_news">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="c-box blog-3">
                                <article>
                                    <a href="javascript:void(0)">
                                        <h3>@lang('Passenger Contact Information') </h3>
                                    </a>


                                    <div class="margin-top-10">
                                            <div class="form-group">
                                                <label>@lang('Name') <span class="text-danger">*</span></label>
                                                @auth
                                                    <input type="text" name="passenger_name" class="form-control form-control-lg" autocomplete="off" placeholder="@lang('Enter Name')"
                                                           @if($bookTic->passenger_name != null)  value="{{$bookTic->passenger_name}}"  @else value="{{Auth::user()->fname}} {{Auth::user()->lname}}" @endif>
                                                @else
                                                    <input type="text" name="passenger_name" class="form-control form-control-lg" placeholder="@lang('Enter Name')" autocomplete="off"
                                                           @if($bookTic->passenger_name != null)  value="{{$bookTic->passenger_name}}" @else value="" @endif>
                                                @endauth
                                            </div>


                                            <div class="form-group">
                                                <label>E-Mail <span class="text-danger">*</span></label>
                                                @auth
                                                    <input type="text" name="email" class="form-control form-control-lg" placeholder="@lang('Enter E-mail')" autocomplete="off"
                                                           @if($bookTic->email != null)  value="{{$bookTic->email}}" @else value="{{Auth::user()->email}}" @endif >
                                                @else
                                                    <input type="text" name="email" class="form-control form-control-lg checkUserEmail" placeholder="@lang('Enter E-mail')" autocomplete="off"
                                                           @if($bookTic->email != null)  value="{{$bookTic->email}}" @else value="" @endif>

                                                           <span class="checkUserEmailMsg text-danger"></span>
                                                @endauth
                                            </div>


                                            <div class="form-group">
                                                <label>Mobile <span class="text-danger">*</span></label>
                                                @auth
                                                    <input type="text" name="phone" class="form-control form-control-lg" placeholder="@lang('Enter Mobile No.')" autocomplete="off"
                                                           @if($bookTic->phone != null)  value="{{$bookTic->phone}}" @else value="{{Auth::user()->phone}}" @endif>
                                                @else
                                                    <input type="text" name="phone" class="form-control form-control-lg" placeholder="@lang('Enter Mobile No.')" autocomplete="off"
                                                           @if($bookTic->phone != null)  value="{{$bookTic->phone}}" @else value="" @endif>
                                                @endauth
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>Next of Kin Name <span class="text-danger">*</span></label>
                                                <input type="text" name="next_of_kin_name" class="form-control form-control-lg" placeholder="@lang('Enter Next Of Kin Name.')" autocomplete="off"
                                                           @if($bookTic->next_of_kin_name != null)  value="{{$bookTic->next_of_kin_name}}" @else value="" @endif>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>Next of Kin Phone <span class="text-danger">*</span></label>
                                                <input type="number" name="next_of_kin_phone" class="form-control form-control-lg" placeholder="@lang('Enter Next Of Kin Phone.')" autocomplete="off"
                                                           @if($bookTic->next_of_kin_phone != null)  value="{{$bookTic->next_of_kin_phone}}" @else value="" @endif>
                                            </div>

                                        <input type="hidden" name="gate_id" class="gate-id">
                                    </div>


                                </article>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="sidebar">
                        <div class="recent-posts-widget sidebar-widget sidebar-widget4">
                            <h3>@lang('Journey Details')</h3>
                            <h4 class="text-success margin-top-10">{{$bookTic->tripRoute->start_point_name}}
                                - {{$bookTic->tripRoute->end_point_name}}</h4>
                            <ul>
                                <li>
                                    {{($bookTic->fleetRegistration->company) ?? ''}}
                                    - {{($bookTic->fleetRegistration->owner) ?? ''}}
                                </li>
                                <li>{{date('D, d M Y, h:i A',strtotime($bookTic->booking_date))}}</li>
                                <li>@lang('Seat No')s): <strong
                                            class="padding-left-10 text-success ">{{$bookTic->seat_number}}</strong>
                                </li>
                                <li>@lang('Boarding'): <strong>{{$bookTic->boarding}}</strong></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <div class="card-footer">
                    <button  class="btn btn-block btn-success btn-lg btn-continue">Payment Options</button>
                </div>
            </div>
            
        </div>
    </section>
@stop


@section('script')
@stop
@section('js')
    <script>


        $(document).ready(function () {
            var tt =  $("div.bhoechie-tab-menu>div.list-group>a").data('id');
            $('.gate-id').val(tt);


            $("div.bhoechie-tab-menu>div.list-group>a").click(function (e) {
                e.preventDefault();
                $(this).siblings('a.active').removeClass("active");
                $(this).addClass("active");
                var index = $(this).index();
                $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
                $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
                $('.gate-id').val($(this).data('id'));
            });


            $('.btn-continue').on('click', function (e) {
                e.preventDefault();
                var passenger_name = $("input[name=passenger_name]").val();
                var email = $("input[name=email]").val();
                var phone = $("input[name=phone]").val();
                var next_of_kin_name = $("input[name=next_of_kin_name]").val();
                var next_of_kin_phone = $("input[name=next_of_kin_phone]").val();
                var gatewayId = 104;
                var bookTicId = "{{$bookTic->id}}";

                if (phone.length == 0) {
                    toastr.error("Enter Mobile Number");
                }
                if (email.length == 0) {
                    toastr.error("Enter E-mail Address");
                }
                if (passenger_name.length == 0) {
                    toastr.error("Enter Passenger Name");
                }
                if (gatewayId.length == 0) {
                    toastr.error("You could not Change  Gateway Id");
                }
                if (next_of_kin_name.length == 0) {
                    toastr.error("Enter Next of Kin Name");
                }
                if (next_of_kin_phone.length == 0) {
                    toastr.error("Enter Next of Kin Phone ");
                }
                if ((phone.length != 0) && (email.length != 0) && (passenger_name.length != 0) && (gatewayId.length != 0)&& (next_of_kin_name.length != 0)&& (next_of_kin_phone.length != 0))
                {

                    $.ajax({
                        type: "post",
                        url: "{{route('ticketPayment')}}",
                        data: {
                            passenger_name:passenger_name,
                            email:email,
                            phone:phone,
                            next_of_kin_name:next_of_kin_name,
                            next_of_kin_phone:next_of_kin_phone,
                            bookTicId:bookTicId,
                            gatewayId:gatewayId
                        },

                        success:function(data){
                            if(data.status === "unknownGateway"){
                                toastr.error("Unknown Gateway!!");
                            }
                            if(data.status === "invalidEmail"){
                                toastr.error("Invalid E-mail !!");
                            }
                            if(data.status === "invalidTicket"){
                                toastr.error("Invalid Ticket Request !!");
                            }
                            if(data.status === "depositLimit"){
                                toastr.error(data.msg);
                            }
                            if(data.status === "confirmPayment"){
                                window.location.href = data.url;
                            }

                        },
                        error:function (res) {
                            console.log(res);
                        }

                    });
                }
            });


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
                            $('.checkUserEmailMsg').text("This Email already registered. Please Sign In Your Account");
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

                //console.log()

            });



        });
    </script>
@stop
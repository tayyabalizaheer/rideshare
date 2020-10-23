<!DOCTYPE html>
<!--[if lt IE 7 ]>
<html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]>
<html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]>
<html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="zxx">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title> @isset($page_title)  {{__($page_title)}} | @endisset  {{__($basic->sitename)}}  </title>
    <!-- favicon -->
    <link rel="shortcut icon" href="{{asset('assets/images/logo/favicon.png')}}" type="image/x-icon">

    <!--Google Font-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,600i,700" rel="stylesheet">
    <!--Bootstrap Stylesheet-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/css/bootstrap.min.css')}}">

@yield('import-css')
<!--Owl Carousel Stylesheet-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/css/plugins/owl.carousel.min.css')}}">
    <!--Slick Slider Stylesheet-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/css/plugins/slick-theme.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/css/plugins/slick.css')}}">
    <!--Font Awesome Stylesheet-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/css/font-awesome.min.css')}}">
    <!--Animate Stylesheet-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/css/plugins/animate.css')}}">
    <link href="{{asset('assets/admin/css/toastr.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/admin/css/sweetalert.css')}}" rel="stylesheet">
    <!--Main Stylesheet-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/css/style.css')}}">
    <link rel="stylesheet"  href="{{asset('assets/front/css/style.php')}}?color={{ $basic->color }}">
    <!--Responsive Stylesheet-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/css/homePageResponsive.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    @yield('style')
    
</head>

<body class="body-class @yield('force-css')">
<!--Start Preloader-->
<div class="site-preloader">
    <div class="spinner">
        <div class="double-bounce1"></div>
        <div class="double-bounce2"></div>
    </div>
</div>
<!--End Preloader-->

<!--Start Body Wrap-->
<div id="body-wrap">
    <div id="main-menu">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="{{url('/')}}">
                    <img src="{{asset('assets/images/logo/logo.png')}}" alt="..">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link  @if(request()->is('/')) active @endif" href="{{url('/')}}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if(request()->is('search')) active @endif" href="{{route('search')}}">Search Ride </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link @if(request()->is('trip-assign.create')) active @endif" href="{{route('trip-assign.create')}}">Offer Ride </a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link @if(request()->is('about-us')) active @endif" href="{{route('about')}}">About </a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link @if(request()->is('blog')) active @endif" href="{{route('blog')}}">Blog</a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link @if(request()->is('faqs')) active @endif" href="{{route('faqs')}}">Faq</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if(request()->is('contact-us')) active @endif" href="{{route('contact')}}">Contact</a>
                        </li>
                        
                        
                        @include('partials.lang')

                        @auth
                            @if(Auth::user()->is_driver)
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#"
                                   id="driver-menu" role="button" data-toggle="dropdown" aria-haspopup="true"
                                   aria-expanded="false" style="margin:0">
                                    Driver
                                </a>
                                <div class="dropdown-menu" aria-labelledby="driver-menu">
                                    <a class="dropdown-item" href="{{route('trip-bookings')}}">Trip Bookings</a>
                                    <a class="dropdown-item" href="{{route('trip-assign')}}">My Trips</a>
                                    <a class="dropdown-item" href="{{route('trip-close')}}">My Close Trips</a>

                                    <a class="dropdown-item" href="{{route('trip-assign.create')}}">Offer Ride</a>
                                    <a class="dropdown-item" href="{{route('manage-route')}}">'My Routes</a>
                                    <a class="dropdown-item" href="{{route('withdraw.money')}}">Withdraw (<strong> {{Auth::user()->balance}} {{$basic->currency}} )</strong></a>
                                    <a class="dropdown-item" href="{{route('user.withdrawLog')}}">Withdraw List</a>
                                    
                                </div>
                            </li>
                            @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('become.driver')}}">Become Driver</a>
                            </li>
                            @endif
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle mamunur_rashid_top_book_btn" href="#"
                                   id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true"
                                   aria-expanded="false" style="margin:0">
                                    {{Auth::user()->username}}
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown2">  
                                    <a class="dropdown-item" href="{{route('allbookings')}}">My Booking</a>
                                    
                                    <a class="dropdown-item" href="{{route('user.trx')}}">Transaction Log</a>
                                    <a class="dropdown-item" href="{{route('ticket-cancel')}}">Ticket Cancel</a>
                                    <a class="dropdown-item" href="{{route('ticket-print')}}">Print Download</a>
                                    <a class="dropdown-item" href="{{route('edit-profile')}}">'My Profile</a>
                                    <a class="dropdown-item" href="{{route('user.change-password')}}">Change Password</a>
                                    <a href="{{ route('logout') }}" class="dropdown-item"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign Out</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">{{ csrf_field() }}</form>
                                </div>
                            </li>
                        @endauth
                    </ul>
                    @guest
                        <a class="mamunur_rashid_top_book_btn" href="{{route('login')}}">@lang('Sign In')</a>
                    @endguest
                </div>
            </div>
        </nav>
    </div>

    @yield('content')

    <section style="margin-top: 78px; min-height: 100vh;">
        @yield('driver')
    </section>

    @include('partials.footer')
</div>
<!--End Body Wrap-->

<script src="{{asset('assets/front/js/jquery.2.1.2.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script src="{{asset('assets/front/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/front/js/plugins/waypoints.js')}}"></script>
<script src="{{asset('assets/front/js/plugins/jquery.counterup.min.js')}}"></script>
<script src="{{asset('assets/admin/js/toastr.min.js')}}"></script>
<script src="{{asset('assets/admin/js/sweetalert.js')}}"></script>
<link rel="stylesheet" href="https://unpkg.com/@bootstrapstudio/bootstrap-better-nav/dist/bootstrap-better-nav.min.css">


@yield('script')
<script src="{{asset('assets/front/js/plugins/owl.carousel.min.js')}}"></script>
<script src="{{asset('assets/front/js/plugins/venobox.min.js')}}"></script>
<script src="{{asset('assets/front/js/plugins/slick.min.js')}}"></script>
<script src="{{asset('assets/front/js/custom.js')}}"></script>
<script src="https://unpkg.com/@bootstrapstudio/bootstrap-better-nav/dist/bootstrap-better-nav.min.js"></script>


@yield('js')
@if (session('success'))
    <script>
        $(document).ready(function () {
            swal("Success!", "{{ session('success') }}", "success");
        });
    </script>
@endif

@if (session('alert'))
    <script>
        $(document).ready(function () {
            swal("Sorry!", "{{ session('alert') }}", "error");
        });
    </script>
@endif

@if(Session::has('message'))
    <script>
        var type = "{{Session::get('alert-type','info')}}";
        switch (type) {
            case 'info':
                toastr.info("{{Session::get('message')}}");
                break;
            case 'warning':
                toastr.warning("{{Session::get('message')}}");
                break;
            case 'success':
                toastr.success("{{Session::get('message')}}");
                break;
            case 'error':
                toastr.error("{{Session::get('message')}}");
                break;
        }
    </script>
@endif

</body>

</html>
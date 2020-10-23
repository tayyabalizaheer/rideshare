@extends('user')
@section('force-css','bc blog')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/css/blog.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/css/bc.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/css/otherPageResponsive.css')}}">
@endsection
@section('content')
    @include('partials.breadcrumb')


    <!-- ============= About Us Area Start ============= -->
    <section id="aboutus">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="about-img">
                        <img class="img-fluid" src="{{asset('assets/images/about-video-image.jpg')}}" alt="">
                    </div>
                </div>
                <div class="col-md-6">
                    <h3>{{__($page_title)}}</h3>

                    {!! $basic->about !!}
                </div>
            </div>
        </div>
    </section>



  
@stop
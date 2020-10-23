@extends('user')
@section('force-css','bc blog')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/css/blog.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/css/bc.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/css/otherPageResponsive.css')}}">
@endsection
@section('content')
@include('partials.breadcrumb')



<!-- =============== Latest News Area Start ============================ -->
<section id="latest_news" class="single-blog blogs">
    <div class="container">
        <div class="row">
            <!-- Start Single Blog -->
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="blog-box">
                            <div class="blog-content-area">
                                <div class="blog-details">
                                    <h3 class="margin-bottom-50 text-center">{{__($menu->name)}}</h3>
                                    {!! __($menu->description) !!}
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</section>
<!-- =============== Latest News Area End ============================ -->
@stop
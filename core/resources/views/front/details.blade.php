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
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12">
                        <div class="blog-box">
                            <div class="blog-content-area">
                                <div class="blog-img">
                                    <img src="{{asset('assets/images/post/'.$post->image)}}" class="img-fluid" alt="">
                                </div>
                                <div class="blog-details">
                                    <h3>{{$post->title}}</h3>
                                    <ul class="list-inline meta">
                                        <li><a href="javascript:void(0)"> <i class="fa fa-clock-o"></i>{{date('d M Y', strtotime($post->created_at))}}</a></li>
                                        <li><a href="javascript:void(0)"><i class="fa fa-eye"></i> {{$post->hit}} Views</a></li>
                                    </ul>
                                    {!! $post->details !!}
                                </div>
                                <div class="blog_links">
                                    <ul>
                                        <li><a href="https://www.facebook.com/sharer/sharer.php?u={{urlencode(url()->current()) }}"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="https://twitter.com/intent/tweet?text=my share text&amp;url={{urlencode(url()->current()) }}"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="https://plus.google.com/share?url={{urlencode(url()->current()) }}"><i class="fa fa-google-plus"></i></a></li>
                                        <li><a href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{urlencode(url()->current()) }}&amp;title=my share text&amp;summary=dit is de linkedin summary">
                                                <i class="fa fa-linkedin"></i></a></li>
                                    </ul>

                                </div>
                            </div>
                            <div class="comments-container">
                                <div class="fb-comments" data-colorscheme="dark" data-width="100%"
                                     data-href="{{url()->current()}}"
                                     data-numposts="5"></div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


            <!-- End Single Blog -->
            <div class="col-md-4">
                <div class="sidebar">
                    <div class="categories-widget sidebar-widget sidebar-widget3">
                        <h4>Categories</h4>
                        <ul class="list-unstyled">
                            @foreach($categories as $data)
                            <li><a href="{{route('cats.blog',[$data->id, str_slug($data->name)])}}">{{$data->name}}<span>{{$data->posts()->count()}}</span></a></li>
                                @endforeach
                        </ul>
                    </div>


                </div>
            </div>

        </div>
    </div>
</section>
<!-- =============== Latest News Area End ============================ -->
@stop
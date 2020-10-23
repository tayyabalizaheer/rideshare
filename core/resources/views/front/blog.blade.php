@extends('user')
@section('force-css','bc blog')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/css/otherPageResponsive.css')}}">

    @endsection
@section('content')
@include('partials.breadcrumb')


<!-- =============== Latest News Area Start ============================ -->
<section id="latest_news">
    <div class="container">
        <div class="row">
            @foreach($posts as $data)
            <div class="col-lg-4 col-md-6">
                <div class="c-box">
                    <div class="img">
                        <img class="img-fluid" src="{{asset('assets/images/post/'.$data->thumb)}}" alt="">
                    </div>
                    <article>
                        <a href="{{route('blog.details',[$data->id, str_slug($data->title)])}}">
                            <h4>{{__($data->title)}}</h4>
                        </a>
                        <div class="b-c">
                            <ul>
                                <li><i class="fa fa-clock-o"></i> {{date('d M Y', strtotime($data->created_at))}} </li>
                                <li><span class="span">|</span></li>
                                <li><i class="fa fa-eye"></i> {{$data->hit}} Views</li>
                            </ul>
                        </div>
                        <p>

                        </p>
                    </article>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-12 text-center margin-top-30">
                <nav aria-label="Page navigation example">
                    {{$posts->links('partials.pagination')}}
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- =============== Latest News Area End ============================ -->

@stop
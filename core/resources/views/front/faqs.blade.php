@extends('user')
@section('force-css','bc blog')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/css/otherPageResponsive.css')}}">

    @endsection
@section('content')
@include('partials.breadcrumb')

<div id="faq">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-12  accordion1_area">
                        <h3 class="">@lang('Frequently asked questions')</h3>
                        <div id="accordion">
                            @foreach($faqs as $k=>$data)
                            <div class="card">
                                <div class="card-header" id="heading{{$k}}">
                                    <h3 class="mb-0">
                                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{$k}}" aria-expanded="true" aria-controls="collapse{{$k}}">
                                            <i class="fa fa-chevron-down text-right" aria-hidden="true"></i>
                                           {{__($data->title)}}
                                        </button>
                                    </h3>
                                </div>

                                <div id="collapse{{$k}}" class="collapse @if($k ==0) show @endif" aria-labelledby="heading{{$k}}" data-parent="#accordion">
                                    <div class="card-body">
                                        {!! __($data->description) !!}
                                    </div>
                                </div>
                            </div>
                                @endforeach

                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-4 newsletter">
                <div class="n-box">
                    <div class="overly"></div>
                    <article>
                        <h4>@lang('Sign up for')</h4>
                        <h3>@lang('Our Newsletter')</h3>

                        @include('errors.error')
                        <form action="{{route('subscribe')}}" method="post">
                            @csrf
                            <input type="email" name="email" value="{{old('email')}}" class="mamunur_rashid_form" placeholder="@lang('Your Email Address')" required>
                            <button type="submit" class="mamunur_rashid_form mr-btn">@lang('SUBSCRIBE')</button>
                        </form>

                    </article>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
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
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="google_map_wrapper">
                        <div id="map"  data-latitude="{{$basic->latitude}}" data-longitude="{{$basic->longitude}}"></div>
                    </div>
                    <div class="contact-address">
                        <div class="con-num">
                            <div>
                                <div class="media">
                                    <i class="fa fa-map-marker mr-3"></i>
                                    <div class="media-body">
                                        <h5>@lang('Address')</h5>
                                        <p>{!! wordwrap($basic->address,15,"<br>\n",TRUE) !!}</p>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="media">
                                    <i class="fa fa-mobile mr-3"></i>
                                    <div class="media-body">
                                        <h5>@lang('Phone')</h5>
                                        <a class="d-block" href="javascript:void(0)">
                                            {{$basic->phone}}
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <div class="media mlc">
                                    <i class="fa fa-envelope mr-3"></i>
                                    <div class="media-body">
                                        <h5>@lang('Email')</h5>
                                        <a class="d-block" href="javascript:void(0)">
                                            {{$basic->email}}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="f-social-links">
                            @foreach($social as $data)
                                <a href="{{$data->link}}" target="_blank">
                                    {!! $data->code !!}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="contact-form-area-padding">
            <div class="container">
                <div class="row contact-form-area">
                    <div class="col-lg-6">
                        <div class="img">

                        </div>
                    </div>
                    <div class="col-lg-6 contact-form">
                        <div class="row">
                            <div class="col-12">
                                <div class="contact-block-form">
                                    <h4>@lang('Contact Us')</h4>
                                </div>
                            </div>
                        </div>
                        <form id="c-form" action="{{route('contact.submit')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" placeholder="@lang('Enter Name')" name="name"
                                           value="{{old('name')}}" required>
                                </div>
                                <div class="col-md-12">
                                    <input type="email" class="form-control" placeholder="@lang('Enter Mail')" name="email"
                                           value="{{old('email')}}" required>
                                </div>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" placeholder="@lang('Subject')" name="subject"
                                           value="{{old('subject')}}" required>
                                </div>
                                <div class="col-12">
                                    <textarea class="form-control" rows="3" id="comment" placeholder="@lang('Comment')"
                                              name="message" required> {{old('message')}}</textarea>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-contact">Submit</button>
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
    <!--    map js -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC7eALQrRUekFNQX71IBNkxUXcz-ALS-MY&sensor=false"></script>
    <script src="{{asset('assets/front/js/plugins/gmap.js')}}"></script>
    <!-- google map activate js -->
{{--    <script src="{{asset('assets/front/js/google-map-activate.js')}}"></script>--}}

@stop
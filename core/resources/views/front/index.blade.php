@extends('user')
@section('force-css','index-1')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/css/jquery.autocomplete.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/css/flatpickr.min.css')}}">
    {{--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">--}}
    <style type="text/css">
        @media screen and (max-width: 991px) {
          #choose-us{
            display: none;
          }
          #popular_destinations{
            display: none;
          }
            #latest_news{
            display: none;
          }
          #popular_turs{
            padding: 365px 0px 96px;
          }
          .h-seaerch-area{
            z-index: 99;
          }
        }
    </style>
@stop
@section('content')
    <!-- =========== nav end =========== -->
    <div id="banner">
        <div class="overly"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-md-10 text-center banner_slider">
                    <div class="banner_info">
                        @foreach($slider  as $data)
                            <article>
                                <h4>{{__($data->title)}}</h4>
                                <h2>{{__($data->sub_title)}}</h2>
                                <p>{{__($data->description)}}</p>
                            </article>
                        @endforeach

                    </div>
                </div>
            </div>

            <div class="row b-serch">
                <div class="col-12">
                    <div class="h-seaerch-area">

                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show normal active" id="nav-home" role="tabpanel"
                                 aria-labelledby="nav-home-tab">
                                <form action="{{route('search')}}" method="get">
                                    <div class="form-row">
                                        <div class="col-lg-3">
                                            <input type="text" name="start_point" value="{{old('start_point')}}"
                                                   class="form-control form-control-lg"
                                                   id="fromAutoComplete" placeholder="@lang('From')">
                                        </div>
                                        <div class="col-lg-3">
                                            <input type="text" name="end_point" value="{{old('end_point')}}"
                                                   id="toAutoComplete" class="form-control form-control-lg"
                                                   placeholder="@lang('To')">
                                        </div>
                                        <div class="col-lg-3">
                                            <input type="text" name="date" id="datetimepicker2" value="{{old('date')}}"
                                                   class="form-control form-control-lg"
                                                   placeholder="@lang('Date')">
                                        </div>

                                        <div class="col-lg-3">
                                            <button type="submit"
                                                    class="btn btn-primary btn-lg  h-serch mamunur_rashid_form_sm">
                                                @lang('SEARCH')
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- =========== banner end =========== -->

  


    <!-- =========== Popular Tours Start ============= -->

    <section id="popular_turs">
        <div class="overly"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-10 text-center">
                    <h2 class="section-heading">{{__($basic->popular_tour_h)}}</h2>
                    <p class="section-paragraph">{{__($basic->popular_tour_p)}}</p>
                </div>
            </div>
            <div class="row tur-slider">
                @foreach($popularTour as $data)
                    <div class="col-lg-4">
                        <div class="c-box">
                            <div class="img">
                                <img class="img-fluid" src="{{asset('assets/images/tour/'.$data->image)}}" alt="...">
                            </div>
                            <article>
                                <h4>{{__($data->name)}}</h4>
                                <p>{{__($data->details)}}</p>

                            </article>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- =========== Popular Tours end ============= -->

    <!-- =============== popular Destinations Start ================= -->
    <section id="popular_destinations">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-10 text-center">
                    <h2 class="section-heading">{{__($basic->popular_destination_h)}}</h2>
                    <p class="section-paragraph">{{__($basic->popular_destination_p)}}</p>
                </div>
            </div>
            <div class="row">
                @foreach($popularDestination as $data)
                    <div class="col-lg-4 col-sm-6 p-0 mr-px-15">
                        <div class="c-box">
                            <div class="img">
                                <img class="img-fluid" src="{{asset('assets/images/tour/'.$data->image)}}" alt="...">
                            </div>
                            <article>
                                <div class="footer d-flex justify-content-between">
                                    <div>
                                        <span><i class="fa fa-map-marker"></i> {{__($data->name)}}</span>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- =============== popular Destinations End ================= -->


    <!-- =============== Latest News Area Start ============================ -->
    <section id="latest_news">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-10 text-center">
                    <h2 class="section-heading">{{__($basic->news_h)}}</h2>
                    <p class="section-paragraph">{{__($basic->news_p)}}</p>
                </div>
            </div>
            <div class="row">
                @foreach($posts as $data)
                    <div class="col-lg-4 col-md-6">
                        <div class="c-box c-box1">
                            <div class="img">
                                <img class="img-fluid" src="{{asset('assets/images/post/'.$data->thumb)}}" alt="...">
                            </div>
                            <article>
                                <a href="{{route('blog.details',[$data->id, str_slug($data->title)])}}">
                                    <h4>{{__($data->title)}}</h4>
                                </a>
                                <div class="b-c">
                                    <ul>
                                        <li>
                                            <i class="fa fa-clock-o"></i> {{date('d M, Y', strtotime($data->created_at))}}
                                        </li>
                                        <li><span class="span">|</span></li>
                                        <li><i class="fa fa-eye"></i> {{$data->hit}} Views</li>
                                    </ul>
                                </div>
                                <p>     {{substr(strip_tags($data->details), 0, 100)}}...</p>
                            </article>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- =============== Latest News Area End ============================ -->




    <!---=========================== Start Enquiry  =============================--->
    <section id="contact-main">

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
                                    <h4>{{__($basic->enquiry_h)}}</h4>
                                    <p>{{__($basic->enquiry_p)}} </p>
                                </div>
                            </div>
                        </div>
                        @include('errors.error')
                        <form id="c-form" action="{{route('enquiry')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" placeholder="@lang('Enter Your Name')" name="name"
                                           value="{{old('name')}}">
                                </div>
                                <div class="col-md-12">
                                    <input type="email" class="form-control" placeholder="@lang('Enter Your Mail')" name="email"
                                           value="{{old('email')}}">
                                </div>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" placeholder="@lang('Phone Number')" name="phone"
                                           value="{{old('phone')}}">
                                </div>
                                <div class="col-12">
                                    <textarea class="form-control" rows="3" id="comment" placeholder="@lang('Enquiry')"
                                              name="enquiry">{{old('enquiry')}}</textarea>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-contact">@lang('Submit')</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!---=========================== End Enquiry  =============================--->

@stop


@section('script')
    <script src="{{asset('assets/front/js/jquery.autocomplete.js')}}"></script>
    <script src="{{asset('assets/front/js/flatpickr.js')}}"></script>
    {{--<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>--}}
@stop
@section('js')
    <script type="text/javascript">
        $(document).ready(function () {
            var states = {!! $tripFrom !!};
            $(function () {
                $("#fromAutoComplete").autocomplete({
                    source: [states]
                });
            });
            $(function () {
                $("#toAutoComplete").autocomplete({
                    source: [states]
                });
            });


            $("#datetimepicker2").flatpickr({
                minDate: "today",
                maxDate: new Date().fp_incr(50), // 14 days from now
                dateFormat: "d M Y",
            });


        });


    </script>
@stop
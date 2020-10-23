@extends('user')
@section('force-css','index-1')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/css/jquery.autocomplete.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/css/flatpickr.min.css')}}">
    {{--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">--}}
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

        </div>
    </div>
    <!-- =========== banner end =========== -->

    <!-- =========== Whay Choose Us Start ============ -->
    <section id="choose-us">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-10 text-center">
                    <h2 class="section-heading">{{__($basic->why_us_h)}}</h2>
                    <p class="section-paragraph">{{__($basic->why_us_p)}}</p>
                </div>
            </div>
            <div class="row">
                @foreach($whyUs as $data)
                    <div class="col-lg-6 col-md-6">
                        <div class="c-box text-center">
                            <div class="icon">
                                {!! $data->icon !!}
                            </div>
                            <h4>{{__($data->name)}}</h4>
                            <p>{{__($data->details)}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- =========== Whay Choose Us End ============ -->


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
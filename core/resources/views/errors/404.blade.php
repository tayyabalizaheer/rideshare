@extends('user')
@section('force-css','bc blog')
@section('style')
    <style>
        .error {
            margin: 0 auto;
            text-align: center;
        }

        .error-code {
            bottom: 60%;
            color: #2d353c;
            font-size: 96px;
            line-height: 100px;
        }

        .error-desc {
            font-size: 12px;
            color: #647788;
        }

        .m-b-10 {
            margin-bottom: 10px!important;
        }

        .m-b-20 {
            margin-bottom: 20px!important;
        }

        .m-t-20 {
            margin-top: 20px!important;
        }

    </style>
@stop
@section('content')
    @php
        $page_title = "404";
    @endphp

    <section id="breadcrumb">
        <div class="overly"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10 text-center">
                    <div class="breadcrumbinfo">
                        <article>
                            <h2>{{__($page_title)}}</h2>
                            <a href="{{url('/')}}">@lang('Home')</a> <span>/</span>
                            <a class="active" href="{{url()->current()}}">{{__($page_title)}}</a>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- =========== Main Ticket Booking Area Start ===================== -->
    <div id="ticket-booking">
        <div class="container">
            <div class="row">
                <div class="col-12">

                    <div class="error">
                        <div class="error-code m-b-10 m-t-20">{{__($page_title)}} <i class="fa fa-warning"></i></div>
                        <h3 class="font-bold">@lang("We couldn't find the page..")</h3>

                        <div class="error-desc">
                            <div class="margin-top-80">
                                <a class=" login-detail-panel-button btn" href="{{url('/')}}">
                                    <i class="fa fa-arrow-left"></i>
                                    Go back to Homepage
                                </a>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>
@stop
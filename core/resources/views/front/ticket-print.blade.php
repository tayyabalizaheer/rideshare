@extends('user')
@section('force-css','bc blog')
@section('content')
    @include('partials.breadcrumb')


    <!--================================
        contact us  part start
    =====================================-->
    <section id="contact-main">

        <div class="contact-form">
            <div class="container">
                <div class="row contact-form-area">
                    <div class="col-lg-8 offset-2 contact-form">




                        <form id="c-form" action="{{route('get.ticket-print')}}" method="post">
                            @csrf

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <h5>@lang('PNR / Ticket Number') </h5>
                                        <input type="text" name="pnr" value="{{old('pnr')}}" class="form-control" placeholder="@lang('Enter PNR / Ticket Number')">
                                        @if ($errors->has('pnr'))
                                            <strong class="error">{{ $errors->first('pnr') }}</strong>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="btn btn-contact btn-block">@lang('Submit')</button>
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

@endsection







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

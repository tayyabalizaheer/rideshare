<style>
    .language-picker:hover {
        color: #fff;
    }

    .language-picker .slang-wrap:hover .name {
        color: #f45832;
    }

    .language-picker .slang-wrap .name {
        color: #ffd3c8;
    }

    .language-picker .default:hover .name {
        color: #fff;
    }

    .language-picker .default .all-lang li .name {
        color: #a2aab6;
    }

    .language-picker .default .all-lang li .name:hover {
        color: #f45832;
    }

    .language-picker .default {
        display: inline-block;
        position: relative;
        padding: 20px 0;
    }

    .language-picker .default:hover .all-lang {
        visibility: visible;
        opacity: 1;
        height: -webkit-fit-content;
        height: -moz-fit-content;
        height: fit-content;
    }

    .language-picker .default .all-lang {
        background-color: #fff;
        padding: 5px 10px;
        position: absolute;
        left: 0;
        top: 45px;
        z-index: 2;
        width: 100px;
        visibility: hidden;
        opacity: 0;
        height: 0;
        -webkit-transition: height 0.5s ease;
        -moz-transition: height 0.5s ease;
        -o-transition: height 0.5s ease;
        transition: height 0.5s ease;
    }

    .language-picker .default .all-lang li {
        display: block;
        margin: 5px 0;
    }
</style>

<div class="language-picker">
    <div class="default">



        @if(!Session::get('lang'))
            <div class="slang-wrap">
                <div class="img">
                    <img src="{{asset('assets/images/lang/en.jpg')}}" alt="En">
                </div>
                <div class="name">@lang('English') <i class="fas fa-angle-down"></i></div>
            </div>
            @else
        <div class="slang-wrap">
            <div class="img">
                <img src="{{asset('assets/images/lang/'.Session::get('lang').'.jpg')}}" alt="En">
            </div>
            <div class="name">{{Session::get('lang')}} <i class="fas fa-angle-down"></i></div>
        </div>
        @endif



        <ul class="all-lang">
            <li>
                <a href="{{route('lang', 'en') }}">
                    <div class="slang-wrap">
                        <div class="img">
                            <img src="{{asset('assets/images/lang/en.jpg')}}" alt="language flag">
                        </div>
                        <div class="name">@lang("English")</div>
                    </div>
                </a>
            </li>
            @foreach($lan as $data)
            <li>
                <a href="{{ route('lang', $data->code) }}">
                    <div class="slang-wrap">
                        <div class="img">
                            <img src="{{asset('assets/images/lang/'.$data->icon)}}" alt="{{$data->name}}">
                        </div>
                        <div class="name">{{__($data->name)}}</div>
                    </div>
                </a>
            </li>
                @endforeach
        </ul>
    </div>
</div>


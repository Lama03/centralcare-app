<div class="slider sub">
    <div class="swiper mainSlider">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="slider__slide">
                    <div class="slider__image">
                        <img src="{{ asset('web/assets/images/slider-sub3.png') }}" draggable="false" alt="alt">
                    </div>
                    <div class="slider__text">
                        <div class="container">
                            <h1 class="font-weight-bold" data-aos="fade-up">{{ $page_name ?? __('messages.side_page') }}</h1>
                            <div class="breadcrumb">
                                <ul vocab="https://schema.org/" typeof="BreadcrumbList">
                                    <li property="itemListElement" typeof="ListItem" class="first">
                                        <a href="{{ url('/') }}" property="item" typeof="WebPage">
                                            <span property="name">@lang('messages.Home')</span>
                                        </a>
                                    </li>

                                    <li class="active last">
                                        <span>{{ $page_name ?? __('messages.side_page') }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

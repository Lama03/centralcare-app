@extends('web.layouts.base')

@section('pageTitle'){{ $settings['website_name'][app()->getLocale()] ?? __('messages.Website title') }}@endsection

@section('metaKeys')
{!! $settings['home_page_seo'][app()->getLocale()] ?? '' !!}
@endsection

@section('languages')
    <div class="top-bar__block language nav-link gap-0">
        <ul class="list-inline">
            <li class="list-inline-item large-mg">
                <a href="{{ url(app()->getLocale() != 'ar' ? '/' : '?lang=en') }}" class="top-bar__side">
                    <div class="top-bar__text d-lg-inline-block">
                        {{ app()->getLocale() != 'ar' ? __('messages.ar') : __('messages.en') }}
                    </div>
                    <div class="top-bar__icon">
                        <img class="icon" src="{{ asset('web/assets/images/icons/Icon metro-language.svg') }}" draggable="false" alt="alt">
                    </div>
                </a>
            </li>
        </ul>
    </div>
@stop

@section('content')
    <div class="centered-overlay">
        <div class="slider">
            <div class="swiper mainSlider">
                <div class="swiper-wrapper">
                    @if(!empty($sliders))
                        @foreach($sliders as $slid)
                            <div class="swiper-slide">
                                <div class="slider__slide">
                                    <div class="slider__image">
                                        <img src="{{ asset($slid->image) }}" draggable="false" alt="alt">
                                    </div>
                                    <div class="slider__text">
                                        <div class="container">
                                            <h1 class="font-weight-bold" data-aos="fade-up">
                                                {{ $slid->first_title }}
                                                <span class="primary-color sub-slider-text">{{ $slid->second_title }}</span>
                                            </h1>
                                            <p class="lead slider__p" data-aos="fade-up" data-aos-delay="100">{!! $slid->description !!}</p>
                                            <div class="slider__actions" data-aos="fade-up" data-aos-delay="200">
                                                <a href="{{ url('book-an-appointment' . ( app()->getLocale() != 'ar' ? ( '/?lang=' . app()->getLocale() ) : '')) }}" class="btn btn-brand-primary">
                                                    @lang('messages.Book Now')
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="section-pagination absolute-pagination">
                <div class="container">
                    <div class="slider-pagination mainSliderPagination"></div>
                </div>
            </div>
            <div class="slider-controls">
                <div class="swiper-button-next slider-next"></div>
                <div class="swiper-button-prev slider-prev"></div>
            </div>


            <!-- 

            <div class="slider__overlay">
                <div class="container slider__overlay_container d-flex justify-content-end">
                    <div class="slider__block-visit">
                        <div class="slider__block-visit_text">
                            <div class="sub-text">@lang('messages.Latest Offers')</div>
                            <span class="text">@lang('messages.foundation_day_offers')</span>
                            <a href="{{ route('web.offers.index', (app()->getLocale() == 'en' ? ['lang' => app()->getLocale()] : '')) }}" class="redirect-link btn-link white">
                                @lang('messages.view_all')
                            </a>
                        </div>
                        <div class="slider__block-visit__overlay-img">
                            <img width="100%" height="100%" src="{{ asset('web/assets/images/icons/Group 67.svg') }}">
                        </div>
                        <div class="slider__block-visit_icon">
                            <img src="{{ asset('web/assets/images/offers-card.png') }}">
                        </div>
                    </div>
                </div>
            </div>


            -->
        </div>

        <div class="section-overlay">
            <!-- BEGIN :: include about card section -->
            @include('web.components.about_card', ['isSomeCondition' => true, 'content' => ( $settings['about_us_content'][app()->getLocale()] ?? '' )])
            <!-- END :: include about card section -->

            <section class="doctors d-pad our-services-background">
                <div class="container position-relative z-index-1">
                    <div class="section-title flex-column mb-0 text-center">
                        <h2 class="title" data-aos="fade-up">@lang('messages.our_services')</h2>
                        <div class="col-md-5 col-12 sub-desc">{{ $settings['our_services_content'][app()->getLocale()] ?? '' }}</div>
                    </div>
                    <div class="services__card-container row" data-aos="fade-up">
                        @foreach($services as $service)
                            <a href="{{ !in_array($service->slug, ['اللأسنان', 'Dental']) ? ( url("services/$service->slug") . ( app()->getLocale() != 'ar' ? '?lang=en' : '' )) : 'https://centraldentalcare.sa' }}" class="service-card col-4">
                                <div class="service-card__image">
                                    <img src="{{ $service->image }}" alt="service" draggable="false">
                                </div>
                                <div class="service-card__text">
                                    <div class="small-logo">
                                        <img src="{{ asset('web/assets/images/icons/Group 77.png') }}" alt="" />
                                    </div>
                                    <h3 class="service-title text-line-1">
                                        {{ $service->name }}
                                    </h3>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
                <div class="white-bottom-overlay"></div>
            </section>
        </div>

        <!-- BEGIN :: include book now section -->
        <div class="background-transparent">
            @include('web.components.book_now')
        </div>
        <!-- END :: include book now section -->

        <div class="section-overlay">
            <div class="overlay-background-logo">
                <img src="{{ asset('web/assets/images/icons/Path 168.svg') }}" alt="doctor" draggable="false">
            </div>

            <!-- BEGIN :: include doctors section -->
            @include('web.components.doctors')
            <!-- END :: include doctors section -->

            <!-- BEGIN :: include doctors section -->
            @include('web.components.reviews')
            <!-- END :: include doctors section -->
        </div>


        <!-- BEGIN :: include articles section -->
        @include('web.components.articles')
        <!-- END :: include articles section -->
    </div>
@stop

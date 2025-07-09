@extends('web.layouts.base')

@section('pageTitle', __('messages.terms_and_conditions'))

@section('languages')
    <div class="top-bar__block language nav-link gap-0">
        <ul class="list-inline">
            <li class="list-inline-item large-mg">
                <a href="{{ url(app()->getLocale() != 'ar' ? 'terms' : 'terms?lang=en') }}" class="top-bar__side">
                    <div class="top-bar__text d-lg-inline-block">
                        {{ app()->getLocale() != 'ar' ? __('messages.ar') : __('messages.en') }}
                    </div>
                    <div class="top-bar__icon">
                        <img class="icon" src="{{ asset('web/assets/images/icons/Icon metro-language.svg') }}?v=<?php echo time(); ?>" draggable="false" alt="alt">
                    </div>
                </a>
            </li>
        </ul>
    </div>
@stop

@section('content')
    <div class="simple-background blog-details-page centered-overlay">
        <!-- BEGIN :: include page header -->
        @include('web.components.page_header', ['page_name' => __('messages.terms_and_conditions')])
        <!-- END :: include page header -->

        <div class="section-overlay"></section>
            <div class="overlay-background-logo">
                <img src="{{ asset('web/assets/images/icons/Path 168.svg') }}" alt="doctor" draggable="false">
            </div>
            <section class="about-card d-pad pb-0 my-0">
                <div class="container position-relative">
                    <div class="row">
                        <div class="col-12 col-md-6 text-container">
                            <div class="section-title align-items-stretch flex-column mb-0">
                                <h2 class="title" data-aos="fade-up">@lang('messages.terms_and_conditions')</h2>
                                <p class="sub-desc mt-4">
                                    {!! $settings['terms_and_conditions_contnet'][app()->getLocale()] ?? '' !!}
                                </p>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 position-relative image-container">
                            <div class="about-card__img-wrapper justify-content-center img-lg-container mt-md-5 mt-0">
                                <image class="img-lg" src="{{ $settings['terms_and_conditions_image'] ?? asset('web/assets/images/terms.png') }}?v=<?php echo time(); ?>" width="100%" />
                                <div class="overlay-background-color w-100">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- BEGIN :: include book now section -->
            @include('web.components.book_now')
            <!-- END :: include book now section -->
        </div>
    </div>
@stop

@extends('web.layouts.base')

@section('pageTitle', __('messages.about'))

@section('metaKeys')
    {!! settings()->get('about.ceo') !!}
@endsection

@section('languages')
    <div class="top-bar__block language nav-link gap-0">
        <ul class="list-inline">
            <li class="list-inline-item large-mg">
                <a href="{{ url(app()->getLocale() != 'ar' ? 'about-us' : 'about-us?lang=en') }}" class="top-bar__side">
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
    <div class="about-page centered-overlay">
        <!-- BEGIN :: include about section -->
        @include('web.components.page_header', ['page_name' => __('messages.about')])
        <!-- END :: include about section -->

        <div class="section-overlay">
            <div class="overlay-background-logo">
                <img src="{{ asset('web/assets/images/icons/Path 168.svg') }}" alt="doctor" draggable="false">
            </div>

            <!-- BEGIN :: include about card section -->
            @include('web.components.about_card', ['isSomeCondition' => false, 'content' => ( $settings['about_us_page_content'][app()->getLocale()] ?? '' )])
            <!-- END :: include about card section -->
        </div>

        <section class="d-pad">
            <div class="container position-relative">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="section-title align-items-stretch flex-column mb-0">
                            <h2 class="title h5" data-aos="fade-up">@lang('messages.vision')</h2>
                            <div class="sub-desc">{{ $settings['about_vision'][app()->getLocale()] ?? '' }}</div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="section-title align-items-stretch flex-column mb-0">
                            <h2 class="title h5" data-aos="fade-up">@lang('messages.message')</h2>
                            <div class="sub-desc">{{ $settings['about_message'][app()->getLocale()] ?? '' }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- BEGIN :: include about card section -->
        @include('web.components.book_now')
        <!-- END :: include about card section -->

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

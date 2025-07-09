@extends('web.layouts.base')

@section('pageTitle')
    {{ $service->meta_title ? $service->meta_title : $service->name }}
@stop

@section('metaKeys')
    <meta name="title" content="{{  $service->meta_title ? $service->meta_title : '' }}" />
    <meta name="description" content="{{  $service->meta_description ? $service->meta_description : '' }}" />
    <meta name="keywords" content="{{  $service->meta_keywords  ? $service->meta_keywords : ''}}" />
    <link rel="canonical" href="{{ $service->canonical_url ? $service->canonical_url : '' }}" />
@stop

@section('languages')
    <div class="top-bar__block language nav-link gap-0">
        <ul class="list-inline">
            <li class="list-inline-item large-mg">
                <a href="{{ url(app()->getLocale() != 'ar' ? url('services/details/' . $service->translate('ar')->slug) : url('services/details/' . $service->translate('en')->slug) . '?lang=en' ) }}" class="top-bar__side">
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
    <div class="simple-background service-details-page centered-overlay">
        <!-- BEGIN :: include page header -->
        @include('web.components.page_header', ['page_name' => $service->name ?? '' ])
        <!-- END :: include page header -->

        <div class="section-overlay">
            <div class="overlay-background-logo">
                <img src="{{ asset('web/assets/images/icons/Path 168.svg') }}" alt="doctor" draggable="false">
            </div>
            <section class="about-card d-pad my-0 pb-0">
                <div class="container position-relative">
                    <div class="row">
                        <div class="col-12 col-md-6 text-container">
                            <div class="section-title align-items-stretch flex-column mb-0">
                                <div class="title-info">{{ $service->service->name }}</div>
                                <h2 class="title mt-2" data-aos="fade-up">{{ $service->name }}</h2>
                                <div class="sub-desc mt-2">{!! $service->description !!}</div>
                                <div>
                                    <a href="{{ url('book-an-appointment' . ( app()->getLocale() != 'ar' ? ( '/?lang=' . app()->getLocale() . "&speciality=$service->id" ) : "?speciality=$service->id")) }}" class="btn btn-brand-primary w-auto mt-4">@lang('messages.Book Now')</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 position-relative image-container">
                            <div class="overlay-background-color w-100">
                            </div>
                            <div class="about-card__img-wrapper justify-content-center img-lg-container mt-0">
                                <image class="img-lg" src="{{ $service->image }}" width="100%" />
                            </div>
                        </div>

                        <div class="col-12 order-2">
                            <section class="d-pad row">
                                <div class="container position-relative">
                                    <div class="section-title flex-column mb-3">
                                        <h2 class="title" data-aos="fade-up">@lang('messages.you_may_also_like')</h2>
                                    </div>
                                    <div class="services__card-container row" data-aos="fade-up">
                                        @if(!empty($specialtiesByServices))
                                            @foreach($specialtiesByServices as $specialt)
                                                <div class="col-12 col-md-3">
                                                    <a href="{{ route('web.services.details', (app()->getLocale() == 'en' ? ['slug' => $specialt->slug, 'lang' => app()->getLocale()] : ['slug' => $specialt->slug])) }}" class="service-card mb-3">
                                                        <div class="service-card__image">
                                                            <img src="{{ $specialt->image }}" alt="service" draggable="false">
                                                        </div>
                                                        <div class="service-card__text">
                                                            <div class="small-logo">
                                                                <img src="{{ asset('web/assets/images/icons/Group 77.svg') }}" />
                                                            </div>
                                                            <h3 class="service-title text-line-1 mt-1">
                                                                {{ $specialt->name }}
                                                            </h3>
                                                            <div>
                                                                <button href="{{ url('book-an-appointment' . ( app()->getLocale() != 'ar' ? ( '/?lang=' . app()->getLocale() ) : '')) }}" class="btn btn-brand-primary w-auto mt-2">@lang('messages.details')</button>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </section>

            <!-- BEGIN :: include book now section -->
            @include('web.components.book_now')
            <!-- END :: include book now section -->
        </div>

        <!-- BEGIN :: include articles section -->
        @include('web.components.articles')
        <!-- END :: include articles section -->
    </div>
@stop

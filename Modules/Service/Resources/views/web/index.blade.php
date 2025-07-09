@extends('web.layouts.base')

@section('pageTitle')
    {{ $service->meta_title ?? $service->name }}
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
                <a href="{{ app()->getLocale() != 'ar' ? url("/services/" . $service->getTranslation('ar')->slug) : url("/services/" . $service->getTranslation('en')->slug . "?lang=en") }}" class="top-bar__side">
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
    <div class="services-page simple-background">
        <!-- BEGIN :: include page header -->
        @include('web.components.page_header', ['page_name' => $service->meta_title ? $service->meta_title : $service->name ])
        <!-- END :: include page header -->

        <div class="section-overlay">
            <div class="overlay-background-logo">
                <img src="{{ asset('web/assets/images/icons/Path 168.svg') }}" alt="doctor" draggable="false">
            </div>
            <section class="d-pad pb-0">
                <div class="container position-relative">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="section-title flex-column align-items-start mb-0">
                                <h2 class="title" data-aos="fade-up">{{ $service->meta_title ? $service->meta_title : $service->name }}</h2>
                                <div class="sub-desc">{{ $service->description }}</div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="search-block aos-init aos-animate" data-aos="fade-up">
                                <form class="form-elm" method="GET" action="{{ url("/services/$service->slug") . ( app()->getLocale() != 'ar' ? '?lang=en' : '' ) }}">
                                    <div class="form-group">

                                        <input type="search"
                                               name="keyword"
                                               class="form-control white-input search-input"
                                               placeholder= "@if (request()->has('keyword')) {{ request()->get('keyword') }} @else @lang("messages.Searching for a service") @endif">

                                        @if( app()->getLocale() != 'ar' )
                                            <input type="hidden" name="lang" value="{{ app()->getLocale() }}" />
                                        @endif

                                        <button class="btn btn-search btn-brand-primary">
                                            <img class="icon" src="{{ asset('web/assets/images/icons/Icon feather-search.svg') }}" alt="search" draggable="false">
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="col-12 mt-3">
                            <div class="services__card-container row" data-aos="fade-up">
                                @foreach($specialties as $special)
                                    <div class="col-12 col-md-3">
                                        <a href="{{ route('web.services.details', (app()->getLocale() == 'en' ? ['slug' => $special->slug, 'lang' => app()->getLocale()] : ['slug' => $special->slug])) }}" class="service-card">
                                            <div class="service-card__image">
                                                <img src="{{ $special->image }}" alt="service" draggable="false">
                                            </div>
                                            <div class="service-card__text">
                                                <div class="small-logo">
                                                    <img src="{{ asset('web/assets/images/icons/Group 77.png') }}" />
                                                </div>
                                                <h3 class="service-title text-line-1">{{ $special->name ? $special->name : '' }}</h3>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>


                        <div class="col-lg-12">
                            <div class="page-pagination">
                               {{ $specialties->appends(app()->getLocale() == 'en' ? ['lang' => 'en'] : '')->links('web.home.pagination') }}
                               
                            </div>
                        </div>

                    </div>
                </div>
            </section>

            <!-- BEGIN :: include book now section -->
            @include('web.components.book_now')
            <!-- END :: include book now section -->
        </div>

        <div class="section-overlay"></section>
            <div class="overlay-background-logo">
                <img src="{{ asset('web/assets/images/icons/Path 168.svg') }}" alt="doctor" draggable="false">
            </div>

            <!-- BEGIN :: include articles section -->
            @include('web.components.articles')
            <!-- END :: include articles section -->
        </div>
    </div>
@stop

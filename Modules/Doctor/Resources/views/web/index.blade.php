@extends('web.layouts.base')

@section('pageTitle'){{ $settings['metatitle_doctor_page_seo'][app()->getLocale()] ??  __('messages.Central Care Doctors Doctors') }}@endsection

@section('metaKeys')
    {!! $settings['doctors_page_seo'][app()->getLocale()] ?? '' !!}
@endsection

@section('languages')
<div class="top-bar__block language nav-link gap-0">
    <ul class="list-inline">
        <li class="list-inline-item large-mg">
            <a href="{{ url(app()->getLocale() != 'ar' ? route(Route::currentRouteName(), array_replace(Route::getCurrentRoute()->parameters())) : route(Route::currentRouteName(), array_replace(Route::getCurrentRoute()->parameters(), ['lang' =>'en' ]))) }}"
                class="top-bar__side">
                <div class="top-bar__text d-lg-inline-block">
                    {{ app()->getLocale() != 'ar' ? __('messages.ar') : __('messages.en') }}
                </div>
                <div class="top-bar__icon">
                    <img class="icon" src="{{ asset('web/assets/images/icons/Icon metro-language.svg') }}"
                        draggable="false" alt="alt">
                </div>
            </a>
        </li>
    </ul>
</div>
@stop

@section('content')
    <div class="doctors-page simple-background">

        <!-- BEGIN :: include page header -->
        @include('web.components.page_header', ['page_name' => __('messages.Doctors')])
        <!-- END :: include page header -->

        <div class="section-overlay">
            <div class="overlay-background-logo">
                <img src="/web/assets/images/icons/Path 168.svg" alt="doctor" draggable="false">
            </div>
            <section class="d-pad pb-0">
                <div class="container position-relative">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="section-title flex-column align-items-start mb-0">
                                <h2 class="title" data-aos="fade-up">
                                    {{ __('messages.Doctors') }}
                                </h2>
                                <div class="sub-desc">
                                    {{ $settings['doctor_content'][app()->getLocale()] ?? '' }}
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="search-block aos-init aos-animate" data-aos="fade-up">
                                <form class="form-elm" method="GET"
                                      action="{{ route('web.doctors.index', app()->getLocale() == 'en' ? ['lang' => 'en' ] : '') }}">
                                    <div class="form-group">
                                        <input type="search" name="q" class="form-control white-input search-input" value=""
                                               placeholder="@if (request()->has('q')) {{ request()->get('q') }} @else {{ __("messages.Find a doctor") }} @endif">
                                        @if( app()->getLocale() != 'ar' )
                                            <input type="hidden" name="lang" value="{{ app()->getLocale() }}" />
                                        @endif
                                        <button class="btn btn-search btn-brand-primary">
                                            <img class="icon" src="/web/assets/images/icons/Icon feather-search.svg"
                                                 alt="search" draggable="false">
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-12 mt-3">
                            <div class="services__card-container row" data-aos="fade-up">
                                @if(!empty($doctors))
                                    @foreach($doctors as $doctor)
                                        <div class="col-12 col-md-3">
                                            <div class="doctor">
                                                <div class="doctor__image">
                                                    <img src="{{ $doctor->image }}"
                                                         alt="{{ $doctor->alt_image ?  $doctor->alt_image : ''}}" draggable="false">
                                                </div>
                                                <div class="doctor__text">
                                                    <div class="small-logo">
                                                        <img src="/web/assets/images/icons/Group 77.png" />
                                                    </div>
                                                    <h3 class="doctor-title text-line-1">
                                                        {{ $doctor->name }}
                                                    </h3>
                                                    <p class="doctor-spec text-line-1">
                                                        {{ $doctor->specificities->first()->name ?? '' }}
                                                    </p>
                                                    <div class="doctor-links">
                                                        <a href="{{ route('web.doctors.details', app()->getLocale() == 'en' ? ['slug' => $doctor->slug ,'lang' => 'en'] : ['slug' => $doctor->slug ]) }}"
                                                           class="btn btn-white">
                                                            {{ __('messages.Profile') }}
                                                        </a>
                                                        <a href="{{ url('book-an-appointment'. '/?doctor='. $doctor->id . ( app()->getLocale() != 'ar' ? ( '&lang=' . app()->getLocale()) : '')) }}"
                                                           class="btn btn-brand-primary doctor__button">
                                                            {{ __('messages.Book Now') }}
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="page-pagination">
                                {{ $doctors->appends(app()->getLocale() == 'en' ? ['q' => request()->get('q') ,'lang' => 'en'] : ['q' => request()->get('q')])->links('web.home.pagination') }}

                            </div>
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
@endsection

@section('submit.scripts')

@endsection

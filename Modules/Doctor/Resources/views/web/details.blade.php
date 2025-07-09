@extends('web.layouts.base')

@section('pageTitle')
    {{ $doctor->meta_title ? $doctor->meta_title : $doctor->name }}
@endsection

@section('languages')
<div class="top-bar__block language nav-link gap-0">
    <ul class="list-inline">
        <li class="list-inline-item large-mg">
            <a href="{{ url(app()->getLocale() != 'ar' ? route(Route::currentRouteName(), array_replace(Route::getCurrentRoute()->parameters(), ['slug' => $doctorSlug->slug])) : route(Route::currentRouteName(), array_replace(Route::getCurrentRoute()->parameters(), ['slug' => $doctorSlug->slug ,'lang' =>'en']))) }}"
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

@section('metaKeys')
   <meta name="title" content="{{  $doctor->meta_title ? $doctor->meta_title : '' }}" />
    <meta name="description" content="{{  $doctor->meta_description ? $doctor->meta_description : '' }}" />
    <meta name="keywords" content="{{  $doctor->meta_keywords  ? $doctor->meta_keywords : ''}}" />
    <link rel="canonical" href="{{ $doctor->canonical_url ? $doctor->canonical_url : '' }}" />
@endsection

@section('content')
<div class="simple-background doctor-details-page centered-overlay">

    <!-- BEGIN :: include page header -->
    @include('web.components.page_header', ['page_name' => ( $doctor->meta_title ? $doctor->meta_title : $doctor->name )])
    <!-- END :: include page header -->

    <div class="section-overlay">
        <div class="overlay-background-logo">
            <img src="/web/assets/images/icons/Path 168.svg" alt="doctor" draggable="false">
        </div>
        <div class="page-content doctor-profile d-pad pb-4">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-xl-3">
                        <div class="doctor height-auto">
                            <div class="doctor__image">
                                <img src="{{ $doctor->image ? $doctor->image : '/web/assets/images/doctors/doctor1.png' }}" alt="{{ $doctor->alt_image ?  $doctor->alt_image : ''}}" draggable="false">
                            </div>
                            <div class="doctor-timer">
                                <span class="year">
                                  {{ $doctor->years_of_experience ? $doctor->years_of_experience : '' }}
                                </span>
                                <span class="sub">{{ __('messages.Years of Experience') }}</span>
                            </div>
                        </div>
                        <div class="">
                            <nav class="doctor-nav" data-aos="fade-up">
                                <a href="#aboutDoctor" class="btn btn-white btn-tab">
                                  {{ __('messages.About the Doctor') }}
                                </a>
                                <a href="#journey" class="btn btn-white btn-tab">
                                  {{ __('messages.professional journey') }}
                                </a>
                                <?php if($doctor->canonical_url!=null){?>
                                <a href="#social_media" class="btn btn-white btn-tab">
                                    {{ __('messages.social info') }}
                                </a>
                                <?php } ?>
                                <a href="#services" class="btn btn-white btn-tab">
                                  {{ __('messages.Services') }}
                                </a>
                                <a href="#beforeAndAfter" class="btn btn-white btn-tab">
                                  {{ __('messages.Cases before and after') }}
                                </a>
                            </nav>
                        </div>
                    </div>
                    <div class="col-lg-8 col-xl-9 mt-md-0 mt-5">
                        <div class="doctor-details">
                            <div class="row">
                                <div class="col-12 col-md-8">
                                    <div class="doctor-details__block mb-4" data-aos="fade-up">
                                        <div class="d-flex flex-column align-items-start">
                                            <h2 class="title about__title">
                                              {{ $doctor->name ? $doctor->name : '' }}
                                            </h2>
                                            <div class="title-info">
                                            {{ implode(' - ' , $doctor->specificities->pluck('name')->toArray()) }}
                                            </div>
                                        </div>
                                    </div>
                                    <div id="aboutDoctor" class="page-content mb-4">
                                        <div class="about__text">
                                            <h3 class="h5" data-aos="fade-up" data-aos-delay="100">
                                            {{ __('messages.About the Doctor') }}
                                            </h3>
                                            <div class="sub-desc" data-aos="fade-up" data-aos-delay="200">
                                            {!! $doctor->bio ? $doctor->bio : '' !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div id="journey" class="doctor-details__block journey mb-4" data-aos="fade-up">
                                        <h3 class="h5 mb-3">
                                           {{ __('messages.professional journey') }}
                                        </h3>
                                        <div class="section-bg d-flex flex-wrap" data-aos="fade-up" data-aos-delay="100">
                                            <div class="w-100">
                                            {!! $doctor->description ? $doctor->description : '' !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php if($doctor->canonical_url!=null){ ?>
                            <div id="social_media" class="page-content mb-4">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-12 about__text">
                                            <h3 class="h5" data-aos="fade-up" data-aos-delay="100">
                                                {{ __('messages.social info') }}
                                            </h3>
                                            <a href="{{$doctor->canonical_url}}" target="_blank" class="title">
                                                <img src="/web/assets/images/icons/instagram-gold-icon.png" width="40" draggable="false" alt="alt">
                                           </a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <?php  } ?>
                            <div id="services" class="page-content mb-4">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-12 about__text">
                                            <h3 class="h5" data-aos="fade-up" data-aos-delay="100">
                                            {{ __('messages.Services') }}
                                            </h3>
                                        </div>
                                        @if(!empty($specificitiesDr))
                                            @foreach($specificitiesDr as $specificit)
                                            <div class="col-md-6 col-lg-4 col-xl-4">
                                                <a href="{{ url('book-an-appointment'. '/?doctor='. $doctor->id . '&speciality='. $specificit->id . ( app()->getLocale() != 'ar' ? ( '&lang=' . app()->getLocale()) : '')) }}" class="service-card mb-3">
                                                    <div class="service-card__image">
                                                        <img src="{{ $specificit->image ? $specificit->image : '' }}" alt="service" draggable="false">
                                                    </div>
                                                    <div class="service-card__text">
                                                        <div class="small-logo">
                                                            <img src="/web/assets/images/icons/Group 77.png" />
                                                        </div>
                                                        <h3 class="service-title text-line-1 mt-1">
                                                        {{ $specificit->name ? $specificit->name : '' }}
                                                        </h3>
                                                        <div>
                                                            <button class="btn btn-brand-primary w-auto mt-2">{{ __('messages.Book Now') }}</button>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            @endforeach
                                        @endif
                                        <div class="col-lg-12">
                                            <div class="page-pagination">
                                               {{ $specificitiesDr->appends(app()->getLocale() == 'en' ? ['lang' => 'en'] : '')->links('web.home.pagination') }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if(count($casing) > 0)
                            <div id="beforeAndAfter" class="page-content mb-4 doctor-details__block journey" data-aos="fade-up">
                                <div class="about__text mb-50">
                                    <h5 class="h5" data-aos="fade-up" data-aos-delay="100">
                                      {{ __('messages.Cases before and after') }}
                                    </h5>
                                </div>
                                <div class="cases">
                                 @foreach($casing as $cas)
                                    <div class="case" data-aos="fade-up">
                                        <div class="case__images twentytwenty-container">
                                            <img src="{{ $cas->image_before }}" draggable="false" loading="lazy" alt="before">
                                            <img src="{{ $cas->image_after }}" draggable="false" loading="lazy" alt="after">
                                        </div>
                                        <div class="case__text case__text d-flex justify-content-between mt- color-text-secondary">
                                            <div class="d-flex align-items-center">
                                                <img class="case__doctor-img" src="{{ $cas->doctor->image }}" alt="{{ $cas->doctor->alt_image ?? '' }}" draggable="false">
                                                <h3 class="doctor-name">
                                                {{ $cas->doctor->name }}
                                                </h3>
                                            </div>
                                            <div class="small-logo">
                                                <img src="/web/assets/images/icons/Group 77.svg" />
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach

                                    <div class="w-100">
                                        <div class="page-pagination">
                                            {{ $casing->appends(app()->getLocale() == 'en' ? ['lang' => 'en'] : '')->links('web.home.pagination') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- BEGIN :: include book now section -->
        @include('web.components.book_now')
        <!-- END :: include book now section -->
    </div>

    <!-- BEGIN :: include articles section -->
    @include('web.components.articles')
    <!-- END :: include articles section -->
</div>
@endsection

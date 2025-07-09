@extends('web.layouts.base')

@section('pageTitle')
{{ (app()->getLocale() == 'ar') ? 'نتائج البحث عن' : 'Search Results for'}}
@if(!empty($request->keyword))({{ $request->keyword }}) @endif
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
<!-- page header -->
<div class="simple-background search-results-page">
    <div class="slider sub">
        <div class="swiper mainSlider">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="slider__slide">
                        <div class="slider__image">
                            <img src="{{ asset('web/assets/images/slider-sub.png') }}" draggable="false" alt="alt">
                        </div>
                        <div class="slider__text">
                            <div class="container">
                                <h1 class="font-weight-bold" data-aos="fade-up">{{ (app()->getLocale() == 'ar') ? 'نتائج البحث عن' : 'Search Results for'}} @if(!empty($request->keyword))({{ $request->keyword }}) @endif</h1>
                                <div class="breadcrumb">
                                    <ul vocab="https://schema.org/" typeof="BreadcrumbList">
                                        <li property="itemListElement" typeof="ListItem" class="first">
                                            <a href="{{ url('/') }}" property="item" typeof="WebPage">
                                                <span property="name">@lang('messages.Home')</span>
                                            </a>
                                        </li>

                                        <li class="active last">
                                            <span>{{ (app()->getLocale() == 'ar') ? 'نتائج البحث عن' : 'Search Results for'}} @if(!empty($request->keyword))({{ $request->keyword }}) @endif</span>
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
    <div class="section-overlay">
        </section>
        <div class="overlay-background-logo">
            <img src="/web/assets/images/icons/Path 168.svg" alt="doctor" draggable="false">
        </div>
        <section class="d-pad pb-0">
            <div class="container position-relative">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="section-title flex-column align-items-start mb-0">
                            <h2 class="title" data-aos="fade-up">
                            {{ (app()->getLocale() == 'ar') ? 'نتائج البحث عن' : 'Search Results for'}}
                                <span class="primary-color">@if(!empty($request->keyword))({{ $request->keyword }}) @endif</span>
                            </h2>
                        </div>
                    </div>
                    @if(count($services) > 0)
                        <div class="col-12 mt-4">
                            <h2 class="title" data-aos="fade-up">
                            {{ (app()->getLocale() == 'ar') ? 'في الخدمات' : 'In Services'}}<small class="primary-color"> {{ $services->count() }} {{ (app()->getLocale() == 'ar') ? ' نتيجة بحث' : 'search result'}}</small>
                            </h2>
                            <div class="services__card-container row" data-aos="fade-up">
                                @if(!empty($services))
                                    @foreach($services as $serv)
                                    <div class="col-12 col-md-4">
                                        <a href="#">
                                            <div class="article">
                                                <div class="small-logo">
                                                    <img src="/web/assets/images/icons/Group 77.svg" />
                                                </div>
                                                <div class="article__main-container">
                                                    <div class="article__image">
                                                        <img src="{{ $serv->image }}" alt="article"
                                                            draggable="false">
                                                    </div>
                                                    <div class="article__user">
                                                        <div class="title-info">
                                                          {{ $serv->service->name }}
                                                        </div>
                                                        <h3 class="h6 desc">
                                                          {{ $serv->name }}
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="page-pagination">
                               {{ $services->appends(app()->getLocale() == 'en' ? ['keyword' => request()->get('keyword') ,'lang' => 'en'] : ['keyword' => request()->get('keyword')])->links('web.home.pagination') }}
                            </div>
                        </div>
                    @endif
                    @if(count($doctors) > 0)
                        <div class="col-12 mt-4">
                            <h2 class="title" data-aos="fade-up">
                            {{ (app()->getLocale() == 'ar') ? 'في الأطباء' : 'In Doctors'}}<small class="primary-color"> {{ $doctors->count() }} {{ (app()->getLocale() == 'ar') ? ' نتيجة بحث' : 'search result'}}</small>
                            </h2>
                            <div class="services__card-container row" data-aos="fade-up">
                                @if(!empty($doctors))
                                    @foreach($doctors as $dr)
                                    <div class="col-12 col-md-4">
                                        <a href="{{ route('web.doctors.details', app()->getLocale() == 'en' ? ['slug' => $dr->slug ,'lang' => 'en'] : ['slug' => $dr->slug ]) }}">
                                            <div class="article">
                                                <div class="small-logo">
                                                    <img src="/web/assets/images/icons/Group 77.svg" />
                                                </div>
                                                <div class="article__main-container">
                                                    <div class="article__image">
                                                        <img src="{{ $dr->image }}" alt="article"
                                                            draggable="false">
                                                    </div>
                                                    <div class="article__user">
                                                        <div class="title-info">
                                                          {{ $dr->specificities->first()->name ?? '' }}
                                                        </div>
                                                        <h3 class="h6 desc">
                                                          {{ $dr->name }}
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="page-pagination">
                               {{ $doctors->appends(app()->getLocale() == 'en' ? ['keyword' => request()->get('keyword') ,'lang' => 'en'] : ['keyword' => request()->get('keyword')])->links('web.home.pagination') }}
                            </div>
                        </div>
                    @endif
                    @if(count($articles) > 0)
                        <div class="col-12 mt-4">
                            <h2 class="title" data-aos="fade-up">
                            {{ (app()->getLocale() == 'ar') ? 'في المقالات' : 'In Articles'}}<small class="primary-color"> {{ $articles->count() }} {{ (app()->getLocale() == 'ar') ? ' نتيجة بحث' : 'search result'}}</small>
                            </h2>
                            <div class="services__card-container row" data-aos="fade-up">
                                @if(!empty($articles))
                                    @foreach($articles as $article)
                                    <div class="col-12 col-md-4">
                                        <a href="{{ url($article->slug) . ( app()->getLocale() != 'ar' ? '?lang=en' : '' ) }}">
                                            <div class="article">
                                                <div class="small-logo">
                                                    <img src="/web/assets/images/icons/Group 77.svg" />
                                                </div>
                                                <div class="article__main-container">
                                                    <div class="article__image">
                                                        <img src="{{ $article->image }}" alt="article"
                                                            draggable="false">
                                                    </div>
                                                    <div class="article__user">
                                                        <div class="title-info">
                                                          {{ $article->category->name }}
                                                        </div>
                                                        <h3 class="h6 desc">
                                                        {{ $article->name }}
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="page-pagination">
                               {{ $articles->appends(app()->getLocale() == 'en' ? ['keyword' => request()->get('keyword') ,'lang' => 'en'] : ['keyword' => request()->get('keyword')])->links('web.home.pagination') }}
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </section>
        <section class="container-wrapper book-now-container">
            <div class="w-100 book-now m-0">
                <div class="container book-now__elms">
                    <div class="book-now__wrapper">
                        <div class="w-100">
                            <h2 class="h3" data-aos="fade-up">
                                {{ (app()->getLocale() == 'ar') ? 'سعادتك تتوقف على ضغطة زر، إحجز موعدك الآن، وإستمتع بتجربة علاج فريدة من نوعها' : 'Your happiness depends on the click of a button, book your appointment now, and enjoy a unique treatment experience'}}
                            </h2>
                        </div>
                        <div class="w-100 mt-4">
                            <a href="{{ url('book-an-appointment' . ( app()->getLocale() != 'ar' ? ( '/?lang=' . app()->getLocale() ) : '')) }}"
                                class="btn btn-white" data-aos="fade-up">
                                {{ (app()->getLocale() == 'ar') ? 'إحجز موعدك الأن' : 'Book Now'}}
                            </a>
                        </div>
                    </div>
                    <div class="book-now__img-wrapper">
                        <image src="/web/assets/images/book-now.png" width="100%" />
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

@endsection

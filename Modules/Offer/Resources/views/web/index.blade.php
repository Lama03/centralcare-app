@extends('web.layouts.base')

@section('pageTitle'){{ $settings['metatitle_offer_page_seo'][app()->getLocale()] ?? __('messages.Offers') }}@endsection

@section('metaKeys')
{!! $settings['offers_page_seo'][app()->getLocale()] ?? '' !!}
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
<div class="offers-page simple-background">

    <!-- BEGIN :: include page header section -->
    @include('web.components.page_header', ['page_name' => ( $settings['metatitle_offer_page_seo'][app()->getLocale()] ?? __('messages.Offers') )])
    <!-- END :: include page header section -->

    <div class="section-overlay">
        <div class="overlay-background-logo">
            <img src="/web/assets/images/icons/Path 168.svg" alt="doctor" draggable="false">
        </div>
        <section class="d-pad">
            <div class="container position-relative">
                <div class="row">
                    <div class="offer-title-container mb-4">
                        <!-- 
                        <div class="offer-image-container">
                            <img src="/web/assets/images/icons/Group 1389.png" />
                        </div>
                        -->
                        <div class="col-12 col-md-9">
                            <div class="section-title flex-column align-items-start mb-0">
                                <h2 class="title mt-2 mb-3" data-aos="fade-up">{{ $settings['metatitle_offer_page_seo'][app()->getLocale()] ?? __('messages.Offers') }}</h2>
                                <div class="sub-desc">{{ $settings['page_offer_content'][app()->getLocale()] ?? '' }}</div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="search-block aos-init aos-animate" data-aos="fade-up">
                            <form class="form-elm" method="GET" action="{{ route('web.offers.index', app()->getLocale() == 'en' ? ['lang' => 'en' ] : '') }}">
                                    <div class="form-group">
                                        <input type="search" name="keyword" class="form-control white-input search-input"
                                            value="" placeholder="@if (request()->has('keyword')) {{ request()->get('keyword') }} @else {{ __('messages.Are you looking') }} @endif">
                                            @if(app()->getLocale() == 'en')
                                                <input type="hidden" name="lang" value="en" />
                                            @endif

                                        <button class="btn btn-search btn-brand-primary">
                                            <img class="icon" src="/web/assets/images/icons/Icon feather-search.svg"
                                                alt="search" draggable="false">
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="services__card-container row" data-aos="fade-up">
                        @if(!empty($Alloffers))
                            @foreach($Alloffers as $offer)
                            <div class="col-12 col-md-3">
                                <div class="service-card">
                                    <div class="service-card__image">
                                        <img src="{{ $offer->image ? $offer->image : '' }}" alt="service" draggable="false">
                                    </div>
                                    <div class="service-card__text">
                                        <p class="service-title text-line-1 m-0">
                                           {{ $offer->name ? $offer->name : '' }}
                                        </p>
                                        <span class="price">
                                        {{ $offer->price ? $offer->price : '0' }}
                                            <small class="small-info-label currency">
                                            {{ (app()->getLocale() == 'ar') ? 'ريال سعودي' : 'SAR'}}
                                            </small>
                                        </span>
                                        <a href="{{ route('web.offers.book', app()->getLocale() == 'en' ? ['id' => $offer->id ,'lang' => 'en'] : ['id' => $offer->id]) }}"  class="btn btn-brand-primary w-auto">{{ (app()->getLocale() == 'ar') ? 'إحجز العرض الآن' : 'Book Offer Now'}}</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @endif
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="page-pagination">
                           {{ $Alloffers->appends(app()->getLocale() == 'en' ? ['keyword' => request()->get('keyword') ,'lang' => 'en'] : ['keyword' => request()->get('keyword')])->links('web.home.pagination') }}

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection

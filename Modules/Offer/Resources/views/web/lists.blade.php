@extends('web.layouts.base')

@section('styles')
    <link rel="stylesheet preload" href="/web/assets2/css/offers{{ (app()->getLocale() == 'ar') ? '-rtl' : ''}}.min.css" as="style" crossorigin>
@endsection

@section('pageTitle')
@if(!empty(settings()->get('metatitle.offer-list')))
{{ settings()->get('metatitle.offer-list') }}
@else
{{ __('messages.Latest Offers') }} | {{ $offers->name }}
@endif
@endsection

@section('metaKeys')
    {!! settings()->get('offer-list.ceo') !!}
@endsection

@section('slug')
    @if(app()->getLocale() == 'ar')
        <li class="list-inline-item d-none d-xl-inline-block">
            <a href="{{ route(Route::currentRouteName(), array_replace(Route::getCurrentRoute()->parameters(), ['slug' => $offerSlug->slug , 'lang' =>'en'])) }}" class="lang">
                English
            </a>
        </li>
    @else
        <li class="list-inline-item d-none d-xl-inline-block">
            <a href="{{ route(Route::currentRouteName(), array_replace(Route::getCurrentRoute()->parameters(), ['slug' => $offerSlug->slug])) }}" class="lang">
                عربي
            </a>
        </li>
    @endif
@endsection

@section('lang-mobile')
    @if(app()->getLocale() == 'ar')
        <a href="{{ route(Route::currentRouteName(), array_replace(Route::getCurrentRoute()->parameters(), ['slug' => $offerSlug->slug , 'lang' =>'en'])) }}" class="d-xl-none lang">English</a>
    @else
        <a href="{{ route(Route::currentRouteName(), array_replace(Route::getCurrentRoute()->parameters(), ['slug' => $offerSlug->slug])) }}" class="d-xl-none lang">عربي</a>
    @endif
@endsection

@section('content')
    <!-- page header -->
    <div class="page-header">
        <div class="container">
            <!-- image -->
            <div class="page-header__image">
                <picture>
                    <source srcset="{{ settings()->get('offer-list.imagebg.page') }}" type="image/webp" />
                    <img src="{{ settings()->get('offer-list.imagebg.page') }}" draggable="false" alt="page image" data-aos="zoom-out" />

                </picture>
            </div>
            <!-- // image -->
            <!-- title -->
            <h2 class="h3" data-aos="fade-up" data-aos-delay="100">{{ settings()->get('titlesheader.offer-list.page') }} {{ $offers->name ? $offers->name : '' }}</h2>
            <!-- title -->
        </div>
    </div>
    <!-- // page header -->


    <!-- offers list -->
    <section class="offers-list d-pad">
        <div class="container">
            <!-- title -->
            <div class="section-title">
                <h2 class="title" data-aos="fade-up">
                    {{ (app()->getLocale() == 'ar') ? 'فرع' : 'Branche'}} <span class="color">{{ $offers->name ? $offers->name : '' }}</span>
                </h2>
            </div>
            <!-- // title -->
            <div class="row">
                <!-- filters -->
                <div class="col-lg-4 col-xl-3">
                    <div class="filters">
                        <!-- filter -->
                        <div class="filters__bg" data-aos="fade-up">
                            <!-- image -->
                            <div class="filters__bg-image">
                                <picture>

                                    <source srcset="{{ $offers->image ? $offers->image : '' }}" type="image/webp" />
                                    <img src="{{ $offers->image ? $offers->image : '' }}" draggable="false" loading="lazy" alt="alt" />

                                </picture>
                            </div>
                            <!-- // image -->
                            <div class="filter__btns">
                                <div class="nav flex-column nav-pills">
                                    <input type="hidden" id="GetLocale" name="locale" class="form-control" value=" {{ app()->getLocale() == 'en' ? 'en' : '' }}">
                                    <a href="#all" onClick="AllOffers()" class="btn btn-white {{ $request->services == null ? 'active' : '' }}">{{ (app()->getLocale() == 'ar') ? 'كل العروض' : 'All Offers'}}</a>
                                    @if(!empty($servicesbar))
                                        @foreach($servicesbar as $service)
                                            <a href="#{{ $service->name }}" onClick="showOffersByServices({{$service->id}})" class="btn btn-white {{ $request->services == $service->id ? 'active' : '' }}">
                                                {{ (app()->getLocale() == 'ar') ? 'عروض' : 'Offers'}} {{ $service->name }}
                                            </a>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- // filter -->
                    </div>
                </div>
                <!-- // filters -->
                <!-- offers list -->
                <div class="col-lg-8 col-xl-9">
                    <div class="offers-list__container">
                        <!-- offer list -->
                        @if(!empty($Alloffers))
                            @foreach($Alloffers as $offer)
                                <div class="offer-list" data-aos="fade-up">
                                    <!-- image -->
                                    <a href="{{ route('web.offers.book', app()->getLocale() == 'en' ? ['id' => $offer->id ,'lang' => 'en'] : ['id' => $offer->id]) }}" class="offer-list__image">
                                        <picture>
                                            <source srcset="{{ $offer->image ? $offer->image : '' }}" type="image/webp"><img src="{{ $offer->image ? $offer->image : '' }}"
                                                                                                                             draggable="false" loading="lazy" alt="alt">
                                        </picture>
                                    </a>
                                    <!-- // image -->
                                    <!-- info -->
                                    <div class="offer-list__info">
                                        <div class="offer-list__title">
                                            <h3 class="h6">
                                                <a href="{{ route('web.offers.book', app()->getLocale() == 'en' ? ['id' => $offer->id ,'lang' => 'en'] : ['id' => $offer->id]) }}">
                                                    {{ $offer->name ? $offer->name : '' }}
                                                </a>
                                            </h3>
                                            <span class="h5 color">
                                        {{ $offer->price ? $offer->price : '0' }} <small>{{ $offers->currency ? $offers->currency : '' }}</small>
                                        </span>
                                        </div>
                                        <div class="offer-list__btn">
                                            <a href="{{ route('web.offers.book', app()->getLocale() == 'en' ? ['id' => $offer->id ,'lang' => 'en'] : ['id' => $offer->id]) }}" class="btn btn-brand-primary">
                                                {{ __('messages.Book This Offer') }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                        @endforeach
                    @endif
                    <!-- // offer list -->
                    </div>
                </div>
                <!-- // offers list -->
            </div>
        </div>
    </section>
    <!-- // offers list -->
@endsection
@section('submit.scripts')
    <script type="text/javascript">

        function showOffersByServices(idservice) {
            @if(app()->getLocale() == 'en')
                window.location.href = route('web.offers.lists', {'slug' : '{{ $offers->slug }}' , 'services' : idservice ,'lang': '{{ app()->getLocale() }}'}) ;
            @else
                window.location.href = route('web.offers.lists', {'slug' : '{{ $offers->slug }}' , 'services' : idservice}) ;
            @endif
        }

        function AllOffers() {
            @if(app()->getLocale() == 'en')
                window.location.href = route('web.offers.lists', {'slug' : '{{ $offers->slug }}' ,'lang': '{{ app()->getLocale() }}'}) ;
            @else
                window.location.href = route('web.offers.lists', {'slug' : '{{ $offers->slug }}'}) ;
            @endif
        }
    </script>
@endsection

@extends('web.layouts.base')

@section('pageTitle', __('messages.devices_and_technology'))

@section('metaKeys')
     {!! settings()->get('doctors.ceo') !!}
@endsection

@section('languages')
    <div class="top-bar__block language nav-link gap-0">
        <ul class="list-inline">
            <li class="list-inline-item large-mg">
                <a href="{{ url(app()->getLocale() != 'ar' ? 'list/devices' : 'list/devices?lang=en') }}" class="top-bar__side">
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
    <div class="simple-background devices-page blog-details-page centered-overlay">
        @include('web.components.page_header', ['page_name' => __('messages.devices_and_technology')])

        <div class="section-overlay">
            <div class="overlay-background-logo">
                <img src="{{ asset('web/assets/images/icons/Path 168.svg') }}" alt="doctor" draggable="false">
            </div>
            <section class="about-card d-pad pb-0 my-0">
                <div class="container position-relative">
                    <div class="row">
                        <div class="col-12 col-md-7">
                            <div class="section-title align-items-stretch flex-column mb-0">
                                <h2 class="title" data-aos="fade-up">@lang('messages.best_medical_technology_and_devices')</h2>
                                <div class="sub-desc mt-4">{{ $settings['devices_content'][app()->getLocale()] }}</div>
                            </div>
                        </div>
                        <div class="col-12 position-relative">
                            @foreach($devices as $key => $device)
                                <div class="device-card-wrapper {{ $key % 2 == 0 ? 'reverse' : '' }}">
                                    <div class="row device-card-container">
                                        <div class="col-md-6 col-12 text-container">
                                            <div class="section-title align-items-stretch flex-column mb-0">
                                                <h2 class="title mb-3" data-aos="fade-up">
                                                    {{ $device->name }}
                                                </h2>
                                                <div class="title-info mb-2">@lang('messages.about_the_device')</div>
                                                <div class="sub-desc">{{ $device->description }}</div>
                                                <div class="title-info mb-2">@lang('messages.about_the_device')</div>
                                                <div class="device-info-list">
                                                    <ul class="list-unstyled wrapped-list">{!! $device->features !!}</ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12 image-container">
                                            <div class="overlay-background-color"></div>
                                            <div class="about-card__img-wrapper justify-content-center img-lg-container">
                                                <image class="img-lg" src="{{ $device->image }}" width="100%" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="col-lg-12">
                            <div class="page-pagination">
                                {{ $devices->appends(app()->getLocale() == 'en' ? ['lang' => 'en'] : '')->links('web.home.pagination') }}
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            @include('web.components.book_now')
        </div>

        @include('web.components.articles')
    </div>
@endsection

@section('submit.scripts')

@endsection

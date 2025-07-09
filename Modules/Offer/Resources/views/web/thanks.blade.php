@extends('web.layouts.base')

@section('pageTitle')
    {{ (app()->getLocale() == 'ar') ? 'تم الحجز بنجاح' : 'Booked successfully'}}
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
    <div class="simple-background blog-details-page centered-overlay">

        <!-- BEGIN :: include page header section -->
        @include('web.components.page_header', ['page_name' => __('messages.Booked Successfully')])
        <!-- END :: include page header section -->


        <div class="section-overlay d-pad pb-0">
            <div class="overlay-background-logo">
                <img src="/web/assets/images/icons/Path 168.svg" alt="doctor" draggable="false">
            </div>
            <section class="about-card d-pad my-0">
                <div class="container position-relative">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-title d-block text-center mb-0">
                                <h2 class="title mt-2 mb-4" data-aos="fade-up">
                                    {{ (app()->getLocale() == 'ar') ? 'تم استلام طلبك وسيتم التواصل معك خلال 24 ساعة من قبل ممثل خدمة العملاء' : 'Your request has been received and you will be contacted within 24 hours by a customer service representative'}}
                                </h2>
                                <a href="{{ route('web.home.index', app()->getLocale() == 'en' ? ['lang' => 'en'] : '') }}" class="btn btn-brand-primary w-auto" data-aos="fade-up">
                                    {{ (app()->getLocale() == 'ar') ? 'العودة للرئيسية' : 'Back To Home'}}
                                </a>
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
@endsection

@extends('web.layouts.base')

@section('pageTitle', __('messages.privacy_policy'))

@section('languages')
    <div class="top-bar__block language nav-link gap-0">
        <ul class="list-inline">
            <li class="list-inline-item large-mg">
                <a href="{{ url(app()->getLocale() != 'ar' ? 'page/privacy-policy' : 'page/privacy-policy?lang=en') }}" class="top-bar__side">
                    <div class="top-bar__text d-lg-inline-block">
                        {{ app()->getLocale() != 'ar' ? __('messages.ar') : __('messages.en') }}
                    </div>
                    <div class="top-bar__icon">
                        <img class="icon" src="{{ asset('web/assets/images/icons/Icon metro-language.svg') }}?v=<?php echo time(); ?>" draggable="false" alt="alt">
                    </div>
                </a>
            </li>
        </ul>
    </div>
@stop

@section('content')
    <div class="simple-background blog-details-page centered-overlay">
        <!-- BEGIN :: include page header -->
        @include('web.components.page_header', ['page_name' => __('messages.privacy_policy')])
        <!-- END :: include page header -->

        <div class="section-overlay"></section>
            <div class="overlay-background-logo">
                <img src="{{ asset('web/assets/images/icons/Path 168.svg') }}" alt="doctor" draggable="false">
            </div>
            <section class="about-card d-pad pb-0 my-0">
                <div class="container position-relative">
                    <div class="row">
                        
                        <div class="col-12 col-md-12 text-container">
                            <div class="section-title align-items-stretch flex-column mb-0">
                                <h4 class="title title-privacy mt-4" data-aos="fade-up">@lang('messages.privacy_policy_title1')</h4>
                                <p class="sub-desc mt-2">
                                @lang('messages.privacy_policy_title1_content')
                                </p>

                                <p class="sub-desc mt-2">
                                @lang('messages.privacy_policy_title1_content2')
                                </p>

                                <h4 class="title title-privacy mt-4" data-aos="fade-up">@lang('messages.privacy_policy_title2')</h4>
                                <p class="sub-desc mt-2">
                                @lang('messages.privacy_policy_title2_content')
                                </p>

                                <p class="sub-desc mt-2">
                                @lang('messages.privacy_policy_title2_content2')
                                </p>
                                


                                <h4 class="title title-privacy mt-4" data-aos="fade-up">@lang('messages.privacy_policy_title3')</h4>
                                <p class="sub-desc mt-2">
                                @lang('messages.privacy_policy_title3_content')
                                </p>

                                <p class="sub-desc mt-2">
                                @lang('messages.privacy_policy_title3_content2')
                                </p>

                                <h4 class="title title-privacy mt-4" data-aos="fade-up">@lang('messages.privacy_policy_title4')</h4>
                                <p class="sub-desc mt-2">
                                @lang('messages.privacy_policy_title4_content')
                                </p>
                                

                                <h4 class="title title-privacy mt-4" data-aos="fade-up">@lang('messages.privacy_policy_title5')</h4>
                                <p class="sub-desc mt-2">
                                @lang('messages.privacy_policy_title5_content')
                                </p>

                            </div>
                        </div>

                    </div>
                </div>
            </section>

        </div>
    </div>
@stop

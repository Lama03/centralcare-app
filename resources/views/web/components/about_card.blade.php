<section class="about-card d-pad">
    <div class="container position-relative">
        <div class="row">
            <div class="col-12 col-md-6 text-container">
                <div class="section-title align-items-stretch flex-column mb-0">
                    <h2 class="title" data-aos="fade-up">@lang('messages.we_at_central_care_clinics_consider_ourselves')</h2>
                    <h2 class="primary-color" data-aos="fade-up">{{ $settings['about_us_title'][app()->getLocale()] ?? '' }}</h2>
                    <div class="sub-desc">{{ $content ?? '' }}</div>
                    @if($isSomeCondition == true)
                        <div>
                            <a href="{{ url('about-us' . ( app()->getLocale() != 'ar' ? ( '/?lang=' . app()->getLocale() ) : '')) }}" class="btn-link">
                                @lang('messages.get_to_know_us')
                            </a>
                        </div>
                    @endif
                </div>
                @if($isSomeCondition == true)
                    <div class="about-card__img-wrapper mt-5">
                        <image class="sub" src="{{ asset('web/assets/images/aboutCard-1.png') }}" width="100%" />
                        <image class="main" src="{{ asset('web/assets/images/aboutCard-2.png') }}" width="100%" />
                        <image class="sub" src="{{ asset('web/assets/images/aboutCard-3.png') }}" width="100%" />
                    </div>
                @endif
            </div>
            <div class="col-12 col-md-6 image-container">
                <div class="about-card__img-wrapper img-lg-container">
                    <image class="img-lg" src="{{ asset('web/assets/images/doctors/about-photo.jpg') }}" width="100%" />
                    <div class="overlay-background-color w-100"></div>
                </div>
            </div>
        </div>
    </div>
</section>

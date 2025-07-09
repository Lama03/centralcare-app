<section class="doctors d-pad">
    <div class="container position-relative">
        <div class="section-title align-items-stretch mb-0">
            <h2 class="title" data-aos="fade-up">@lang('messages.Doctors')</h2>
            <div>
                <a href="{{ route('web.doctors.index', app()->getLocale() == 'en' ? ['lang' => 'en'] : '') }}" class="btn-link">
                    @lang('messages.view_all')
                </a>
            </div>
        </div>
        <div class="section-title align-items-stretch mb-0">
            <div class="col-md-5 col-12 sub-desc">{{ $settings['doctor_content'][app()->getLocale()] ?? '' }}</div>
        </div>
        <div class="services__tabs" data-aos="fade-up">
            <div class="tab-content" id="doctorsTabContent">
                <div class="tab-pane fade show active" role="tabpanel" aria-labelledby="dental-tab">
                    <div class="swiper doctorsSlider">
                        <div class="swiper-wrapper">
                            @foreach($doctors as $doctor)
                                <div class="swiper-slide">
                                    <div class="doctor">
                                        <div class="doctor__image">
                                            <img src="{{ $doctor->image }}" alt="doctor" draggable="false">
                                        </div>
                                        <div class="doctor__text">
                                            <div class="small-logo">
                                                <img src="{{ asset('web/assets/images/icons/Group 77.png') }}" />
                                            </div>
                                            <h3 class="doctor-title text-line-1">{{ $doctor->name }}</h3>
                                            <p class="doctor-spec text-line-1">{{ $doctor->service->name }}</p>
                                            <div class="doctor-links">
                                                <a href="{{ route('web.doctors.details', app()->getLocale() == 'en' ? ['slug' => $doctor->slug ,'lang' => 'en'] : ['slug' => $doctor->slug]) }}" class="btn btn-white">
                                                    @lang('messages.Profile')
                                                </a>

                                                <a href="{{ url('book-an-appointment'. '/?doctor='. $doctor->id . ( app()->getLocale() != 'ar' ? ( '&lang=' . app()->getLocale()) : '')) }}" class="btn btn-brand-primary doctor__button">
                                                    @lang('messages.Book Now')
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="section-pagination">
                            <div class="doctors-pagination"></div>
                        </div>
                        <div class="slider-controls">
                            <div class="swiper-button-next doctors-next"></div>
                            <div class="swiper-button-prev doctors-prev"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

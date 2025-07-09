<section class="reviews d-pad">
    <div class="container position-relative">
        <div class="section-title align-items-stretch mb-0">
            <h2 class="title" data-aos="fade-up">@lang('messages.our_customers_opinions')</h2>
            <div>
                <!-- <a href="#" class="btn-link">
                    @lang('messages.view_all')
                </a> -->
            </div>
        </div>
        <div class="section-title align-items-stretch mb-0">
            <div class="col-md-5 col-12 sub-desc">{{ $settings['review_content'][app()->getLocale()] ?? '' }}</div>
            <div class="slider-controls relative-slider-controls">
                <div class="swiper-button-next reviews-next"></div>
                <div class="swiper-button-prev reviews-prev"></div>
            </div>
        </div>
        <div class="services__tabs" data-aos="fade-up">
            <div class="reviews__slider" data-aos="fade-up">
                <div class="swiper reviewsSlider">
                    <div class="swiper-wrapper">
                        @foreach($testimonials as $testimonial)
                            <div class="swiper-slide">
                                <div class="testimonial d-flex align-items-center justify-content-center flex-column text-center">
                                    <div class="w-100 d-flex justify-content-between testimonial-container">
                                        <p class="testimonial-text-container">
                                            <span>{{ $testimonial->description }}</span>
                                        </p>
                                    </div>
                                    <div class="w-100 d-flex justify-content-between testimonial-container">
                                        <div class="testimonial-user-container">
                                            <img src="{{ $testimonial->image ? $testimonial->image : asset('web/assets/images/doctors/doctor1.png') }}?v=<?php echo time(); ?>" alt="star" draggable="false">
                                            <h6 class="name">
                                                {{ $testimonial->name }}
                                            </h6>
                                        </div>
                                        <ul class="list-inline rate">
                                            <li class="list-inline-item">
                                                <img src="{{ asset('web/assets/images/icons/star2.svg') }}" alt="star" draggable="false">
                                            </li>
                                            <li class="list-inline-item">
                                                <img src="{{ asset('web/assets/images/icons/star2.svg') }}" alt="star" draggable="false">
                                            </li>
                                            <li class="list-inline-item">
                                                <img src="{{ asset('web/assets/images/icons/star2.svg') }}" alt="star" draggable="false">
                                            </li>
                                            <li class="list-inline-item">
                                                <img src="{{ asset('web/assets/images/icons/star2.svg') }}" alt="star" draggable="false">
                                            </li>
                                            <li class="list-inline-item">
                                                <img src="{{ asset('web/assets/images/icons/star2.svg') }}" alt="star" draggable="false">
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="section-pagination">
                        <div class="reviews-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

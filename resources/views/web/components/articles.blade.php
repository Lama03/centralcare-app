<div class="section-overlay"></section>
    <div class="overlay-background-logo">
        <img src="{{ asset('web/assets/images/icons/Path 168.svg') }}" alt="doctor" draggable="false">
    </div>
    <section class="blogs d-pad">
        <div class="container position-relative">
            <div class="section-title align-items-stretch mb-0">
                <h2 class="title" data-aos="fade-up">@lang('messages.medical_articles')</h2>
                <div>
                    <a href="{{ url('blogs' . ( app()->getLocale() != 'ar' ? ( '/?lang=' . app()->getLocale() ) : '')) }}" class="btn-link">
                        @lang('messages.view_all')
                    </a>
                </div>
            </div>
            <div class="swiper blogsSlider" data-aos="fade-up">
                <div class="swiper-wrapper">
                    @foreach ($articles as $article)
                        <div class="swiper-slide">
                            <a href="{{ $article->slug ? ( url($article->slug) . ( app()->getLocale() != 'ar' ? '?lang=en' : '' ) ) : '#!' }}">
                                <div class="article">
                                    <div class="small-logo">
                                        <img src="{{ asset('web/assets/images/icons/Group 77.svg') }}" />
                                    </div>
                                    <div class="article__main-container">
                                        <div class="article__image">
                                            <img src="{{ $article->image }}" alt="article" draggable="false">
                                        </div>
                                        <div class="article__user">
                                            <div class="title-info">@lang('messages.news')</div>
                                            <h3 class="h6 desc">{{ $article->name }}</h3>
                                            <div class="d-flex date-text">
                                                <img src="{{ asset('web/assets/images/icons/calendar.svg') }}" />
                                                <span class="small small-info mx-1">
                                                        {{ \Carbon\Carbon::parse($article->created_at)->diffForHumans() }}
                                                    </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="article__text">
                                        <p>
                                            <?php
                                            $brief = strip_tags($article->content);
                                            echo substr($brief, 0, 300) . " ...";
                                            ?>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="slider-controls">
                    <div class="swiper-button-next blogs-next"></div>
                    <div class="swiper-button-prev blogs-prev"></div>
                </div>
                <div class="section-pagination">
                    <div class="blogs-pagination"></div>
                </div>
            </div>
        </div>
    </section>
</div>

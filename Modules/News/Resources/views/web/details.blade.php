@extends('web.layouts.base')

@section('pageTitle')
    {{ $news->meta_title ? $news->meta_title : $news->name }}
@endsection

@section('metaKeys')
    <meta name="title" content="{{  $news->meta_title ? $news->meta_title : '' }}" />
    <meta name="description" content="{{  $news->meta_description ? $news->meta_description : '' }}" />
    <meta name="keywords" content="{{  $news->meta_keywords  ? $news->meta_keywords : ''}}" />
    <link rel="canonical" href="{{ $news->canonical_url ? $news->canonical_url : '' }}" />
@endsection

@section('languages')
    <div class="top-bar__block language nav-link gap-0">
        <ul class="list-inline">
            <li class="list-inline-item large-mg">
                <a href="{{ url(app()->getLocale() != 'ar' ? url('news/'. $news->translate('ar')->slug) : url('news/'. $news->translate('en')->slug) . '?lang=en' ) }}" class="top-bar__side">
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
<div class="simple-background blog-details-page">
    <!-- BEGIN :: include page header -->
    @include('web.components.page_header', ['page_name' => $news->name])
    <!-- END :: include page header -->

    <div class="section-overlay"></section>
        <div class="overlay-background-logo">
            <img src="{{ asset('web/assets/images/icons/Path 168.svg') }}" alt="doctor" draggable="false">
        </div>
        <section class="about-card d-pad my-0">
            <div class="container position-relative">
                <div class="row">
                    <div class="col-12 col-md-6 text-container">
                        <div class="section-title align-items-stretch flex-column mb-0">
                            <div class="title-info">{{ $news->category->name }}</div>
                            <h2 class="title" data-aos="fade-up">{{ $news->name }}</h2>
                            <span class="small small-info mx-1">{{ $news->created_at }}</span>
                            <div class="sub-desc mt-4">{{ $news->content }}</div>
                        </div>
                        <div class="sub-desc mt-4">{{ $news->content }}</div>
                    </div>
                    <div class="col-12 col-md-6 position-relative image-container">
                        <div class="overlay-background-color w-100">
                        </div>
                        <div class="about-card__img-wrapper img-lg-container mt-0">
                            <image class="img-lg w-100" src="{{ $news->image }}" width="100%" />
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="section-overlay"></section>
        <div class="overlay-background-logo">
            <img src="{{ asset('web/assets/images/icons/Path 168.svg') }}" alt="doctor" draggable="false">
        </div>
        <section class="blogs d-pad">
            <div class="container position-relative">
                <div class="section-title align-items-stretch mb-0">
                    <h2 class="title" data-aos="fade-up">
                        @lang('messages.you_may_also_like')
                    </h2>
                    <div>
                        <a href="{{ url('news' . ( app()->getLocale() != 'ar' ? ( '/?lang=' . app()->getLocale() ) : '')) }}" class="btn-link">
                            @lang('messages.view_all')
                        </a>
                    </div>
                </div>
                <div class="swiper blogsSlider" data-aos="fade-up">
                    <div class="swiper-wrapper">
                        @foreach($relatedNews as $relatedNew)
                            <div class="swiper-slide">
                            <a href="#">
                                <div class="article">
                                    <div class="small-logo">
                                        <img src="{{ asset('web/assets/images/icons/Group 77.svg') }}" />
                                    </div>
                                    <div class="article__main-container">
                                        <div class="article__image">
                                            <img src="{{ $relatedNew->image }}" alt="article" draggable="false">
                                        </div>
                                        <div class="article__user">
                                            <div class="title-info">{{ $relatedNew->category->name }}</div>
                                            <h3 class="h6 desc">{{ $relatedNew->name }}</h3>
                                            <div class="d-flex date-text">
                                                <img src="{{ asset('web/assets/images/icons/calendar.svg') }}" />
                                                <span class="small small-info mx-1">
                                                    {{ $relatedNew->created_at }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="article__text">
                                        <p>
                                            <?php
                                                $brief = strip_tags($relatedNew->content);
                                                echo substr($brief, 0, 300) . " ...";
                                            ?>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                    <div class="section-pagination">
                        <div class="blogs-pagination"></div>
                    </div>
                    <div class="slider-controls">
                        <div class="swiper-button-next blogs-next"></div>
                        <div class="swiper-button-prev blogs-prev"></div>
                    </div>
                </div>
            </div>
        </section>

        <!-- BEGIN :: include book now section -->
        @include('web.components.book_now')
        <!-- END :: include book now section -->
    </div>

    <!-- BEGIN :: include articles section -->
    @include('web.components.articles')
    <!-- END :: include articles section -->
</div>
@endsection

@section('submit.scripts')
    <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>
    <script type='text/javascript'>

        function validateContact(tel) {

            var xyz=document.getElementById('contactPhone').value.trim();

            var  phoneno = /^\d{10}$/;
            if((tel.value.match(phoneno)) && tel.value.length == 10 && xyz.substr(0,2)==='05' && $.isNumeric(xyz))
            {
                $(tel).removeClass('is-invalid');
                $(tel).addClass('is-valid');

            }
            else
            {
                $("#contactPhone").val('');
                $(tel).removeClass('is-valid');
                $(tel).addClass('is-invalid');

            }
        }
        $('.form').validate({
            rules: {
                commenter:"required",
                content:"required",
                phone:"required",
                email: {
                    required: true,
                    email: true
                }
            },
            messages: {
                email: "{{__('messages.mailval')}}",
                commenter: "{{__('messages.namerequired')}}",
                phone: "{{__('messages.phonerequired')}}",
                content: "{{__('messages.Add your Comment')}}",
            },
        });
    </script>
@endsection

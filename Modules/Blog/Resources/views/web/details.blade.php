@extends('web.layouts.base')

@section('pageTitle')
    {{ $article->meta_title ? $article->meta_title : $article->name }}
@endsection

@section('metaKeys')
    <meta name="title" content="{{  $article->meta_title ? $article->meta_title : '' }}" />
    <meta name="description" content="{{  $article->meta_description ? $article->meta_description : '' }}" />
    <meta name="keywords" content="{{  $article->meta_keywords  ? $article->meta_keywords : ''}}" />
    <link rel="canonical" href="{{ $article->canonical_url ? $article->canonical_url : '' }}" />
@endsection

@section('languages')
    <div class="top-bar__block language nav-link gap-0">
        <ul class="list-inline">
            <li class="list-inline-item large-mg">
                <a href="{{ url(app()->getLocale() != 'ar' ? url($article->translate('ar')->slug) : url($article->translate('en')->slug) . '?lang=en' ) }}" class="top-bar__side">
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
<div class="simple-background blog-details-page centered-overlay">

    <!-- BEGIN :: include page header section -->
    @include('web.components.page_header', ['page_name' => $article->name])
    <!-- END :: include page header section -->

    <div class="section-overlay">
        <div class="overlay-background-logo">
            <img src="/web/assets/images/icons/Path 168.svg" alt="doctor" draggable="false">
        </div>
        <section class="about-card d-pad my-0">
            <div class="container position-relative">
                <div class="row">
                    <div class="col-12 col-md-6 text-container">
                        <div class="section-title align-items-stretch flex-column mb-0">
                            <div class="title-info">
                            {{ $article->category->name }}
                            </div>
                            <h2 class="title" data-aos="fade-up">
                            {{ $article->name }}
                            </h2>
                            <span class="small small-info mx-1">
                            {{ \Carbon\Carbon::parse($article->created_at)->diffForHumans() }}
                            </span>
                            <!-- <p class="sub-desc mt-4">
                                نسعى دائماً لإرضاء عملائنا بتنمية مهارات القائمين على خدمة العملاء لنضمن لهم الرفاهية والتجربة الفريدة لتحقيق أقصى درجات الرضا عن الخدمات المقدمة.
                            </p> -->
                        </div>
                        <div class="about-card__img-wrapper mt-5">
                            <image class="" src="{{ $article->image }}" width="100%" />
                        </div>
                    </div>
                    <div class="col-12 col-md-6 position-relative image-container">
                        <div class="about-card__img-wrapper justify-content-center img-lg-container mt-0 mt-md-5">
                            <image class="img-lg" src="{{ $article->image }}" width="100%" />
                            <div class="overlay-background-color w-100">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 mt-4 order-2">
                        <h2 class="h5" data-aos="fade-up">
                        {{ $article->name }}
                        </h2>
                        {!! $article->content !!}
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="section-overlay"></section>
        <div class="overlay-background-logo">
            <img src="/web/assets/images/icons/Path 168.svg" alt="doctor" draggable="false">
        </div>
        <section class="blogs d-pad">
            <div class="container position-relative">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="section-title align-items-stretch mb-3">
                            <h2 class="title font-weight-bold" data-aos="fade-up">
                                {{ (app()->getLocale() == 'ar') ? 'أضف تعليقك' : 'Add your comment'}}
                            </h2>
                        </div>
                        <form class="form" method="POST" action="{{ route('web.advices.comment', app()->getLocale() == 'en' ? ['lang' => 'en'] : '') }}" class="article__form">
                            @csrf
                            <input type="hidden" name="blog_id" value="{{$article->id}}">
                            <input type="hidden" name="blog_slug" value="{{$article->slug}}">
                            <input type="hidden" name="lang" value="{{$app->getLocale()}}">
                            <div class="group-inputs" data-aos="fade-up">
                                <div class="form-group row d-flex align-items-center">
                                    <label for="bookName" class="col-lg-3 col-form-label">{{ __("messages.Full Name") }}</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control form-control-secondary" id="bookName" name="commenter" placeholder="{{ __("messages.Full Name") }}" required>
                                    </div>
                                </div>
                                <div class="form-group row d-flex align-items-center">
                                    <label for="bookMail" class="col-lg-3 col-form-label">{{ __("messages.Email Address") }}</label>
                                    <div class="col-lg-9">
                                        <input type="email" class="form-control form-control-secondary" name="email" placeholder="{{ __("messages.Email Address") }}" required>
                                    </div>
                                </div>
                                <div class="form-group row d-flex align-items-center">
                                    <label for="bookPhone" class="col-lg-3 col-form-label">{{ __("messages.Phone Number") }}</label>
                                    <div class="col-lg-9">
                                        <input type="tel" class="form-control form-control-secondary" onchange="validateContact(this)" maxlength="10" name="phone" placeholder="{{ __("messages.Phone Number") }} (05xxxxxxxx).">
                                        <div class="invalid-feedback">
                                        {{ (app()->getLocale() == 'ar') ? 'يجب أن يكون هذا الحقل جوالًا سعوديًا (05xxxxxxxx).' : 'This field must be saudi arabia mobile (05xxxxxxxx).'}}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row d-flex">
                                    <label for="bookMail" class="col-lg-3 col-form-label">{{ __("messages.Add your Comment") }}</label>
                                    <div class="col-lg-9">
                                        <textarea type="text" class="form-control form-control-secondary" name="content" placeholder="{{ __("messages.Add your Comment") }}.." required></textarea>
                                    </div>
                                </div>
                                <div class="form-group row d-flex align-items-center justify-content-center mt-4">
                                    <button type="submit" class="btn btn-brand-primary w-auto">{{ __("messages.Add your Comment") }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    @if(count($comments) > 0)
                    <div class="col-md-6 col-12">
                        <div class="section-title align-items-stretch mb-3">
                            <h2 class="title font-weight-bold" data-aos="fade-up">
                            {{ __("messages.Comments") }}
                            </h2>
                        </div>
                        <div class="comments-container" data-aos="fade-up">
                            <ul>
                                @foreach($comments as $comment)
                                <li>
                                    <div class="comment">
                                        <div class="comment-logo">
                                            <img src="/web/assets/images/icons/Group 77.svg" />
                                        </div>
                                        <div class="comment-text">
                                            <label class="m-0 name">
                                            {{ $comment->commenter }}
                                            </label>
                                            <p class="details">
                                            {{ $comment->content }}
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </section>
    </div>
    <div class="section-overlay"></section>
        <div class="overlay-background-logo">
            <img src="/web/assets/images/icons/Path 168.svg" alt="doctor" draggable="false">
        </div>
        <section class="blogs d-pad">
            <div class="container position-relative">
                <div class="section-title align-items-stretch mb-0">
                    <h2 class="title" data-aos="fade-up">
                        {{ (app()->getLocale() == 'ar') ? 'قد يعجبك أيضاً' : 'You might also like'}}
                    </h2>
                    <div>
                        <a href="{{ url('blogs' . ( app()->getLocale() != 'ar' ? ( '/?lang=' . app()->getLocale() ) : '')) }}" class="btn-link">
                        {{ (app()->getLocale() == 'ar') ? 'عرض الكل' : 'Show All'}}
                        </a>
                    </div>
                </div>
                <div class="swiper blogsSlider" data-aos="fade-up">
                    <div class="swiper-wrapper">
                        @if(!empty($relatedArticles))
                            @foreach($relatedArticles as $article)
                            <div class="swiper-slide">
                                <a href="{{ url($article->slug) . ( app()->getLocale() != 'ar' ? '?lang=en' : '' ) }}">
                                    <div class="article">
                                        <div class="small-logo">
                                            <img src="/web/assets/images/icons/Group 77.svg" />
                                        </div>
                                        <div class="article__main-container">
                                            <div class="article__image">
                                                <img src="{{ $article->image }}"
                                                    alt="{{ $article->alt_image ?  $article->alt_image : ''}}"
                                                    draggable="false">
                                            </div>
                                            <div class="article__user">
                                                <div class="title-info">
                                                    {{ $article->category->name }}
                                                </div>
                                                <h3 class="h6 desc">
                                                    {{ $article->name }}
                                                </h3>
                                                <div class="d-flex date-text">
                                                    <img src="/web/assets/images/icons/calendar.svg" />
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
                        @endif
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

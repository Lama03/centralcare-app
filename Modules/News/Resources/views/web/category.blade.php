@extends('web.layouts.base')

@section('pageTitle'){{ $articlecat->meta_title ? $articlecat->meta_title : $articlecat->name }}@endsection

@section('metaKeys')
    <meta name="title" content="{{  $articlecat->meta_title ? $articlecat->meta_title : '' }}" />
    <meta name="description" content="{{  $articlecat->meta_description ? $articlecat->meta_keywords : '' }}" />
    <meta name="keywords" content="{{  $articlecat->meta_keywords  ? $articlecat->meta_keywords : ''}}" />
    <link rel="canonical" href="{{ $articlecat->canonical_url ? $articlecat->canonical_url : '' }}" />
@endsection

@section('languages')
    <div class="top-bar__block language nav-link gap-0">
        <ul class="list-inline">
            <li class="list-inline-item large-mg">
                <a href="{{ url(app()->getLocale() != 'ar' ? url($articlecat->translate('ar')->slug) : url($articlecat->translate('en')->slug) . '?lang=en' ) }}" class="top-bar__side">
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
<div class="simple-background">
    <!-- BEGIN :: include page header section -->
    @include('web.components.page_header', ['page_name' => ( $articlecat->name ? $articlecat->name : '' )])
    <!-- END :: include page header section -->

    <div class="section-overlay">
        <div class="overlay-background-logo">
            <img src="/web/assets/images/icons/Path 168.svg" alt="doctor" draggable="false">
        </div>
        <section class="d-pad">
            <div class="container position-relative">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="section-title flex-column align-items-start mb-0">
                            <h2 class="title" data-aos="fade-up">
                             @lang("messages.Central Care Blog") {{ $articlecat->name ? $articlecat->name : '' }}
                            </h2>
                            <div class="sub-desc">
                            {{ $settings['articles_content'][app()->getLocale()] ?? '' }}
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-4">
                        <div class="services__card-container row" data-aos="fade-up">
                            @if(!empty($articles))
                            @foreach($articles as $article)
                            <div class="col-12 col-md-4">
                                <a href="{{ url($article->slug) . ( app()->getLocale() != 'ar' ? '?lang=en' : '' ) }}">
                                    <div class="article">
                                        <div class="small-logo">
                                            <img src="/web/assets/images/icons/Group 77.svg" />
                                        </div>
                                        <div class="article__main-container">
                                            <div class="article__image">
                                                <img src="{{ $article->image }}" alt="{{ $article->alt_image ?  $article->alt_image : ''}}" draggable="false">
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
                    </div>
                    <div class="col-lg-12">
                        <div class="page-pagination">
                        {{ $articles->appends(app()->getLocale() == 'en' ? ['lang' => 'en'] : '')->links('web.home.pagination') }}
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

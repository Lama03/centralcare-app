@extends('web.layouts.base')

@section('pageTitle', __('messages.news_and_events'))

@section('metaKeys')
    {!! $settings['news_page_seo'][app()->getLocale()] ?? '' !!}
@endsection

@section('languages')
    <div class="top-bar__block language nav-link gap-0">
        <ul class="list-inline">
            <li class="list-inline-item large-mg">
                <a href="{{ url(app()->getLocale() != 'ar' ? 'news' : 'news?lang=en') }}" class="top-bar__side">
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
        <!-- BEGIN :: include page header -->
        @include('web.components.page_header', ['page_name' => __('messages.news_and_events')])
        <!-- END :: include page header -->

        <div class="section-overlay"></section>
            <div class="overlay-background-logo">
                <img src="{{ asset('web/assets/images/icons/Path 168.svg') }}" alt="doctor" draggable="false">
            </div>
            <section class="d-pad">
                <div class="container position-relative">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="section-title flex-column align-items-start mb-0">
                                <h2 class="title" data-aos="fade-up">@lang('messages.news_and_events')</h2>
                                <div class="sub-desc">{{ $settings['news_and_events_content'][app()->getLocale()] ?? '' }}</div>
                            </div>
                        </div>
                        <div class="col-12 col-md-8">
                            <div class="section-title flex-column align-items-start mb-0">
                                <nav class="tabs-nav width-auto mobile-full-width" data-aos="fade-up">
                                    <span onclick="showAllNews()" class="btn btn-white btn-tab {{ request()->get('category') == '' ? 'active' : '' }}">
                                        @lang('messages.view_all')
                                    </span>
                                    @if(!empty($categories))
                                        @foreach($categories as $category)
                                            <span onclick="showNewsByCat({{$category->id}})" class="btn btn-white btn-tab {{ request()->get('category') == $category->id ? 'active' : '' }}">
                                                {{ $category->name }}
                                            </span>
                                        @endforeach
                                    @endif
                                </nav>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="search-block aos-init aos-animate" data-aos="fade-up">
                                <form class="form-elm" method="get" action="">
                                    <div class="form-group">
                                        <input type="search" name="keyword" class="form-control white-input search-input" value="" placeholder="@if (request()->has('keyword')) {{ request()->get('keyword') }} @else {{ __("messages.search") }} @endif">
                                        @if( app()->getLocale() != 'ar' )
                                            <input type="hidden" name="lang" value="{{ app()->getLocale() }}" />
                                        @endif
                                        <button class="btn btn-search btn-brand-primary">
                                            <img class="icon" src="{{ asset('web/assets/images/icons/Icon feather-search.svg') }}" alt="search" draggable="false">
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-12 mt-4">
                            <div class="services__card-container row" data-aos="fade-up">
                                @foreach($articles as $article)
                                    <div class="col-12 col-md-4">
                                        <a href="{{ url('news/' . $article->slug) . ( app()->getLocale() != 'ar' ? '?lang=en' : '' ) }}">
                                            <div class="article">
                                                <div class="small-logo">
                                                    <img src="{{ asset('web/assets/images/icons/Group 77.svg') }}" />
                                                </div>
                                                <div class="article__main-container">
                                                    <div class="article__image">
                                                        <img src="{{ $article->image }}" alt="{{ $article->name }}" draggable="false">
                                                    </div>
                                                    <div class="article__user">
                                                        <div class="title-info">{{ $article->category->name }}</div>
                                                        <h3 class="h6 desc">{{ $article->name }}</h3>
                                                        <div class="d-flex date-text">
                                                            <img src="{{ asset('web/assets/images/icons/calendar.svg') }}" />
                                                            <span class="small small-info mx-1">{{ $article->created_at }}</span>
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
                        </div>
                        <div class="col-lg-12">
                            <div class="page-pagination">
                                {{ $articles->appends(app()->getLocale() == 'en' ? ['keyword' => request()->get('keyword') , 'category' => request()->get('category') ,'lang' => 'en'] : ['keyword' => request()->get('keyword') , 'category' => request()->get('category')])->links('web.home.pagination') }}
                            </div>
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
@stop

@section('submit.scripts')
    <script type="text/javascript">
        function showAllNews() {
            ReturnUrl = '{{ url("news") }}';

            @if(app()->getLocale() == 'en')
                window.location.href = ReturnUrl + '&lang=en';
            @else
                window.location.href = ReturnUrl ;
            @endif
        }
        function showNewsByCat(slugvalue) {
            ReturnUrl = '{{ url("news") }}';

            if(slugvalue){
                @if(app()->getLocale() == 'en')
                    window.location.href = ReturnUrl + '?category=' + slugvalue + '&lang=en';
                @else
                    window.location.href = ReturnUrl + '?category=' + slugvalue ;
                @endif
            }
        }
    </script>
@stop

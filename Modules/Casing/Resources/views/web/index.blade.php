@extends('web.layouts.base')

@section('pageTitle'){{ $settings['metatitle_cases_page_seo'][app()->getLocale()] ?? __('messages.Before and After Cases') }}@endsection

@section('metaKeys')
    {!! $settings['cases_page_seo'][app()->getLocale()] ?? '' !!}
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
    <!-- BEGIN :: include page header section -->
    @include('web.components.page_header', ['page_name' => __("messages.Before and After Cases")])
    <!-- END :: include page header section -->

    <div class="section-overlay">
        <div class="overlay-background-logo">
            <img src="/web/assets/images/icons/Path 168.svg" alt="doctor" draggable="false">
        </div>
        <section class="d-pad pb-0">
            <div class="container position-relative">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="section-title flex-column align-items-start mb-0">
                            <h2 class="title" data-aos="fade-up">@lang("messages.Before and After Cases")</h2>
                            <div class="sub-desc">{{ $settings['cases_page_content'][app()->getLocale()] ?? '' }}</div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6"></div>
                    <div class="col-12 case__filter">
                        <select class="filter" name="doctors" id="doctorsSelect" onchange="return GetAllDoctors();">
                            <option value="0">{{ (app()->getLocale() == 'ar') ? 'كل الأطباء' : 'All Doctors'}}</option>
                            @if(!empty($Doctors))
                            @foreach($Doctors as $doctor)
                            <option value="{{ $doctor->id }}" {{ $request->doctor == $doctor->id ? 'selected' : '' }}> {{ $doctor->name }}</option>
                            @endforeach
                            @endif
                        </select>
                        <div class="search-block aos-init aos-animate" data-aos="fade-up">
                            <form class="form-elm" method="GET" action="{{ route('web.Casings.index', app()->getLocale() == 'en' ? ['lang' => 'en' ] : '') }}">
                                <div class="form-group">
                                    <input type="search" name="keyword" class="form-control white-input search-input" value="" placeholder="@if (request()->has('keyword')) {{ request()->get('keyword') }} @else {{ __("messages.Are you looking") }} @endif">
                                    @if( app()->getLocale() != 'ar' )
                                        <input type="hidden" name="lang" value="{{ app()->getLocale() }}" />
                                    @endif
                                    <button class="btn btn-search btn-brand-primary">
                                        <img class="icon" src="/web/assets/images/icons/Icon feather-search.svg" alt="search" draggable="false">
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-12 cases cases-page mt-4">
                        @if(!empty($cases))
                        @foreach($cases as $case)
                            <div class="case" data-aos="fade-up">
                                <div class="case__images twentytwenty-container">
                                    <img src="{{ $case->image_before }}" draggable="false" loading="lazy" alt="before">
                                    <img src="{{ $case->image_after }}" draggable="false" loading="lazy" alt="after">
                                </div>
                                <div class="case__text case__text d-flex justify-content-between mt- color-text-secondary">
                                    <div class="d-flex align-items-center">
                                        <img class="case__doctor-img" src="{{ $case->doctor->image }}" alt="{{ $case->doctor->alt_image }}" draggable="false">
                                        <h3 class="doctor-name">
                                            {{ $case->doctor->name }}
                                        </h3>
                                    </div>
                                    <div class="small-logo">
                                        <img src="/web/assets/images/icons/Group 77.svg" />
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="col-lg-12">
                        <div class="page-pagination">
                           {{ $cases->appends(app()->getLocale() == 'en' ? ['lang' => 'en'] : '')->links('web.home.pagination') }}
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
@endsection
@section('submit.scripts')
    <script type="text/javascript">

        function GetAllDoctors() {
            DoctorId = $("#doctorsSelect option:selected").val();

            if(DoctorId == 0){
                @if(app()->getLocale() == 'en')
                window.location.href = route('web.Casings.index' , {'lang': '{{ app()->getLocale() }}'}) ;
                @else
                window.location.href = route('web.Casings.index' , { }) ;
                @endif
            } else {

            @if(app()->getLocale() == 'en')
                window.location.href = route('web.Casings.index', { 'doctor' : DoctorId ,'lang': '{{ app()->getLocale() }}'}) ;
            @else
                window.location.href = route('web.Casings.index', { 'doctor' : DoctorId }) ;
            @endif
           }
        }
    </script>
@endsection

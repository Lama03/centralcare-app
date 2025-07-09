<!DOCTYPE html>
<html dir="{{ direction(app()->getLocale()) }}" lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{ asset('web/builds/css/styles.css') }}?v=<?php echo time(); ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('web/assets/images/icons/icon_32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('web/assets/images/icons/icon_96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('web/assets/images/icons/icon_16.png') }}">

    <title>@yield('pageTitle')</title>

    @yield('metaKeys')

    @stack('styles')

    {!! settings()->get('code.head.allpage') !!}
    {!! settings()->get('salesiq.code') !!}
</head>

<body class="{{ (app()->getLocale() == 'en' ? 'ltr' : '') }}">


<script>


window.addEventListener("scroll",function(){


  var main_nav = document.getElementById("main_nav");

  if(document.documentElement.scrollTop == 0){
    console.log('at the top')
  main_nav.style.background = "transparent";
  main_nav.style.boxShadow = "0 0 0";

} else {
    main_nav.style.background = "white";
    main_nav.style.boxShadow = "0 0 15px #8e8e8ea6";

}


})


</script>

<header class="header" id="header">
    <div class="header__nav" data-aos="fade-up" data-aos-delay="100"> <!-- container removed -->
        <nav class="navbar main navbar-expand-xl navbar-light d-flex flex-row w-100" id="main_nav">
            <div class="brand-container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ $settings['website_logo'] ?? asset('web/assets/images/icons/logo.svg') }}" alt="logo">
                </a>
                <div>
                    <a href="#" class="btn btn-white btn-search-mobile">
                        <img src="{{ asset('web/assets/images/icons/Icon feather-search.svg') }}" alt="" />
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarElm" aria-controls="navbarElm" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
            </div>
            <div class="nav-bar-wrapper">
                <div class="collapse navbar-collapse" id="navbarElm">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('web.home.index', app()->getLocale() == 'en' ? ['lang' => 'en'] : '') }}">
                                @lang('messages.Home')
                            </a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="companyNav" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                @lang('messages.central_care_company')
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="companyNav">
                                <li>
                                    <a class="dropdown-item" href="{{ url('about-us' . ( app()->getLocale() != 'ar' ? ( '/?lang=' . app()->getLocale() ) : '')) }}">
                                        @lang('messages.get_to_know_us')
                                    </a>
                                </li>

                                <li>
                                    <a class="dropdown-item" href="{{ route('web.devices.index') }}">
                                        @lang('messages.devices_and_technology')
                                    </a>
                                </li>

                                <li>
                                    <a class="dropdown-item" href="{{ url('news' . ( app()->getLocale() != 'ar' ? ( '/?lang=' . app()->getLocale() ) : '')) }}">
                                        @lang('messages.news_and_events')
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="servicesNav" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                @lang('messages.Services')
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="servicesNav">
                                @if(!empty($servicesmanu))
                                    @foreach($servicesmanu as $serv)
                                        @if( !in_array($serv->slug, ['اللأسنان', 'Dental']) )
                                            <a class="dropdown-item" href="{{ url("/services/$serv->slug") . ( app()->getLocale() != 'ar' ? ( '/?lang=' . app()->getLocale() ) : '') }}">
                                                {{ __('messages.service') . ' ' . $serv->name }}
                                            </a>
                                        @else
                                            <a class="dropdown-item" href="https://centraldentalcare.sa/">
                                                {{ __('messages.service') . ' ' . $serv->name }}
                                            </a>
                                        @endif
                                    @endforeach
                                @endif
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="doctorsNav" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                @lang('messages.Doctors')
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="doctorsNav">
                                <li><a class="dropdown-item" href="{{ route('web.doctors.index', app()->getLocale() == 'en' ? ['lang' => 'en'] : '') }}">@lang('messages.Doctors')</a></li>
                                <li><a class="dropdown-item" href="{{ route('web.Casings.index', app()->getLocale() == 'en' ? ['lang' => 'en'] : '') }}">@lang('messages.Cases before and after')</a></li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="blogsNav" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                @lang('messages.News and Articles')
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="blogsNav">
                                <a class="dropdown-item" href="{{ url('blogs' . ( app()->getLocale() != 'ar' ? ( '/?lang=' . app()->getLocale() ) : '')) }}">@lang('messages.All articles')</a>
                                @foreach(\Modules\Blog\Models\BlogCategory::where('status', 2)->get() as $blogCategory)
                                    <a class="dropdown-item" href="{{ url($blogCategory->slug) . ( app()->getLocale() != 'ar' ? '?lang=en' : '' ) }}">
                                        {{ $blogCategory->name }}
                                    </a>
                                @endforeach
                            </ul>
                        </li>

                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('web.offers.index', app()->getLocale() == 'en' ? ['lang' => 'en'] : '') }}">
                                @lang('messages.Offers')
                            </a>
                        </li>

                        <li class="nav-item active">
                            <a class="nav-link" href="{{ url('contact-us' . ( app()->getLocale() != 'ar' ? ( '/?lang=' . app()->getLocale() ) : '')) }}">
                                @lang('messages.Contact Us')
                            </a>
                        </li>

                        <li class="nav-item active">
                            <a class="nav-link" href="{{ url('terms' . ( app()->getLocale() != 'ar' ? ( '/?lang=' . app()->getLocale() ) : '')) }}">
                                @lang('messages.terms_and_conditions')
                            </a>
                        </li>

                        @yield('languages')
                    </ul>
                </div>
            </div>
            <div class="nav-bar-wrapper">
                <div class="collapse navbar-collapse">
                    <div class="my-2 my-lg-0 d-xl-inline-block">
                         <!-- <button type="button" class="btn btn-white-icon" data-toggle="modal" data-target="#searchModal">
                            <img src="{{ asset('web/assets/images/icons/Icon feather-search.svg') }}" />
                        </button> -->
                        <a href="{{ url('book-an-appointment' . ( app()->getLocale() != 'ar' ? ( '/?lang=' . app()->getLocale() ) : '')) }}" class="btn btn-brand-primary cool-btn-effect">
                            @lang('messages.Book Your Appointment Now')
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>

<div class="fixed-contact-overlay">
    <ul class="list-inline contact-list">
        <li class="list-inline-item">
            <a href="tel:{{ $settings['phone'] ?? '' }}" title="phone">
                <div class="top-bar__icon">
                    <img src="{{ asset('web/assets/images/icons/Icon metro-phone.svg') }}?v=<?php echo time(); ?>" draggable="false" alt="alt">
                </div>
            </a>
        </li>

        <li class="list-inline-item">
            <a href="mailto:{{ $settings['email'] ?? '' }}" title="email">
                <div class="top-bar__icon">
                    <img src="{{ asset('web/assets/images/icons/Icon zocial-email.svg') }}?v=<?php echo time(); ?>" draggable="false" alt="alt">
                </div>
            </a>
        </li>

        <li class="list-inline-item">
            <a href="https://goo.gl/maps/6a3i177K3EmdwLSF9" target="_blank" title="location">
                <div class="top-bar__icon">
                    <img src="{{ asset('web/assets/images/icons/Icon open-map-marker.svg') }}?v=<?php echo time(); ?>" draggable="false" alt="alt">
                </div>
            </a>
        </li>
    </ul>
</div>

<!-- BEGIN :: search modal section -->
<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <button type="button" class="close ml-auto" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <div class="modal-header">
                <h4 class="modal-title" id="searchModalLabel">@lang('messages.search')</h4>
            </div>
            <div class="modal-body">
                <form method="GET" action="{{ url('/search/results') }}">
                    <div class="form-row">
                        <div class="form-group col-lg-9">
                            <label for="searchInput" class="sr-only">@lang('messages.search')</label>

                            <input autofocus type="search"
                                   name="keyword"
                                   class="form-control search-input"
                                   id="searchInput"
                                   placeholder="{{ (app()->getLocale() == 'ar') ? 'هل تبحث عن طبيب أو خدمة أو أي شئ؟' : 'Are you looking for a doctor, service or anything?'}}">
                        </div>

                        @if(app()->getLocale() != 'ar')
                            <input type="hidden" name="lang" value="{{ app()->getLocale() }}">
                        @endif

                        <div class="form-group col-lg-3">
                            <button type="submit" class="btn btn-brand-primary btn-block">@lang('messages.search')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END :: search modal section -->

@yield('content')

<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="footer__logo aos-init aos-animate" data-aos="fade-up">
                    <a class="navbar-brand" href="{{ url('/') . ( app()->getLocale() != 'ar' ? ( '/?lang=' . app()->getLocale() ) : '') }}">
                        <img src="{{ asset('web/assets/images/icons/logo-large.png') }}" alt="logo">
                    </a>
                </div>
            </div>
            <div class="col-12 margin-y">
                <div class="row">
                    <div class="col-md-3 col-12">
                        @include('web.components.social_media')
                    </div>
                    <div class="col-md-9 col-12 d-flex justify-content-end footer-info-list">
                        <ul class="list-inline">
                            <li class="list-inline-item large-mg">
                                <a href="tel:{{ $settings['phone'] ?? '' }}" class="top-bar__side">
                                    <div class="top-bar__icon">
                                        <img class="icon" src="{{ asset('web/assets/images/icons/phone_iphone.svg') }}?v=<?php echo time(); ?>" draggable="false" alt="alt">
                                    </div>
                                    <div class="top-bar__text d-lg-inline-block">{{ $settings['phone'] ?? '' }}</div>
                                </a>
                            </li>
                            <li class="list-inline-item large-mg">
                                <a href="mailto:{{ $settings['email'] ?? '' }}" class="top-bar__side">
                                    <div class="top-bar__icon">
                                        <img class="icon" src="{{ asset('web/assets/images/icons/Icon zocial-email.svg') }}?v=<?php echo time(); ?>" draggable="false" alt="alt">
                                    </div>
                                    <div class="top-bar__text d-lg-inline-block">{{ $settings['email'] ?? '' }}</div>
                                </a>
                            </li>
                            <li class="list-inline-item large-mg">
                                <a href="https://goo.gl/maps/6a3i177K3EmdwLSF9" target="_blank" class="top-bar__side">
                                    <div class="top-bar__icon">
                                        <img class="icon" src="{{ asset('web/assets/images/icons/Icon open-map-marker.svg') }}?v=<?php echo time(); ?>" draggable="false" alt="alt">
                                    </div>
                                    <div class="top-bar__text d-lg-inline-block">{{ $settings['address'][app()->getLocale()] ?? '' }}</div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-12 margin-y">
                <div class="row">
                    <div class="col-md-4 col-12">
                        <div class="footer__list">
                            <h6>@lang('messages.footer_title')</h6>
                            <p>{{ $seetings['footer_content'][app()->getLocale()] ?? '' }}</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="footer__list aos-init aos-animate" data-aos="fade-up">
                            <h6>{{ (app()->getLocale() == 'ar') ? 'الوصول السريع' : 'Quick access'}}:</h6>
                            <ul class="list-unstyled wrapped-list">
                                <li><a href="{{ route('web.home.index', app()->getLocale() == 'en' ? ['lang' => 'en'] : '') }}">@lang('messages.Home')</a></li>
                                <li><a href="{{ url('about-us' . ( app()->getLocale() != 'ar' ? ( '/?lang=' . app()->getLocale() ) : '')) }}">@lang('messages.about')</a></li>
                                {{--<li><a href="{{ route('web.leads.index', app()->getLocale() == 'en' ? ['lang' => 'en'] : '') }}">@lang('messages.installment')</a></li>--}}
                                <li><a href="{{ route('web.doctors.index', app()->getLocale() == 'en' ? ['lang' => 'en'] : '') }}">@lang('messages.Doctors')</a></li>
                                <li><a href="{{ url('blogs' . ( app()->getLocale() != 'ar' ? ( '/?lang=' . app()->getLocale() ) : '')) }}">@lang('messages.News and Articles')</a></li>

                                <li><a href="/page/privacy-policy">@lang('messages.privacy_policy')</a></li>


                            </ul>
                        </div>
                    </div>
                    <div class="col-md-1 col-12">
                        <div class="footer__list aos-init aos-animate" data-aos="fade-up">
                            <h6>@lang('messages.Services')</h6>
                            <ul class="list-unstyled">
                                @if(!empty($servicesmanu))
                                    @foreach($servicesmanu as $serv)
                                        @if( !in_array($serv->slug, ['اللأسنان', 'Dental']) )
                                            <li>
                                                <a href="{{ url("/services/$serv->slug") . ( app()->getLocale() != 'ar' ? '?lang=en' : '' ) }}">
                                                    {{ __('messages.service') . ' ' . $serv->name }}
                                                </a>
                                            </li>
                                        @else
                                            <li>
                                                <a href="https://centraldentalcare.sa/">
                                                    {{ __('messages.service') . ' ' . $serv->name }}
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="footer__form footer__list aos-init aos-animate" data-aos="fade-up">
                            <h6>@lang('messages.newsletter')</h6>
                            <p>@lang('messages.newsletter_content')</p>
                            <form method="POST" action="{{ route('web.home.subscribe', app()->getLocale() == 'en' ? ['lang' => 'en'] : '') }}">
                                @csrf

                                <div class="form-group">
                                    <div class="position-relative d-flex align-items-center">
                                        <span class="form-icon">
                                            <img src="{{ asset('web/assets/images/icons/phone_iphone.svg') }}?v=<?php echo time(); ?>" />
                                        </span>
                                        <input type="tel" name="phone" class="form-control" id="subscribeForm"  onchange="validateSubContact(this)" maxlength="10" placeholder="@lang('messages.enter_your_mobile_number')" />
                                        <button class="btn btn-brand-primary form-btn">@lang('messages.subscribe_now')</button>
                                    </div>
                                    <div class="invalid-feedback">
                                        {{ (app()->getLocale() == 'ar') ? 'يجب أن يكون هذا الحقل جوالًا سعوديًا (05xxxxxxxx).' : 'This field must be saudi arabia mobile (05xxxxxxxx).'}}
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<div class="footer__copyrights">
    <div class="container">
        <div class="row">
            <div class="footer__copyrights_container">
                <div class="d-flex justify-content-start align-items-center">
                    <small class="text">{{ $settings['copyright'][app()->getLocale()] ?? '' }}</small>
                </div>
                <div>
                    @include('web.components.social_media')
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('web/builds/js/build.js') }}"></script>

@routes

@yield('submit.scripts')
<script>
    $(document).ready(function(){
        $(".btn btn-white-icon").click(function(){
            $("#searchModal").modal('show');
        });
        $(".close ml-auto").click(function(){
            $("#searchModal").modal('hide');
        });
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js?ver=1.1"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css?ver=1.1">

    @if(Session::has('success'))
       @if(app()->getLocale() == 'ar')
        <script>
            toastr.options.positionClass = 'toast-top-right';
            toastr.success("{{ Session::get('success') }}");
        </script>
    @else
        <script>
            toastr.options.positionClass = 'toast-top-left';
            toastr.success("{{ Session::get('success') }}");
        </script>
    @endif

    @elseif(Session::has('error'))
        @if(app()->getLocale() == 'ar')
        <script>
            toastr.options.positionClass = 'toast-top-right';
            toastr.error("{{ Session::get('error') }}");
        </script>
    @else
        <script>
            toastr.options.positionClass = 'toast-top-left';
            toastr.error("{{ Session::get('error') }}");
        </script>
    @endif
@endif

<script type='text/javascript'>
    function validateSubContact(tel) {

        var xyz=document.getElementById('subscribeForm').value.trim();

        var  phoneno = /^\d{10}$/;
        if((tel.value.match(phoneno)) && tel.value.length == 10 && xyz.substr(0,2)==='05' && $.isNumeric(xyz))
        {
            $(tel).removeClass('is-invalid');
            $(tel).addClass('is-valid');

        } else {
            $("#subscribeForm").val('');
            $(tel).removeClass('is-valid');
            $(tel).addClass('is-invalid');
        }
    }
</script>

</body>

</html>

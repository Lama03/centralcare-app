@extends('web.layouts.base')

@section('pageTitle'){{ $settings['metatitle_contactus_page_seo'][app()->getLocale()] ?? __('messages.Contact') }}@endsection

@section('metaKeys')
    {!! $settings['contact_us_page_seo'][app()->getLocale()] ?? '' !!}
@endsection

@section('languages')
    <div class="top-bar__block language nav-link gap-0">
        <ul class="list-inline">
            <li class="list-inline-item large-mg">
                <a href="{{ url(app()->getLocale() != 'ar' ? 'contact-us' : 'contact-us?lang=en') }}" class="top-bar__side">
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
<div class="simple-background contact-us-page offers-page centered-overlay">

    <!-- BEGIN :: include about section -->
    @include('web.components.page_header', ['page_name' => __('messages.Contact')])
    <!-- END :: include about section -->

    <div class="section-overlay">
        <div class="overlay-background-logo">
            <img src="/web/assets/images/icons/Path 168.svg" alt="doctor" draggable="false">
        </div>
        <section class="about-card d-pad pb-0 my-0">
            <div class="container position-relative">
                <form class="form" method="POST" action="{{ route('web.pages.store', app()->getLocale() == 'en' ? ['lang' => 'en'] : '') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-7 col-12">
                            <div class="section-title align-items-stretch flex-column mb-0">
                                <h2 class="title mt-2" data-aos="fade-up">{{ $settings['metatitle_contactus_page_seo'][app()->getLocale()] ?? __('messages.Contact') }}</h2>
                                <div class="sub-desc mt-2">{{ $settings['contact_us_content'][app()->getLocale()] ?? '' }}</div>
                            </div>
                        </div>
                        <div class="col-12 col-md-8">
                            <div class="section-title flex-column align-items-start mb-0">
                                <h2 class="h6 my-3" data-aos="fade-up">
                                    {{ (app()->getLocale() == 'ar') ? 'الغرض من الإتصال' : 'Purpose of contact'}}
                                </h2>
                                <div class="group-inputs" data-aos="fade-up">
                                    <div class="form-group row d-flex align-items-center">
                                        <div class="custom-input-check full-width-mobile">
                                            <input type="radio" checked id="issue1" name="type_purpose" value="1">
                                            <label for="issue1">
                                                {{ (app()->getLocale() == 'ar') ? 'أستفسار' : 'Enquiry'}}
                                            </label>
                                            <input type="radio" id="issue2" name="type_purpose" value="2">
                                            <label for="issue2">
                                                {{ (app()->getLocale() == 'ar') ? 'شكوى' : 'Complaint'}}
                                            </label>
                                            <input type="radio" id="issue3" name="type_purpose" value="3">
                                            <label for="issue3">
                                                {{ (app()->getLocale() == 'ar') ? 'أقتراح' : 'Suggestion'}}
                                            </label>
                                            <input type="radio" id="issue4" name="type_purpose" value="4">
                                            <label for="issue4">
                                                {{ (app()->getLocale() == 'ar') ? 'أخرى' : 'Other'}}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 position-relative">
                            <div class="section-title align-items-stretch mb-3">
                                <h2 class="h6 mb-0" data-aos="fade-up">
                                    {{ (app()->getLocale() == 'ar') ? 'بيانات الإتصال' : 'Contact Data'}}
                                </h2>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 position-relative">
                            <div class="group-inputs" data-aos="fade-up">
                                <div class="form-group row d-flex align-items-center">
                                    <label for="offerBookName" class="col-lg-3 col-form-label">{{ __("messages.Full Name") }}</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control form-control-secondary" id="offerBookName" name="name" placeholder="{{ __("messages.Full Name") }}">
                                    </div>
                                </div>
                                <div class="form-group row d-flex align-items-center">
                                    <label for="offerBookPhone" class="col-lg-3 col-form-label">{{ __("messages.Phone Number") }}</label>
                                    <div class="col-lg-9">
                                        <input type="tel" class="form-control form-control-secondary" id="offerBookPhone" onchange="validateContact(this)" maxlength="10" name="phone" placeholder="{{ __("messages.Phone Number") }} (05xxxxxxxx).">
                                        <div class="invalid-feedback">
                                            {{ (app()->getLocale() == 'ar') ? 'يجب أن يكون هذا الحقل جوالًا سعوديًا (05xxxxxxxx).' : 'This field must be saudi arabia mobile (05xxxxxxxx).'}}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row d-flex align-items-center">
                                    <label for="offerBookMail" class="col-lg-3 col-form-label">{{ __("messages.Email Address") }}</label>
                                    <div class="col-lg-9">
                                        <input type="email" class="form-control form-control-secondary" id="offerBookMail" name="email" placeholder="{{ __("messages.Email Address") }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 position-relative">
                            <div class="group-inputs" data-aos="fade-up">
                                <div class="form-group row d-flex">
                                    <label for="mmessage" class="col-lg-3 col-form-label">{{ __("messages.Message") }}</label>
                                    <div class="col-lg-9">
                                        <textarea type="text" id="mmessage" class="form-control form-control-secondary" placeholder="{{ (app()->getLocale() == 'ar') ? 'أدخل رسالتك' : 'Enter your message ..'}}" name="content"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="group-inputs" data-aos="fade-up">
                                <div class="form-group row d-flex">
                                    <button type="submit" class="btn btn-brand-primary w-auto m-md-0 m-auto">
                                        {{ (app()->getLocale() == 'ar') ? 'أرسل رسالتك' : 'Send your message'}}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="container-fluid maps-container  p-0 mt-5">
                <div class="contact__map aos-init aos-animate" data-aos="fade-up">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14308.194764325328!2d50.1824682!3d26.2925215!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x80c93477e5ce0aa5!2sCentral%20Dental%20Care!5e0!3m2!1sen!2seg!4v1647854769713!5m2!1sen!2seg" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
                <div class="container maps-overlay">
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <div class="overlay-container">
                                <img src="/web/assets/images/icons/Icon metro-phone.svg" />
                                <p>
                                {{ $settings['phone'] ?? '' }}
                                </p>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="overlay-container">
                                <img src="/web/assets/images/icons/Icon zocial-email.svg" />
                                <p>
                                {{ $settings['email'] ?? '' }}
                                </p>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="overlay-container">
                                <img src="/web/assets/images/icons/Icon open-map-marker.svg" />
                                <p>
                                {{ $settings['address'][app()->getLocale()] ?? '' }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- BEGIN :: include about card section -->
            @include('web.components.book_now')
            <!-- END :: include about card section -->
        </section>
    </div>
</div>

@endsection

@section('submit.scripts')
    <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>

    <script type='text/javascript'>

        function validateContact(tel) {

            var xyz=document.getElementById('offerBookPhone').value.trim();

            var  phoneno = /^\d{10}$/;
            if((tel.value.match(phoneno)) && tel.value.length == 10 && xyz.substr(0,2)==='05' && $.isNumeric(xyz))
            {
                $(tel).removeClass('is-invalid');
                $(tel).addClass('is-valid');

            }
            else
            {
                $("#offerBookPhone").val('');
                $(tel).removeClass('is-valid');
                $(tel).addClass('is-invalid');

            }
        }
        $('.form').validate({
            rules: {
                name:"required",
                content:"required",
                phone:"required",
                email: {
                    required: true,
                    email: true
                }
            },
            messages: {
                email: "{{__('messages.mailval')}}",
                name: "{{__('messages.namerequired')}}",
                phone: "{{__('messages.phonerequired')}}",
                content: "{{__('messages.messagerequired')}}",
            },
        });
    </script>
@endsection

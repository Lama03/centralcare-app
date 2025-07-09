@extends('web.layouts.base')

@section('pageTitle'){{ $settings['metatitle_offer_book_page_seo'][app()->getLocale()] ?? $offer->name }}@endsection

@section('metaKeys')
    {!! $settings['offer_book_page_seo'][app()->getLocale()] ?? '' !!}
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
    <div class="simple-background offers-page centered-overlay">

        <!-- BEGIN :: include page header section -->
        @include('web.components.page_header', ['page_name' => ( $offer->name ?? '' )])
        <!-- END :: include page header section -->

        <div class="section-overlay">
            <div class="overlay-background-logo">
                <img src="/web/assets/images/icons/Path 168.svg" alt="doctor" draggable="false">
            </div>
            <section class="about-card d-pad my-0">
                <form class="form" method="post" action="{{ route('web.offer-booking.store', app()->getLocale() == 'en' ? ['lang' => 'en'] : '')}}">
                    @csrf
                    <div class="container position-relative">
                        <div class="row">
                            <div class="col-md-6 col-12 text-container">
                                <div class="section-title align-items-stretch flex-column mb-0">
                                    <h2 class="title mt-2" data-aos="fade-up">
                                        {{ $offer->name ? $offer->name : '' }}
                                    </h2>
                                    <div class="sub-desc mt-2">
                                        {{ $settings['page_offer_content'][app()->getLocale()] ?? '' }}
                                    </div>
                                </div>

                                <form>
                                    <div class="section-title align-items-stretch mb-3">
                                        <h2 class="h6 mb-0" data-aos="fade-up">
                                            {{ (app()->getLocale() == 'ar') ? 'بيانات العرض' : 'Offer Data'}}
                                        </h2>
                                    </div>
                                    <input type="hidden" name="offer_id"  value="{{ $offer->id }}">
                                    <div class="group-inputs" data-aos="fade-up">
                                        <div class="form-group row d-flex align-items-center">
                                            <label for="offerBookName" class="col-lg-3 col-form-label">{{ (app()->getLocale() == 'ar') ? 'العرض' : 'Offer'}}</label>
                                            <div class="col-lg-9">
                                                <input
                                                    disabled="disabled"
                                                    type="text"
                                                    class="form-control form-control-secondary"
                                                    id="offerBookData"
                                                    placeholder="{{ $offer->name }}">
                                            </div>
                                        </div>
                                        <div class="form-group row d-flex align-items-center">
                                            <label for="offerBookPrice" class="col-lg-3 col-form-label">{{ (app()->getLocale() == 'ar') ? 'سعر العرض' : 'Offer Price'}}</label>
                                            <div class="col-lg-9">
                                                <input
                                                    disabled="disabled"
                                                    type="text"
                                                    class="form-control form-control-secondary"
                                                    id="offerBookPrice"
                                                    placeholder="{{ $offer->price }} @lang('messages.sar')">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="section-title align-items-stretch mb-3">
                                        <h2 class="h6 mb-0" data-aos="fade-up">
                                            {{ (app()->getLocale() == 'ar') ? 'البيانات الشخصية' : 'Personal data'}}
                                        </h2>
                                    </div>
                                    <div class="group-inputs" data-aos="fade-up">
                                        <div class="form-group row d-flex align-items-center">
                                            <label for="offerBookName" class="col-lg-3 col-form-label">{{ __('messages.Full Name') }}</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control form-control-secondary" id="offerBookName" placeholder="{{ __('messages.Full Name') }}" name="name" value="{{ old('name') }}" required>
                                            </div>
                                        </div>
                                        <div class="form-group row d-flex align-items-center">
                                            <label for="offerBookPhone" class="col-lg-3 col-form-label">{{ __('messages.Phone') }}</label>
                                            <div class="col-lg-9">
                                                <input type="tel" class="form-control form-control-secondary" id="offerBookPhone" onchange="validateContact(this)" maxlength="10" placeholder="{{ __('messages.phonerequired') }} (05xxxxxxxx)." name="phone" value="{{ old('phone') }}" required>
                                                <div class="invalid-feedback">
                                                    {{ (app()->getLocale() == 'ar') ? 'يجب أن يكون هذا الحقل جوالًا سعوديًا (05xxxxxxxx).' : 'This field must be saudi arabia mobile (05xxxxxxxx).'}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row d-flex align-items-center">
                                            <label for="offerBookMail" class="col-lg-3 col-form-label">{{ __('messages.Email Address') }}</label>
                                            <div class="col-lg-9">
                                                <input type="email" class="form-control form-control-secondary" id="offerBookMail" placeholder="{{ __('messages.emailrequired') }}" name="email" value="{{ old('email') }}" required>
                                            </div>
                                        </div>
                                        {{--<div class="form-group row d-flex align-items-center">
                                            <label for="offerBookBDate" class="col-lg-3 col-form-label">{{ (app()->getLocale() == 'ar') ? 'تاريخ الميلاد' : 'Date of Birth'}}</label>
                                            <div class="col-lg-9">
                                                <input type="date" name="date_of_birth" value="{{ old('date_of_birth') }}" class="form-control form-control-secondary" id="offerBookBDate" required>
                                            </div>
                                        </div>--}}
                                    </div>
                                    {{--<div class="section-title align-items-stretch my-3">
                                        <h2 class="h6 mb-0" data-aos="fade-up">
                                            بيانات الحجز
                                        </h2>
                                    </div>
                                    <div class="group-inputs" data-aos="fade-up">
                                        <div class="form-group row d-flex align-items-center">
                                            <label for="offerBookDate" class="col-lg-3 col-form-label">{{ (app()->getLocale() == 'ar') ? 'تاريخ الحجز' : 'Booking Date'}}</label>
                                            <div class="col-lg-9">
                                                <input type="date"  class="form-control form-control-secondary" id="date_picker" name="attendance_date" value="{{ old('attendance_date') }}" required>
                                            </div>
                                        </div>
                                        <div class="form-group row d-flex align-items-center">
                                            <label for="bookTime" class="col-lg-3 col-form-label">{{ (app()->getLocale() == 'ar') ? 'توقيت الحجز' : 'Booking Timing'}}</label>
                                            <div class="col-lg-9">
                                                <select class="custom-select" id="bookTime" name="available_time" required>
                                                    <option value="">{{ __('messages.timerequired') }}</option>
                                                    <option value="{{ (app()->getLocale() == 'ar') ? 'صباحي' : 'Morning'}}">{{ (app()->getLocale() == 'ar') ? 'صباحي' : 'Morning'}}</option>
                                                    <option value="{{ (app()->getLocale() == 'ar') ? 'مسائي' : 'Evening'}}">{{ (app()->getLocale() == 'ar') ? 'مسائي' : 'Evening'}}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>--}}
                                    <div class="section-title align-items-stretch mb-3">
                                        <h2 class="h6 mb-0" data-aos="fade-up">
                                            {{ (app()->getLocale() == 'ar') ? 'خيارات الدفع' : 'Payment Options'}}
                                        </h2>
                                    </div>
                                    <div class="group-inputs" data-aos="fade-up">
                                        <div class="form-group row d-flex align-items-center">
                                            <div class="custom-input-check">
                                            <!-- <input type="radio" id="radio1" name="type_pay" value="Pay online">
                                            <label for="radio1">{{ (app()->getLocale() == 'ar') ? ' الدفع اونلاين ' : ' Online payment '}}</label> -->
                                                <input type="radio" id="radio2" name="type_pay" value="Payment in branch" checked>
                                                <label for="radio2">{{ (app()->getLocale() == 'ar') ? ' الدفع في العيادة ' : ' Payment in clinic '}}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row d-flex mt-4">
                                        <button type="submit" class="btn btn-brand-primary w-auto">{{ (app()->getLocale() == 'ar') ? 'إحجز العرض الآن' : 'Book the offer now'}}</button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-12 col-md-6 position-relative image-container">
                                <div class="about-card__img-wrapper justify-content-center img-lg-container mt-0 mt-md-5">
                                    <image class="img-lg" src="{{ $offer->image ? $offer->image : '' }}" width="100%" />
                                    <div class="overlay-background-color w-100">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>

@endsection
@section('submit.scripts')
    <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>

    <script language="javascript">
        $(document).ready(function(){
            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0');
            var yyyy = today.getFullYear();

            today = yyyy + '-' + mm + '-' + dd;

            $('#date_picker').attr('min',today).attr('value',today);
        });
    </script>

    <script>

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

    </script>
@endsection

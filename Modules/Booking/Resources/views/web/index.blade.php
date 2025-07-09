@extends('web.layouts.base')

@section('pageTitle'){{ $settings['metatitle_booking_page_seo'][app()->getLocale()] ?? __('messages.Book Your Appointment Now') }}@endsection

@section('metaKeys')
    {!! $settings['booking_page_seo'][app()->getLocale()] ?? '' !!}
@endsection

@section('languages')
    <div class="top-bar__block language nav-link gap-0">
        <ul class="list-inline">
            <li class="list-inline-item large-mg">
                <a href="{{ url(app()->getLocale() != 'ar' ? 'book-an-appointment' : 'book-an-appointment?lang=en') }}" class="top-bar__side">
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
    <div class="simple-background offers-page centered-overlay">

        <!-- BEGIN :: include page header -->
        @include('web.components.page_header', ['page_name' => ( $settings['metatitle_booking_page_seo'][app()->getLocale()] ?? __('messages.Book Your Appointment Now') )])
        <!-- END :: include page header -->

        <div class="section-overlay">
            <div class="overlay-background-logo">
                <img src="/web/assets/images/icons/Path 168.svg" alt="doctor" draggable="false">
            </div>
            <section class="about-card d-pad my-0">
                <div class="container position-relative">
                    <form class="form" method="post" action="{{ route('web.booking.store', app()->getLocale() == 'en' ? ['lang' => 'en'] : '') }}">
                        @csrf
                        <div class="row">
                            <input type="hidden" id="ServiceId" name="service" value="{{ $servicesFirst->id ? $servicesFirst->id : '2' }}">
                            <div class="col-md-7 col-12">
                                <div class="section-title align-items-stretch flex-column mb-0">
                                    <h2 class="title mt-2" data-aos="fade-up">
                                        {{ settings()->get('metatitle.book') ? settings()->get('metatitle.book') : __('messages.Book Your Appointment Now') }}
                                    </h2>
                                    <div class="sub-desc mt-2">
                                        {{ $settings['page_booking_content'][app()->getLocale()] ?? '' }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 position-relative">
                                <div class="section-title align-items-stretch mb-3">
                                    <h2 class="h6 mb-0" data-aos="fade-up">
                                        @lang('messages.Personal Information')
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
                            </div>
                            <div class="col-12 col-md-6 position-relative">
                                <div class="section-title align-items-stretch mb-3">
                                    <h2 class="h6 mb-0" data-aos="fade-up">
                                        {{ (app()->getLocale() == 'ar') ? 'بيانات الحجز' : 'Booking Options'}}
                                    </h2>
                                </div>
                                <div class="group-inputs" data-aos="fade-up">
                                    <div class="form-group row d-flex align-items-center">
                                        <label for="service" class="col-lg-3 col-form-label">{{ __('messages.service') }}</label>
                                        <div class="col-lg-9">
                                            <select class="custom-select form-control-secondary" @if($request->doctor == null) onchange="return showDoctors();" @endif  id="bookService" name="speciality" required>
                                                @if($request->doctor == null && $request->speciality == null && $request->branche == null)
                                                    @if(!empty($services))
                                                        <option value="">{{ __('messages.specialityrequired') }}</option>
                                                        @foreach($services as $service)
                                                            <optgroup label="{{ $service->name }}">
                                                                @foreach($service->specialities as $specialit)
                                                                    <option value="{{ $specialit->id }}" {{ $request->speciality == $specialit->id ? 'selected' : '' }}>{{ $specialit->name }}</option>
                                                                @endforeach
                                                            </optgroup>
                                                        @endforeach
                                                    @endif
                                                @else
                                                    @if($request->doctor == null)
                                                        <option value="">{{ __('messages.brancherequired') }}</option>
                                                    @endif
                                                    <optgroup label="{{ $servicesFirst->name }}">
                                                        @foreach($specialities as $specialit)
                                                            <option value="{{ $specialit->id }}" {{ $request->speciality == $specialit->id ? 'selected' : '' }}>{{ $specialit->name }}</option>
                                                        @endforeach
                                                    </optgroup>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row d-flex align-items-center">
                                        <label for="doctor" class="col-lg-3 col-form-label">{{ __('messages.doctor') }}</label>
                                        <div class="col-lg-9">
                                            <select class="custom-select form-control-secondary" onchange="return showAvailableAppointments();" id="bookDoctor" name="doctor_id" required>
                                                @if($request->doctor == null)
                                                    <option value="">{{ __('messages.doctorrequired') }}</option>
                                                    @if(!empty($doctors))
                                                        @foreach($doctors as $doctor)
                                                            <option value="{{ $doctor->id }}" {{ $request->doctor == $doctor->id ? 'selected' : '' }}>{{ $doctor->name }}</option>
                                                        @endforeach
                                                    @endif
                                                @else
                                                    <option value="{{ $GetdoctorId->id }}" {{ $request->doctor == $GetdoctorId->id ? 'selected' : '' }}>{{ $GetdoctorId->name }}</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    {{--<div class="form-group row d-flex align-items-center">
                                        <label for="offerBookDate" class="col-lg-3 col-form-label">{{ (app()->getLocale() == 'ar') ? 'تاريخ الحجز' : 'Booking Date'}}</label>
                                        <div class="col-lg-9">
                                            <input type="date" class="form-control form-control-secondary" id="bookDate" name="attendance_date" value="{{ old('attendance_date') }}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row d-flex align-items-center">
                                        <label for="bookTime" class="col-lg-3 col-form-label">{{ (app()->getLocale() == 'ar') ? 'توقيت الحجز' : 'Booking Timing'}}</label>
                                        <div class="col-lg-9">
                                            <select class="custom-select form-control-secondary" id="bookTime" name="available_time" required>
                                                <option value="">{{ __('messages.timerequired') }}</option>
                                            </select>
                                            @if (request()->get('availability') == 1)
                                                <label for="bookTime" generated="true" class="error">{{ __('messages.Already Booked') }}</label>
                                            @endif
                                        </div>
                                    </div>--}}
                                </div>
                            </div>
                            <div class="col-12 col-md-6 position-relative">
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
                            </div>
                            <!-- <div class="col-12 col-md-6 position-relative">
                                <div class="section-title align-items-stretch mb-3">
                                    <h2 class="h6 mb-0" data-aos="fade-up">
                                        شركة التأمين
                                    </h2>
                                </div>
                                <div class="group-inputs" data-aos="fade-up">
                                    <div class="form-group row d-flex align-items-center">
                                        <label for="company" class="col-lg-3 col-form-label">شركة التأمين</label>
                                        <div class="col-lg-9">
                                            <select class="custom-select form-control-secondary" id="company">
                                                <option disabled="" selected="">إختر شركة التأمين المناسبة لك</option>
                                                <optgroup label="شركة">
                                                    <option value="">شركة</option>
                                                    <option value="">شركة</option>
                                                    <option value="">شركة</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <div class="col-12">
                                <div class="group-inputs" data-aos="fade-up">
                                    <div class="form-group row d-flex mt-4">
                                        <button type="submit" class="btn btn-brand-primary w-auto">
                                            {{ __('messages.Book Your Appointment Now') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
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

            $('#bookDate').attr('min',today).attr('value',today);
        });
    </script>
    <script>

        $(document).ready(function () {
            service_id = $("#ServiceId").val();

            doctorId = $("#bookDoctor option:selected").val();
            branchId = $("#bookBranch option:selected").val();
            specialityId = $("#bookService option:selected").val();
            if(doctorId){
                showAvailableAppointments();

            }else if(branchId){


                showDoctors();

            }else if(specialityId){

                showDoctors();
            }else{
                updateServiceId();
                showDoctors();
            }

        })

        function ResetServices() {
            $('#bookService option:selected').prop('selected', false);
        }

        function updateServiceId() {

            service_id = $("#ServiceId").val();
            doctorId = $("#bookDoctor option:selected").val();
            branchId = $("#bookBranch option:selected").val();
            //empty all seclect

            if(!(doctorId)){
                var select = $("#bookBranch");
                select.empty();
                var content = '<option value="">{{ __('messages.brancherequired') }}</option>';
                select.append(content);
            }
            if(!(doctorId)){
                var selectdoctor = $("#bookDoctor");
                selectdoctor.empty();
                var contentdoctor = '<option value="">{{ __('messages.doctorrequired') }}</option>';
                selectdoctor.append(contentdoctor);
            }
            var selecttime = $("#bookTime");
            selecttime.empty();
            var contenttime = '<option value="">{{ __('messages.timerequired') }}</option>';
            selecttime.append(contenttime);


            if (service_id && !(branchId)) {
                $.ajax({
                    type: 'GET',
                    url: route('api.branches.services', {
                        'lang': '{{ app()->getLocale() }}',
                        'service': service_id
                    }),
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        var select = $("#bookBranch");
                        var selectspecialt = $("#bookService");
                        select.empty();
                        selectspecialt.empty();
                        var content = '<option value="">{{ __('messages.brancherequired') }}</option>';
                        var contentspecialt = '<option value="">{{ __('messages.specialityrequired') }}</option>';
                        select.append(content);
                        selectspecialt.append(contentspecialt);
                        $.each(data.countries, function (index, country) {
                            if(data.branches.length > 0){
                                select.append('<optgroup label="' + country.name + '">');
                            }
                            $.each(data.branches, function (index, branche) {
                                if(country.id == branche.country_id) {
                                    var content = '<option value="' + branche.id + '">' + branche.name + '</option>';
                                    select.append(content);
                                }
                            });
                            if(data.branches.length > 0){
                                select.append('</optgroup>');
                            }
                        });

                    },
                    error: function (data) {
                    }
                });

                $.ajax({
                    type: 'GET',
                    url: route('api.services.specificities', {
                        'lang': '{{ app()->getLocale() }}',
                        'service': service_id
                    }),
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        var selectspecialt = $("#bookService");
                        selectspecialt.empty();
                        var contentspecialt = '<option value="">{{ __('messages.specialityrequired') }}</option>';
                        selectspecialt.append(contentspecialt);
                        if(data.specialities.length > 0){
                            selectspecialt.append('<optgroup label="' + data.services.name + '">');
                        }
                        $.each(data.specialities, function (index, specialit) {
                            var content2 = '<option value="' + specialit.id + '">' + specialit.name + '</option>';
                            selectspecialt.append(content2);
                        });
                        if(data.specialities.length > 0){
                            selectspecialt.append('</optgroup>');
                        }
                        showDoctors();
                    },
                    error: function (data) {
                    }
                });
            }

        }



        function showDoctors() {

            service_id = $("#ServiceId").val();
            specialtId  = $("#bookService option:selected").val();

            if (service_id && specialtId) {

                $.ajax({
                    type: 'GET',
                    url: route('api.specificities.doctors', {
                        'lang': '{{ app()->getLocale() }}',
                        'service': service_id,
                        'specificity': specialtId
                    }),
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        var selectdoctor = $("#bookDoctor");
                        selectdoctor.empty();
                        var contentdoctor = '<option value="">{{ __('messages.doctorrequired') }}</option>';
                        selectdoctor.append(contentdoctor);
                        $.each(data.doctors, function (index, doctor) {
                            var content3 = '<option value="' + doctor.id + '">' + doctor.name + '</option>';
                            selectdoctor.append(content3);
                        });
                        showAvailableAppointments();
                    },
                    error: function (data) {
                    }
                });

            }
        }

        function showAvailableAppointments() {
            doctorId = $("#bookDoctor option:selected").val();
            if (doctorId) {
                $.ajax({
                    type: 'GET',
                    url: route('api.doctors.working.hours', {'doctor': doctorId}),
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        // console.log(data);
                        var selecttime = $("#bookTime");
                        selecttime.empty();
                        var contenttime = '<option value="">{{ __('messages.timerequired') }}</option>';
                        selecttime.append(contenttime);
                        $.each(data, function (index, time) {
                            var contenttime = '<option value="' + time + '">' + time + '</option>';
                            selecttime.append(contenttime);
                        });
                        checkAvailableAppointment();
                    },
                    error: function (data) {
                    }
                });
            }
        }


        function checkAvailableAppointment() {
            doctorId = $("#bookDoctor option:selected").val();
            brancheId = $("#bookBranch option:selected").val();
            date = $("#bookDate").val();
            time = $("#bookTime option:selected").val();

            if (doctorId) {
                $.ajax({
                    type: 'GET',
                    url: route('web.booking.check.availability', {
                        'doctor_id': doctorId,
                        'attendance_date': date,
                        'available_time': time,
                        'branche_id': brancheId
                    }),
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        // console.log(data);
                        if (data == '0') {
                            $("#availability_alert").css('display', 'block');
                        } else {
                            $("#availability_alert").css('display', 'none');
                        }
                    },
                    error: function (data) {
                    }
                });
            }
        }


    </script>
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

    </script>
@endsection


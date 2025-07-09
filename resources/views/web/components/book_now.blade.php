<section class="container-wrapper book-now-container">
    <div class="w-100 book-now m-0">
        <div class="container book-now__elms">
            <div class="book-now__wrapper">
                <div class="w-100">
                    <h2 class="h3" data-aos="fade-up">@lang('messages.book_your_appointment_now_content')</h2>
                </div>
                <div class="w-100 mt-4">
                    <a href="{{ url('book-an-appointment' . ( app()->getLocale() != 'ar' ? ( '/?lang=' . app()->getLocale() ) : '')) }}" class="btn btn-white" data-aos="fade-up">
                        @lang('messages.Book Your Appointment Now')
                    </a>
                </div>
            </div>
            <div class="book-now__img-wrapper">
                <image src="{{ asset('web/assets/images/book-now.png') }}" width="100%" />
            </div>
        </div>
    </div>
</section>

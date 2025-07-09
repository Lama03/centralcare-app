@extends('admin.layout.base')

@section('title')
    Settings
@stop

@push('styles')
    <style>
        .form-control {
            border: 1px solid #c3c4c9;
        }

        .bootstrap-tagsinput .tag {
            background: red;
            padding: 4px;
            font-size: 14px;
        }
        .bootstrap-tagsinput .tag {
            margin: 3px;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css" />
    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" integrity="sha512-xmGTNt20S0t62wHLmQec2DauG9T+owP9e6VU8GigI0anN7OXLip9i7IwEhelasml2osdxX71XcYm6BQunTQeQg==" crossorigin="anonymous" />
@endpush

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="basic-form">
                            <div class="form-row mb-4">
                                <div class="default-tab " style="width: 100%">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#main_setting">
                                                <i class="fa fa-cog mr-1" style="font-size: 13px;"></i>
                                                Main setting
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#textarea_settings">
                                                <i class="fa fa-text-width mr-1" style="font-size: 13px;"></i>
                                                Textarea
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#images_settings">
                                                <i class="fa fa-file-image-o mr-1" style="font-size: 13px;"></i>
                                                Images
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#seo_settings">
                                                <i class="fa fa-search mr-1" style="font-size: 13px;"></i>
                                                SEO
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#terms_and_conditions">
                                                <i class="fa fa-cog mr-1" style="font-size: 13px;"></i>
                                                Terms And Conditions
                                            </a>
                                        </li>
                                    </ul>

                                    <div class="tab-content pt-4 mt-3">
                                        <div class="tab-pane fade active show" id="main_setting" role="tabpanel">
                                            <form class="form" method="POST" action="{{ route('admin.settings.update') }}">
                                                @method('PUT')
                                                @csrf
                                                <div class="pt-4">
                                                    <div class="row mb-3">
                                                        <h4 class="ml-2">Website Name</h4>
                                                        <div class="default-tab " style="width: 100%">
                                                            <ul class="nav nav-tabs" role="tablist">
                                                                @foreach(config('translatable.locales') as $locale)
                                                                    <li class="nav-item">
                                                                        <a class="nav-link {{ $loop->first ? 'active' : '' }} {{ $errors->has("website_name.$locale.value") ? 'text-danger' : '' }}" data-toggle="tab" href="#{{ $locale }}_website_name">
                                                                            {{ $locale == 'en' ? 'English' : 'Arabic' }}
                                                                        </a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                            <div class="tab-content">
                                                                @foreach(config('translatable.locales') as $locale)
                                                                    <div class="tab-pane fade {{ $errors->has("website_name.*") ? ( $errors->has("website_name.$locale.value") ? 'active show' : '' ) : ( $loop->first ? 'active show' : '' ) }}" id="{{ $locale }}_website_name" role="tabpanel">
                                                                        <div class="pt-4">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label class="control-label" for="title">{{ $locale == 'en' ? 'English' : 'Arabic' }} Website Name</label>

                                                                                    <input type="text"
                                                                                           name="website_name[{{ $locale }}][value]"
                                                                                           value="{{ $settings['website_name'][$locale] ?? old("website_name.$locale.value") }}"
                                                                                           class="form-control"
                                                                                           placeholder="{{ $locale == 'en' ? 'English' : 'Arabic' }} Site Name" />

                                                                                    @error("website_name.$locale.value")
                                                                                    <span class="text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <hr>

                                                    <div class="row mb-3">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label" for="phone">Email</label>

                                                                <input type="email"
                                                                       name="email"
                                                                       value="{{ $settings['email'] ?? old('email') }}"
                                                                       class="form-control"
                                                                       placeholder="Email" />

                                                                @error('email')
                                                                <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label" for="phone">Phone</label>

                                                                <input type="text"
                                                                       name="phone"
                                                                       value="{{ $settings['phone'] ?? old('phone') }}"
                                                                       class="form-control"
                                                                       placeholder="Phone" />

                                                                @error('phone')
                                                                <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <hr>

                                                    <div class="row mb-3">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label" for="facebook">
                                                                    <i class="fa fa-facebook"></i>
                                                                    Facebook
                                                                </label>

                                                                <input type="text"
                                                                       name="facebook"
                                                                       value="{{ $settings['facebook'] ?? '' }}"
                                                                       class="form-control"
                                                                       placeholder="Facebook" />
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label" for="twitter">
                                                                    <i class="fa fa-twitter"></i>
                                                                    Twitter
                                                                </label>

                                                                <input type="text"
                                                                       name="twitter"
                                                                       value="{{ $settings['twitter'] ?? '' }}"
                                                                       class="form-control"
                                                                       placeholder="Twitter" />
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label" for="instagram">
                                                                    <i class="fa fa-instagram"></i>
                                                                    Instagram
                                                                </label>

                                                                <input type="text"
                                                                       name="instagram"
                                                                       value="{{ $settings['instagram'] ?? '' }}"
                                                                       class="form-control"
                                                                       placeholder="Instagram" />
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label" for="snapchat">
                                                                    <i class="fa fa-snapchat"></i>
                                                                    Snapchat
                                                                </label>

                                                                <input type="text"
                                                                       name="snapchat"
                                                                       value="{{ $settings['snapchat'] ?? '' }}"
                                                                       class="form-control"
                                                                       placeholder="Snapchat" />
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label" for="youtube">
                                                                    <i class="fa fa-youtube"></i>
                                                                    Youtube
                                                                </label>

                                                                <input type="text"
                                                                       name="youtube"
                                                                       value="{{ $settings['youtube'] ?? '' }}"
                                                                       class="form-control"
                                                                       placeholder="Youtube" />
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label" for="linkedin">
                                                                    <i class="fa fa-linkedin"></i>
                                                                    Linkedin
                                                                </label>

                                                                <input type="text"
                                                                       name="linkedin"
                                                                       value="{{ $settings['linkedin'] ?? '' }}"
                                                                       class="form-control"
                                                                       placeholder="Linkedin" />
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label" for="linkedin">Tiktok</label>

                                                                <input type="text"
                                                                       name="tiktok"
                                                                       value="{{ $settings['tiktok'] ?? '' }}"
                                                                       class="form-control"
                                                                       placeholder="Tiktok" />
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label" for="linkedin">
                                                                    <i class="fa fa-whatsapp"></i>
                                                                    Whatsapp
                                                                </label>

                                                                <input type="text"
                                                                       name="whatsapp"
                                                                       value="{{ $settings['whatsapp'] ?? '' }}"
                                                                       class="form-control"
                                                                       placeholder="Whatsapp" />
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <hr>

                                                    <div class="row mb-3">
                                                        <h4 class="ml-2">Address</h4>
                                                        <div class="default-tab " style="width: 100%">
                                                            <ul class="nav nav-tabs" role="tablist">
                                                                @foreach(config('translatable.locales') as $locale)
                                                                    <li class="nav-item">
                                                                        <a class="nav-link {{ $errors->has("address.*") ? ( $errors->has("website_name.$locale.value") ? 'active text-danger' : '' ) : ( $loop->first ? 'active' : '' ) }}" data-toggle="tab" href="#{{ $locale }}_address">
                                                                            {{ $locale == 'en' ? 'English' : 'Arabic' }}
                                                                        </a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                            <div class="tab-content">
                                                                @foreach(config('translatable.locales') as $locale)
                                                                    <div class="tab-pane fade {{ $loop->first ? "active show" : '' }}" id="{{ $locale }}_address" role="tabpanel">
                                                                        <div class="pt-4">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label class="control-label">{{ $locale == 'en' ? 'English' : 'Arabic' }} Address</label>

                                                                                    <input type="text"
                                                                                           name="address[{{ $locale }}][value]"
                                                                                           value="{{ $settings['address'][$locale] ?? old("address.$locale.value") }}"
                                                                                           class="form-control"
                                                                                           placeholder="{{ $locale == 'en' ? 'English' : 'Arabic' }} address" />
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <hr>

                                                    <div class="row mb-3">
                                                        <h4 class="ml-2">Working Days</h4>
                                                        <div class="default-tab " style="width: 100%">
                                                            <ul class="nav nav-tabs" role="tablist">
                                                                @foreach(config('translatable.locales') as $locale)
                                                                    <li class="nav-item">
                                                                        <a class="nav-link {{ $loop->first ? 'active' : '' }}" data-toggle="tab" href="#{{ $locale }}_working_days">
                                                                            {{ $locale == 'en' ? 'English' : 'Arabic' }}
                                                                        </a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                            <div class="tab-content">
                                                                @foreach(config('translatable.locales') as $locale)
                                                                    <div class="tab-pane fade {{ $loop->first ? "active show" : '' }}" id="{{ $locale }}_working_days" role="tabpanel">
                                                                        <div class="pt-4">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label class="control-label">{{ $locale == 'en' ? 'English' : 'Arabic' }} working days</label>

                                                                                    <input type="text"
                                                                                           name="working_days[{{ $locale }}][value]"
                                                                                           value="{{ $settings['working_days'][$locale] ?? old("working_days.$locale.value") }}"
                                                                                           class="form-control"
                                                                                           placeholder="{{ $locale == 'en' ? 'English' : 'Arabic' }} working days" />
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <hr>

                                                    <div class="row mb-3">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="control-label" for="working_time">
                                                                    working time
                                                                </label>

                                                                <input type="text"
                                                                       name="working_time"
                                                                       value="{{ $settings['working_time'] ?? '' }}"
                                                                       class="form-control"
                                                                       placeholder="Working Time" />
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <hr>

                                                    <div class="row mb-3">
                                                        <h4 class="ml-2">Day Off</h4>
                                                        <div class="default-tab " style="width: 100%">
                                                            <ul class="nav nav-tabs" role="tablist">
                                                                @foreach(config('translatable.locales') as $locale)
                                                                    <li class="nav-item">
                                                                        <a class="nav-link {{ $loop->first ? 'active' : '' }}" data-toggle="tab" href="#{{ $locale }}_day_off">
                                                                            {{ $locale == 'en' ? 'English' : 'Arabic' }}
                                                                        </a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                            <div class="tab-content">
                                                                @foreach(config('translatable.locales') as $locale)
                                                                    <div class="tab-pane fade {{ $loop->first ? "active show" : '' }}" id="{{ $locale }}_day_off" role="tabpanel">
                                                                        <div class="pt-4">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label class="control-label">{{ $locale == 'en' ? 'English' : 'Arabic' }} Day Off</label>

                                                                                    <input type="text"
                                                                                           name="day_off[{{ $locale }}][value]"
                                                                                           value="{{ $settings['day_off'][$locale] ?? old("day_off.$locale.value") }}"
                                                                                           class="form-control"
                                                                                           placeholder="{{ $locale == 'en' ? 'English' : 'Arabic' }} Day Off" />
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <hr>

                                                    <div class="row mb-3">
                                                        <h4 class="ml-2">Copyright</h4>
                                                        <div class="default-tab " style="width: 100%">
                                                            <ul class="nav nav-tabs" role="tablist">
                                                                @foreach(config('translatable.locales') as $locale)
                                                                    <li class="nav-item">
                                                                        <a class="nav-link {{ $loop->first ? 'active' : '' }}" data-toggle="tab" href="#{{ $locale }}_copyright">
                                                                            {{ $locale == 'en' ? 'English' : 'Arabic' }}
                                                                        </a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                            <div class="tab-content">
                                                                @foreach(config('translatable.locales') as $locale)
                                                                    <div class="tab-pane fade {{ $loop->first ? "active show" : '' }}" id="{{ $locale }}_copyright" role="tabpanel">
                                                                        <div class="pt-4">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label class="control-label">{{ $locale == 'en' ? 'English' : 'Arabic' }} Copyright</label>

                                                                                    <input type="text"
                                                                                           name="copyright[{{ $locale }}][value]"
                                                                                           value="{{ $settings['copyright'][$locale] ?? old("copyright.$locale.value") }}"
                                                                                           class="form-control"
                                                                                           placeholder="{{ $locale == 'en' ? 'English' : 'Arabic' }} Copyright" />
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <hr>

                                                    <div class="row mb-3">
                                                        <h4 class="ml-2">Right Now System</h4>
                                                        <div class="default-tab " style="width: 100%">
                                                            <ul class="nav nav-tabs" role="tablist">
                                                                @foreach(config('translatable.locales') as $locale)
                                                                    <li class="nav-item">
                                                                        <a class="nav-link {{ $loop->first ? 'active' : '' }}" data-toggle="tab" href="#{{ $locale }}_token_api">
                                                                            {{ $locale == 'en' ? 'English' : 'Arabic' }}
                                                                        </a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                            <div class="tab-content">
                                                                @foreach(config('translatable.locales') as $locale)
                                                                    <div class="tab-pane fade {{ $loop->first ? "active show" : '' }}" id="{{ $locale }}_token_api" role="tabpanel">
                                                                        <div class="pt-4">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label class="control-label">{{ $locale == 'en' ? 'English' : 'Arabic' }} Integration REST Token</label>

                                                                                    <input type="text"
                                                                                           name="token_api[{{ $locale }}][value]"
                                                                                           value="{{ $settings['token_api'][$locale] ?? old("token_api.$locale.value") }}"
                                                                                           class="form-control"
                                                                                           placeholder="{{ $locale == 'en' ? 'English' : 'Arabic' }} Token" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label class="control-label">{{ $locale == 'en' ? 'English' : 'Arabic' }} Integration REST URL</label>

                                                                                    <input type="text"
                                                                                           name="url_api[{{ $locale }}][value]"
                                                                                           value="{{ $settings['url_api'][$locale] ?? old("url_api.$locale.value") }}"
                                                                                           class="form-control"
                                                                                           placeholder="{{ $locale == 'en' ? 'English' : 'Arabic' }} Url" />
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <hr>

                                                    <div class="row mb-3">
                                                        <h4 class="ml-2">Salesiq Code</h4>
                                                        <div class="default-tab " style="width: 100%">
                                                            <ul class="nav nav-tabs" role="tablist">
                                                                @foreach(config('translatable.locales') as $locale)
                                                                    <li class="nav-item">
                                                                        <a class="nav-link {{ $loop->first ? 'active' : '' }}" data-toggle="tab" href="#{{ $locale }}_salesiq">
                                                                            {{ $locale == 'en' ? 'English' : 'Arabic' }}
                                                                        </a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                            <div class="tab-content">
                                                                @foreach(config('translatable.locales') as $locale)
                                                                    <div class="tab-pane fade {{ $loop->first ? "active show" : '' }}" id="{{ $locale }}_salesiq" role="tabpanel">
                                                                        <div class="pt-4">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label class="control-label">{{ $locale == 'en' ? 'English' : 'Arabic' }} Salesiq Code</label>

                                                                                    <textarea type="text"
                                                                                           name="salesiq[{{ $locale }}][value]" rows="4"
                                                                                           class="form-control"
                                                                                           placeholder="{{ $locale == 'en' ? 'English' : 'Arabic' }} Token" >{{ $settings['salesiq'][$locale] ?? old("salesiq.$locale.value") }}</textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <hr>

                                                    <div class="row mb-3">
                                                        <h4 class="ml-2">Terms and Conditions</h4>
                                                        <div class="default-tab " style="width: 100%">
                                                            <ul class="nav nav-tabs" role="tablist">
                                                                @foreach(config('translatable.locales') as $locale)
                                                                    <li class="nav-item">
                                                                        <a class="nav-link {{ $loop->first ? 'active' : '' }}" data-toggle="tab" href="#{{ $locale }}_terms">
                                                                            {{ $locale == 'en' ? 'English' : 'Arabic' }}
                                                                        </a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                            <div class="tab-content">
                                                                @foreach(config('translatable.locales') as $locale)
                                                                    <div class="tab-pane fade {{ $loop->first ? "active show" : '' }}" id="{{ $locale }}_terms" role="tabpanel">
                                                                        <div class="pt-4">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label class="control-label">{{ $locale == 'en' ? 'English' : 'Arabic' }} Terms and Conditions</label>

                                                                                    <textarea type="text"
                                                                                           name="terms_content[{{ $locale }}][value]" rows="7"
                                                                                           class="form-control"
                                                                                           placeholder="{{ $locale == 'en' ? 'English' : 'Arabic' }} Token" >{{ $settings['terms_content'][$locale] ?? old("terms_content.$locale.value") }}</textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <hr>

                                                    <div class="row mb-3">
                                                        <h4 class="ml-2">Any Code All Pges Header</h4>
                                                        <div class="default-tab " style="width: 100%">
                                                            <ul class="nav nav-tabs" role="tablist">
                                                                @foreach(config('translatable.locales') as $locale)
                                                                    <li class="nav-item">
                                                                        <a class="nav-link {{ $loop->first ? 'active' : '' }}" data-toggle="tab" href="#{{ $locale }}_code_head">
                                                                            {{ $locale == 'en' ? 'English' : 'Arabic' }}
                                                                        </a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                            <div class="tab-content">
                                                                @foreach(config('translatable.locales') as $locale)
                                                                    <div class="tab-pane fade {{ $loop->first ? "active show" : '' }}" id="{{ $locale }}_code_head" role="tabpanel">
                                                                        <div class="pt-4">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label class="control-label">{{ $locale == 'en' ? 'English' : 'Arabic' }} Code All Pges Header</label>

                                                                                    <textarea type="text"
                                                                                           name="code_head[{{ $locale }}][value]" rows="7"
                                                                                           class="form-control"
                                                                                           placeholder="{{ $locale == 'en' ? 'English' : 'Arabic' }} Token" >{{ $settings['code_head'][$locale] ?? old("code_head.$locale.value") }}</textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <hr>

                                                    <div class="row mb-3">
                                                        <h4 class="ml-2">Any Code All Pges Footer</h4>
                                                        <div class="default-tab " style="width: 100%">
                                                            <ul class="nav nav-tabs" role="tablist">
                                                                @foreach(config('translatable.locales') as $locale)
                                                                    <li class="nav-item">
                                                                        <a class="nav-link {{ $loop->first ? 'active' : '' }}" data-toggle="tab" href="#{{ $locale }}_code_foot">
                                                                            {{ $locale == 'en' ? 'English' : 'Arabic' }}
                                                                        </a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                            <div class="tab-content">
                                                                @foreach(config('translatable.locales') as $locale)
                                                                    <div class="tab-pane fade {{ $loop->first ? "active show" : '' }}" id="{{ $locale }}_code_foot" role="tabpanel">
                                                                        <div class="pt-4">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label class="control-label">{{ $locale == 'en' ? 'English' : 'Arabic' }} Code All Pges Footer</label>

                                                                                    <textarea type="text"
                                                                                           name="code_foot[{{ $locale }}][value]" rows="7"
                                                                                           class="form-control"
                                                                                           placeholder="{{ $locale == 'en' ? 'English' : 'Arabic' }} Token" >{{ $settings['code_foot'][$locale] ?? old("code_foot.$locale.value") }}</textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <hr>

                                                    <button type="submit" class="btn btn-primary btn-block">Save</button>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="tab-pane fade" id="textarea_settings" role="tabpanel">
                                            <form class="form" method="POST" action="{{ route('admin.settings.update') }}">
                                                @method('PUT')
                                                @csrf
                                                <div class="pt-4">
                                                    <div class="row mb-3">
                                                        <div class="col-md-6">
                                                            <h4 class="ml-2">About us title home page</h4>
                                                            <div class="default-tab " style="width: 100%">
                                                                <ul class="nav nav-tabs" role="tablist">
                                                                    @foreach(config('translatable.locales') as $locale)
                                                                        <li class="nav-item">
                                                                            <a class="nav-link {{ $loop->first ? 'active' : '' }}" data-toggle="tab" href="#{{ $locale }}_about_us_title">
                                                                                {{ $locale == 'en' ? 'English' : 'Arabic' }}
                                                                            </a>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                                <div class="tab-content">
                                                                    @foreach(config('translatable.locales') as $locale)
                                                                        <div class="tab-pane fade {{ $loop->first ? "active show" : '' }}" id="{{ $locale }}_about_us_title" role="tabpanel">
                                                                            <div class="pt-4">
                                                                                <div class="col-md-12">
                                                                                    <div class="form-group">
                                                                                        <label class="control-label">{{ $locale == 'en' ? 'English' : 'Arabic' }} About us title</label>

                                                                                        <textarea name="about_us_title[{{ $locale }}][value]"
                                                                                                  rows="4"
                                                                                                  class="form-control"
                                                                                                  placeholder="{{ $locale == 'en' ? 'English' : 'Arabic' }} About us title">{{ $settings['about_us_title'][$locale] ?? old("about_us_title.$locale.value") }}</textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="col-md-6">
                                                            <h4 class="ml-2">About us content home page</h4>
                                                            <div class="default-tab " style="width: 100%">
                                                                <ul class="nav nav-tabs" role="tablist">
                                                                    @foreach(config('translatable.locales') as $locale)
                                                                        <li class="nav-item">
                                                                            <a class="nav-link {{ $loop->first ? 'active' : '' }}" data-toggle="tab" href="#{{ $locale }}_about_us_content">
                                                                                {{ $locale == 'en' ? 'English' : 'Arabic' }}
                                                                            </a>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                                <div class="tab-content">
                                                                    @foreach(config('translatable.locales') as $locale)
                                                                        <div class="tab-pane fade {{ $loop->first ? "active show" : '' }}" id="{{ $locale }}_about_us_content" role="tabpanel">
                                                                            <div class="pt-4">
                                                                                <div class="col-md-12">
                                                                                    <div class="form-group">
                                                                                        <label class="control-label">{{ $locale == 'en' ? 'English' : 'Arabic' }} About us Content</label>

                                                                                        <textarea name="about_us_content[{{ $locale }}][value]"
                                                                                                  rows="4"
                                                                                                  class="form-control"
                                                                                                  placeholder="{{ $locale == 'en' ? 'English' : 'Arabic' }} About us Content">{{ $settings['about_us_content'][$locale] ?? old("about_us_content.$locale.value") }}</textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <hr>

                                                    <div class="row mb-3">
                                                        <h4 class="ml-2">Our services home page</h4>
                                                        <div class="default-tab " style="width: 100%">
                                                            <ul class="nav nav-tabs" role="tablist">
                                                                @foreach(config('translatable.locales') as $locale)
                                                                    <li class="nav-item">
                                                                        <a class="nav-link {{ $loop->first ? 'active' : '' }}" data-toggle="tab" href="#{{ $locale }}_our_services_content">
                                                                            {{ $locale == 'en' ? 'English' : 'Arabic' }}
                                                                        </a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                            <div class="tab-content">
                                                                @foreach(config('translatable.locales') as $locale)
                                                                    <div class="tab-pane fade {{ $loop->first ? "active show" : '' }}" id="{{ $locale }}_our_services_content" role="tabpanel">
                                                                        <div class="pt-4">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label class="control-label">{{ $locale == 'en' ? 'English' : 'Arabic' }} Our services Content</label>

                                                                                    <textarea name="our_services_content[{{ $locale }}][value]"
                                                                                              rows="4"
                                                                                              class="form-control"
                                                                                              placeholder="{{ $locale == 'en' ? 'English' : 'Arabic' }} Our services Content">{{ $settings['our_services_content'][$locale] ?? old("our_services_content.$locale.value") }}</textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <hr>

                                                    <div class="row mb-3">
                                                        <h4 class="ml-2">Devices page content</h4>
                                                        <div class="default-tab " style="width: 100%">
                                                            <ul class="nav nav-tabs" role="tablist">
                                                                @foreach(config('translatable.locales') as $locale)
                                                                    <li class="nav-item">
                                                                        <a class="nav-link {{ $loop->first ? 'active' : '' }}" data-toggle="tab" href="#{{ $locale }}_devices_content">
                                                                            {{ $locale == 'en' ? 'English' : 'Arabic' }}
                                                                        </a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                            <div class="tab-content">
                                                                @foreach(config('translatable.locales') as $locale)
                                                                    <div class="tab-pane fade {{ $loop->first ? "active show" : '' }}" id="{{ $locale }}_devices_content" role="tabpanel">
                                                                        <div class="pt-4">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label class="control-label">{{ $locale == 'en' ? 'English' : 'Arabic' }} Devices Content</label>

                                                                                    <textarea name="devices_content[{{ $locale }}][value]"
                                                                                              rows="4"
                                                                                              class="form-control"
                                                                                              placeholder="{{ $locale == 'en' ? 'English' : 'Arabic' }} Devices Content">{{ $settings['devices_content'][$locale] ?? old("devices_content.$locale.value") }}</textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <hr>

                                                    <div class="row mb-3">
                                                        <h4 class="ml-2">News and events page content</h4>
                                                        <div class="default-tab " style="width: 100%">
                                                            <ul class="nav nav-tabs" role="tablist">
                                                                @foreach(config('translatable.locales') as $locale)
                                                                    <li class="nav-item">
                                                                        <a class="nav-link {{ $loop->first ? 'active' : '' }}" data-toggle="tab" href="#{{ $locale }}_news_and_events_content">
                                                                            {{ $locale == 'en' ? 'English' : 'Arabic' }}
                                                                        </a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                            <div class="tab-content">
                                                                @foreach(config('translatable.locales') as $locale)
                                                                    <div class="tab-pane fade {{ $loop->first ? "active show" : '' }}" id="{{ $locale }}_news_and_events_content" role="tabpanel">
                                                                        <div class="pt-4">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label class="control-label">{{ $locale == 'en' ? 'English' : 'Arabic' }} news and events content</label>

                                                                                    <textarea name="news_and_events_content[{{ $locale }}][value]"
                                                                                              rows="4"
                                                                                              class="form-control"
                                                                                              placeholder="{{ $locale == 'en' ? 'English' : 'Arabic' }} Devices Content">{{ $settings['news_and_events_content'][$locale] ?? old("news_and_events_content.$locale.value") }}</textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <hr>

                                                    <div class="row mb-3">
                                                        <h4 class="ml-2">Doctor content home page</h4>
                                                        <div class="default-tab " style="width: 100%">
                                                            <ul class="nav nav-tabs" role="tablist">
                                                                @foreach(config('translatable.locales') as $locale)
                                                                    <li class="nav-item">
                                                                        <a class="nav-link {{ $loop->first ? 'active' : '' }}" data-toggle="tab" href="#{{ $locale }}_doctor_content">
                                                                            {{ $locale == 'en' ? 'English' : 'Arabic' }}
                                                                        </a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                            <div class="tab-content">
                                                                @foreach(config('translatable.locales') as $locale)
                                                                    <div class="tab-pane fade {{ $loop->first ? "active show" : '' }}" id="{{ $locale }}_doctor_content" role="tabpanel">
                                                                        <div class="pt-4">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label class="control-label">{{ $locale == 'en' ? 'English' : 'Arabic' }} Doctor Content</label>

                                                                                    <textarea name="doctor_content[{{ $locale }}][value]"
                                                                                              rows="4"
                                                                                              class="form-control"
                                                                                              placeholder="{{ $locale == 'en' ? 'English' : 'Arabic' }} Doctor Content">{{ $settings['doctor_content'][$locale] ?? old("doctor_content.$locale.value") }}</textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <hr>

                                                    <div class="row mb-3">
                                                        <h4 class="ml-2">cases page content</h4>
                                                        <div class="default-tab " style="width: 100%">
                                                            <ul class="nav nav-tabs" role="tablist">
                                                                @foreach(config('translatable.locales') as $locale)
                                                                    <li class="nav-item">
                                                                        <a class="nav-link {{ $loop->first ? 'active' : '' }}" data-toggle="tab" href="#{{ $locale }}_cases_page_content">
                                                                            {{ $locale == 'en' ? 'English' : 'Arabic' }}
                                                                        </a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                            <div class="tab-content">
                                                                @foreach(config('translatable.locales') as $locale)
                                                                    <div class="tab-pane fade {{ $loop->first ? "active show" : '' }}" id="{{ $locale }}_cases_page_content" role="tabpanel">
                                                                        <div class="pt-4">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label class="control-label">{{ $locale == 'en' ? 'English' : 'Arabic' }} cases page content</label>

                                                                                    <textarea name="cases_page_content[{{ $locale }}][value]"
                                                                                              rows="4"
                                                                                              class="form-control"
                                                                                              placeholder="{{ $locale == 'en' ? 'English' : 'Arabic' }} cases page content">{{ $settings['cases_page_content'][$locale] ?? old("cases_page_content.$locale.value") }}</textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <hr>

                                                    <div class="row mb-3">
                                                        <h4 class="ml-2">review content home page</h4>
                                                        <div class="default-tab " style="width: 100%">
                                                            <ul class="nav nav-tabs" role="tablist">
                                                                @foreach(config('translatable.locales') as $locale)
                                                                    <li class="nav-item">
                                                                        <a class="nav-link {{ $loop->first ? 'active' : '' }}" data-toggle="tab" href="#{{ $locale }}_review_content">
                                                                            {{ $locale == 'en' ? 'English' : 'Arabic' }}
                                                                        </a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                            <div class="tab-content">
                                                                @foreach(config('translatable.locales') as $locale)
                                                                    <div class="tab-pane fade {{ $loop->first ? "active show" : '' }}" id="{{ $locale }}_review_content" role="tabpanel">
                                                                        <div class="pt-4">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label class="control-label">{{ $locale == 'en' ? 'English' : 'Arabic' }} review home Content</label>

                                                                                    <textarea name="review_content[{{ $locale }}][value]"
                                                                                              rows="4"
                                                                                              class="form-control"
                                                                                              placeholder="{{ $locale == 'en' ? 'English' : 'Arabic' }} review home Content">{{ $settings['review_content'][$locale] ?? old("review_content.$locale.value") }}</textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <hr>

                                                    <div class="row mb-3">
                                                        <h4 class="ml-2">Articles content home page</h4>
                                                        <div class="default-tab " style="width: 100%">
                                                            <ul class="nav nav-tabs" role="tablist">
                                                                @foreach(config('translatable.locales') as $locale)
                                                                    <li class="nav-item">
                                                                        <a class="nav-link {{ $loop->first ? 'active' : '' }}" data-toggle="tab" href="#{{ $locale }}_articles_content">
                                                                            {{ $locale == 'en' ? 'English' : 'Arabic' }}
                                                                        </a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                            <div class="tab-content">
                                                                @foreach(config('translatable.locales') as $locale)
                                                                    <div class="tab-pane fade {{ $loop->first ? "active show" : '' }}" id="{{ $locale }}_articles_content" role="tabpanel">
                                                                        <div class="pt-4">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label class="control-label">{{ $locale == 'en' ? 'English' : 'Arabic' }} Articles Content</label>

                                                                                    <textarea name="articles_content[{{ $locale }}][value]"
                                                                                              rows="4"
                                                                                              class="form-control"
                                                                                              placeholder="{{ $locale == 'en' ? 'English' : 'Arabic' }} Articles Content">{{ $settings['articles_content'][$locale] ?? old("articles_content.$locale.value") }}</textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <hr>

                                                    <div class="row mb-3">
                                                        <h4 class="ml-2">Insurance Companies content home page</h4>
                                                        <div class="default-tab " style="width: 100%">
                                                            <ul class="nav nav-tabs" role="tablist">
                                                                @foreach(config('translatable.locales') as $locale)
                                                                    <li class="nav-item">
                                                                        <a class="nav-link {{ $loop->first ? 'active' : '' }}" data-toggle="tab" href="#{{ $locale }}_insurance_companies">
                                                                            {{ $locale == 'en' ? 'English' : 'Arabic' }}
                                                                        </a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                            <div class="tab-content">
                                                                @foreach(config('translatable.locales') as $locale)
                                                                    <div class="tab-pane fade {{ $loop->first ? "active show" : '' }}" id="{{ $locale }}_insurance_companies" role="tabpanel">
                                                                        <div class="pt-4">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label class="control-label">{{ $locale == 'en' ? 'English' : 'Arabic' }} Insurance Companies Content</label>

                                                                                    <textarea name="insurance_companies[{{ $locale }}][value]"
                                                                                              rows="4"
                                                                                              class="form-control"
                                                                                              placeholder="{{ $locale == 'en' ? 'English' : 'Arabic' }} Insurance Companies Content">{{ $settings['insurance_companies'][$locale] ?? old("insurance_companies.$locale.value") }}</textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <hr>

                                                    <div class="row mb-3">
                                                        <h4 class="ml-2">About US page title</h4>
                                                        <div class="default-tab " style="width: 100%">
                                                            <ul class="nav nav-tabs" role="tablist">
                                                                @foreach(config('translatable.locales') as $locale)
                                                                    <li class="nav-item">
                                                                        <a class="nav-link {{ $loop->first ? 'active' : '' }}" data-toggle="tab" href="#{{ $locale }}_about_us_page_title">
                                                                            {{ $locale == 'en' ? 'English' : 'Arabic' }}
                                                                        </a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                            <div class="tab-content">
                                                                @foreach(config('translatable.locales') as $locale)
                                                                    <div class="tab-pane fade {{ $loop->first ? "active show" : '' }}" id="{{ $locale }}_about_us_page_title" role="tabpanel">
                                                                        <div class="pt-4">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label class="control-label">{{ $locale == 'en' ? 'English' : 'Arabic' }} About US page title</label>

                                                                                    <textarea name="about_us_page_title[{{ $locale }}][value]"
                                                                                              rows="4"
                                                                                              class="form-control"
                                                                                              placeholder="{{ $locale == 'en' ? 'English' : 'Arabic' }} About US page title">{{ $settings['about_us_page_title'][$locale] ?? old("about_us_page_title.$locale.value") }}</textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <hr>

                                                    <div class="row mb-3">
                                                        <h4 class="ml-2">About US page content</h4>
                                                        <div class="default-tab " style="width: 100%">
                                                            <ul class="nav nav-tabs" role="tablist">
                                                                @foreach(config('translatable.locales') as $locale)
                                                                    <li class="nav-item">
                                                                        <a class="nav-link {{ $loop->first ? 'active' : '' }}" data-toggle="tab" href="#{{ $locale }}_about_us_page_content">
                                                                            {{ $locale == 'en' ? 'English' : 'Arabic' }}
                                                                        </a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                            <div class="tab-content">
                                                                @foreach(config('translatable.locales') as $locale)
                                                                    <div class="tab-pane fade {{ $loop->first ? "active show" : '' }}" id="{{ $locale }}_about_us_page_content" role="tabpanel">
                                                                        <div class="pt-4">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label class="control-label">{{ $locale == 'en' ? 'English' : 'Arabic' }} About US page content</label>

                                                                                    <textarea name="about_us_page_content[{{ $locale }}][value]"
                                                                                              rows="6"
                                                                                              id="summernote_aboutus_{{ $locale }}"
                                                                                              class="form-control"
                                                                                              placeholder="{{ $locale == 'en' ? 'English' : 'Arabic' }} About US page content">{!! $settings['about_us_page_content'][$locale] ?? old("about_us_page_content.$locale.value") !!}</textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <hr>

                                                    <div class="row mb-3">
                                                        <div class="col-md-6">
                                                            <h4 class="ml-2">Message Content</h4>
                                                            <div class="default-tab " style="width: 100%">
                                                                <ul class="nav nav-tabs" role="tablist">
                                                                    @foreach(config('translatable.locales') as $locale)
                                                                        <li class="nav-item">
                                                                            <a class="nav-link {{ $loop->first ? 'active' : '' }}" data-toggle="tab" href="#{{ $locale }}_mission">
                                                                                {{ $locale == 'en' ? 'English' : 'Arabic' }}
                                                                            </a>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                                <div class="tab-content">
                                                                    @foreach(config('translatable.locales') as $locale)
                                                                        <div class="tab-pane fade {{ $loop->first ? "active show" : '' }}" id="{{ $locale }}_mission" role="tabpanel">
                                                                            <div class="pt-4">
                                                                                <div class="col-md-12">
                                                                                    <div class="form-group">
                                                                                        <label class="control-label">{{ $locale == 'en' ? 'English' : 'Arabic' }} Mission Content</label>

                                                                                        <textarea name="about_message[{{ $locale }}][value]"
                                                                                                  rows="6"
                                                                                                  class="form-control"
                                                                                                  placeholder="{{ $locale == 'en' ? 'English' : 'Arabic' }} Mission Content">{{ $settings['about_message'][$locale] ?? old("about_message.$locale.value") }}</textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <h4 class="ml-2">Vision Content</h4>
                                                            <div class="default-tab " style="width: 100%">
                                                                <ul class="nav nav-tabs" role="tablist">
                                                                    @foreach(config('translatable.locales') as $locale)
                                                                        <li class="nav-item">
                                                                            <a class="nav-link {{ $loop->first ? 'active' : '' }}" data-toggle="tab" href="#{{ $locale }}_vision">
                                                                                {{ $locale == 'en' ? 'English' : 'Arabic' }}
                                                                            </a>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                                <div class="tab-content">
                                                                    @foreach(config('translatable.locales') as $locale)
                                                                        <div class="tab-pane fade {{ $loop->first ? "active show" : '' }}" id="{{ $locale }}_vision" role="tabpanel">
                                                                            <div class="pt-4">
                                                                                <div class="col-md-12">
                                                                                    <div class="form-group">
                                                                                        <label class="control-label">{{ $locale == 'en' ? 'English' : 'Arabic' }} Vision Content</label>

                                                                                        <textarea name="about_vision[{{ $locale }}][value]"
                                                                                                  rows="6"
                                                                                                  class="form-control"
                                                                                                  placeholder="{{ $locale == 'en' ? 'English' : 'Arabic' }} Vision Content">{{ $settings['about_vision'][$locale] ?? old("about_vision.$locale.value") }}</textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <hr>

                                                    <div class="row mb-3">
                                                        <h4 class="ml-2">Footer content</h4>
                                                        <div class="default-tab " style="width: 100%">
                                                            <ul class="nav nav-tabs" role="tablist">
                                                                @foreach(config('translatable.locales') as $locale)
                                                                    <li class="nav-item">
                                                                        <a class="nav-link {{ $loop->first ? 'active' : '' }}" data-toggle="tab" href="#{{ $locale }}_footer_content">
                                                                            {{ $locale == 'en' ? 'English' : 'Arabic' }}
                                                                        </a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                            <div class="tab-content">
                                                                @foreach(config('translatable.locales') as $locale)
                                                                    <div class="tab-pane fade {{ $loop->first ? "active show" : '' }}" id="{{ $locale }}_footer_content" role="tabpanel">
                                                                        <div class="pt-4">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label class="control-label">{{ $locale == 'en' ? 'English' : 'Arabic' }} Footer content</label>

                                                                                    <textarea name="footer_content[{{ $locale }}][value]"
                                                                                              rows="4"
                                                                                              class="form-control"
                                                                                              placeholder="{{ $locale == 'en' ? 'English' : 'Arabic' }} Footer content">{!! $settings['footer_content'][$locale] ?? old("footer_content.$locale.value") !!}</textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <hr>

                                                    <div class="row mb-3">
                                                        <h4 class="ml-2">Page Booking content</h4>
                                                        <div class="default-tab " style="width: 100%">
                                                            <ul class="nav nav-tabs" role="tablist">
                                                                @foreach(config('translatable.locales') as $locale)
                                                                    <li class="nav-item">
                                                                        <a class="nav-link {{ $loop->first ? 'active' : '' }}" data-toggle="tab" href="#{{ $locale }}_page_booking_content">
                                                                            {{ $locale == 'en' ? 'English' : 'Arabic' }}
                                                                        </a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                            <div class="tab-content">
                                                                @foreach(config('translatable.locales') as $locale)
                                                                    <div class="tab-pane fade {{ $loop->first ? "active show" : '' }}" id="{{ $locale }}_page_booking_content" role="tabpanel">
                                                                        <div class="pt-4">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label class="control-label">{{ $locale == 'en' ? 'English' : 'Arabic' }} Page Booking content</label>

                                                                                    <textarea name="page_booking_content[{{ $locale }}][value]"
                                                                                              rows="4"
                                                                                              class="form-control"
                                                                                              placeholder="{{ $locale == 'en' ? 'English' : 'Arabic' }} Page Booking content">{!! $settings['page_booking_content'][$locale] ?? old("page_booking_content.$locale.value") !!}</textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <hr>

                                                    <div class="row mb-3">
                                                        <h4 class="ml-2">Page Offer content</h4>
                                                        <div class="default-tab " style="width: 100%">
                                                            <ul class="nav nav-tabs" role="tablist">
                                                                @foreach(config('translatable.locales') as $locale)
                                                                    <li class="nav-item">
                                                                        <a class="nav-link {{ $loop->first ? 'active' : '' }}" data-toggle="tab" href="#{{ $locale }}_page_offer_content">
                                                                            {{ $locale == 'en' ? 'English' : 'Arabic' }}
                                                                        </a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                            <div class="tab-content">
                                                                @foreach(config('translatable.locales') as $locale)
                                                                    <div class="tab-pane fade {{ $loop->first ? "active show" : '' }}" id="{{ $locale }}_page_offer_content" role="tabpanel">
                                                                        <div class="pt-4">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label class="control-label">{{ $locale == 'en' ? 'English' : 'Arabic' }} Page Offer content</label>

                                                                                    <textarea name="page_offer_content[{{ $locale }}][value]"
                                                                                              rows="4"
                                                                                              class="form-control"
                                                                                              placeholder="{{ $locale == 'en' ? 'English' : 'Arabic' }} About US page content">{!! $settings['page_offer_content'][$locale] ?? old("page_offer_content.$locale.value") !!}</textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <hr>

                                                    <div class="row mb-3">
                                                        <h4 class="ml-2">Page installment content</h4>
                                                        <div class="default-tab " style="width: 100%">
                                                            <ul class="nav nav-tabs" role="tablist">
                                                                @foreach(config('translatable.locales') as $locale)
                                                                    <li class="nav-item">
                                                                        <a class="nav-link {{ $loop->first ? 'active' : '' }}" data-toggle="tab" href="#{{ $locale }}_page_installment_content">
                                                                            {{ $locale == 'en' ? 'English' : 'Arabic' }}
                                                                        </a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                            <div class="tab-content">
                                                                @foreach(config('translatable.locales') as $locale)
                                                                    <div class="tab-pane fade {{ $loop->first ? "active show" : '' }}" id="{{ $locale }}_page_installment_content" role="tabpanel">
                                                                        <div class="pt-4">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label class="control-label">{{ $locale == 'en' ? 'English' : 'Arabic' }} Page installment content</label>

                                                                                    <textarea name="page_installment_content[{{ $locale }}][value]"
                                                                                              rows="4"
                                                                                              class="form-control"
                                                                                              placeholder="{{ $locale == 'en' ? 'English' : 'Arabic' }} page installment content">{!! $settings['page_installment_content'][$locale] ?? old("page_installment_content.$locale.value") !!}</textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <hr>

                                                    <div class="row mb-3">
                                                        <h4 class="ml-2">Booking Services Page content</h4>
                                                        <div class="default-tab " style="width: 100%">
                                                            <ul class="nav nav-tabs" role="tablist">
                                                                @foreach(config('translatable.locales') as $locale)
                                                                    <li class="nav-item">
                                                                        <a class="nav-link {{ $loop->first ? 'active' : '' }}" data-toggle="tab" href="#{{ $locale }}_book_page_services_content">
                                                                            {{ $locale == 'en' ? 'English' : 'Arabic' }}
                                                                        </a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                            <div class="tab-content">
                                                                @foreach(config('translatable.locales') as $locale)
                                                                    <div class="tab-pane fade {{ $loop->first ? "active show" : '' }}" id="{{ $locale }}_book_page_services_content" role="tabpanel">
                                                                        <div class="pt-4">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label class="control-label">{{ $locale == 'en' ? 'English' : 'Arabic' }} Page Services content</label>

                                                                                    <textarea name="book_page_services_content[{{ $locale }}][value]"
                                                                                              rows="4"
                                                                                              class="form-control"
                                                                                              placeholder="{{ $locale == 'en' ? 'English' : 'Arabic' }} Services page content">{!! $settings['book_page_services_content'][$locale] ?? old("book_page_services_content.$locale.value") !!}</textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <hr>

                                                    <div class="row mb-3">
                                                        <h4 class="ml-2">Jobs Page content</h4>
                                                        <div class="default-tab " style="width: 100%">
                                                            <ul class="nav nav-tabs" role="tablist">
                                                                @foreach(config('translatable.locales') as $locale)
                                                                    <li class="nav-item">
                                                                        <a class="nav-link {{ $loop->first ? 'active' : '' }}" data-toggle="tab" href="#{{ $locale }}_page_jobs_content">
                                                                            {{ $locale == 'en' ? 'English' : 'Arabic' }}
                                                                        </a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                            <div class="tab-content">
                                                                @foreach(config('translatable.locales') as $locale)
                                                                    <div class="tab-pane fade {{ $loop->first ? "active show" : '' }}" id="{{ $locale }}_page_jobs_content" role="tabpanel">
                                                                        <div class="pt-4">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label class="control-label">{{ $locale == 'en' ? 'English' : 'Arabic' }} Page jobs content</label>

                                                                                    <textarea name="page_jobs_content[{{ $locale }}][value]"
                                                                                              rows="4"
                                                                                              class="form-control"
                                                                                              placeholder="{{ $locale == 'en' ? 'English' : 'Arabic' }} jobs page content">{!! $settings['page_jobs_content'][$locale] ?? old("page_jobs_content.$locale.value") !!}</textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <hr>

                                                    <div class="row mb-3">
                                                        <h4 class="ml-2">Booking Careers Page content</h4>
                                                        <div class="default-tab " style="width: 100%">
                                                            <ul class="nav nav-tabs" role="tablist">
                                                                @foreach(config('translatable.locales') as $locale)
                                                                    <li class="nav-item">
                                                                        <a class="nav-link {{ $loop->first ? 'active' : '' }}" data-toggle="tab" href="#{{ $locale }}_book_page_careers_content">
                                                                            {{ $locale == 'en' ? 'English' : 'Arabic' }}
                                                                        </a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                            <div class="tab-content">
                                                                @foreach(config('translatable.locales') as $locale)
                                                                    <div class="tab-pane fade {{ $loop->first ? "active show" : '' }}" id="{{ $locale }}_book_page_careers_content" role="tabpanel">
                                                                        <div class="pt-4">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label class="control-label">{{ $locale == 'en' ? 'English' : 'Arabic' }} Page Careers content</label>

                                                                                    <textarea name="book_page_careers_content[{{ $locale }}][value]"
                                                                                              rows="4"
                                                                                              class="form-control"
                                                                                              placeholder="{{ $locale == 'en' ? 'English' : 'Arabic' }} Careers page content">{!! $settings['book_page_careers_content'][$locale] ?? old("book_page_careers_content.$locale.value") !!}</textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <hr>

                                                    <div class="row mb-3">
                                                        <h4 class="ml-2">Before & After Page content</h4>
                                                        <div class="default-tab " style="width: 100%">
                                                            <ul class="nav nav-tabs" role="tablist">
                                                                @foreach(config('translatable.locales') as $locale)
                                                                    <li class="nav-item">
                                                                        <a class="nav-link {{ $loop->first ? 'active' : '' }}" data-toggle="tab" href="#{{ $locale }}_cases_page_content">
                                                                            {{ $locale == 'en' ? 'English' : 'Arabic' }}
                                                                        </a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                            <div class="tab-content">
                                                                @foreach(config('translatable.locales') as $locale)
                                                                    <div class="tab-pane fade {{ $loop->first ? "active show" : '' }}" id="{{ $locale }}_before_and_after" role="tabpanel">
                                                                        <div class="pt-4">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label class="control-label">{{ $locale == 'en' ? 'English' : 'Arabic' }} Before & After Page content</label>

                                                                                    <textarea name="before_and_after[{{ $locale }}][value]"
                                                                                              rows="4"
                                                                                              class="form-control"
                                                                                              placeholder="{{ $locale == 'en' ? 'English' : 'Arabic' }} Before & After page content">{!! $settings['before_and_after'][$locale] ?? old("before_and_after.$locale.value") !!}</textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <hr>

                                                    <div class="row mb-3">
                                                        <h4 class="ml-2">Booking Cases Page content</h4>
                                                        <div class="default-tab " style="width: 100%">
                                                            <ul class="nav nav-tabs" role="tablist">
                                                                @foreach(config('translatable.locales') as $locale)
                                                                    <li class="nav-item">
                                                                        <a class="nav-link {{ $loop->first ? 'active' : '' }}" data-toggle="tab" href="#{{ $locale }}_book_page_cases_content">
                                                                            {{ $locale == 'en' ? 'English' : 'Arabic' }}
                                                                        </a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                            <div class="tab-content">
                                                                @foreach(config('translatable.locales') as $locale)
                                                                    <div class="tab-pane fade {{ $loop->first ? "active show" : '' }}" id="{{ $locale }}_book_page_cases_content" role="tabpanel">
                                                                        <div class="pt-4">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label class="control-label">{{ $locale == 'en' ? 'English' : 'Arabic' }} Page Cases content</label>

                                                                                    <textarea name="book_page_cases_content[{{ $locale }}][value]"
                                                                                              rows="4"
                                                                                              class="form-control"
                                                                                              placeholder="{{ $locale == 'en' ? 'English' : 'Arabic' }} Cases page content">{!! $settings['book_page_cases_content'][$locale] ?? old("book_page_cases_content.$locale.value") !!}</textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <hr>

                                                    <div class="row mb-3">
                                                        <h4 class="ml-2">Booking InsuranceCompany Page content</h4>
                                                        <div class="default-tab " style="width: 100%">
                                                            <ul class="nav nav-tabs" role="tablist">
                                                                @foreach(config('translatable.locales') as $locale)
                                                                    <li class="nav-item">
                                                                        <a class="nav-link {{ $loop->first ? 'active' : '' }}" data-toggle="tab" href="#{{ $locale }}_book_page_insurance_content">
                                                                            {{ $locale == 'en' ? 'English' : 'Arabic' }}
                                                                        </a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                            <div class="tab-content">
                                                                @foreach(config('translatable.locales') as $locale)
                                                                    <div class="tab-pane fade {{ $loop->first ? "active show" : '' }}" id="{{ $locale }}_book_page_insurance_content" role="tabpanel">
                                                                        <div class="pt-4">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label class="control-label">{{ $locale == 'en' ? 'English' : 'Arabic' }} Page InsuranceCompany content</label>

                                                                                    <textarea name="book_page_insurance_content[{{ $locale }}][value]"
                                                                                              rows="4"
                                                                                              class="form-control"
                                                                                              placeholder="{{ $locale == 'en' ? 'English' : 'Arabic' }} InsuranceCompany page content">{!! $settings['book_page_insurance_content'][$locale] ?? old("book_page_insurance_content.$locale.value") !!}</textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <hr>

                                                    <div class="row mb-3">
                                                        <h4 class="ml-2">InsuranceCompany Page content</h4>
                                                        <div class="default-tab " style="width: 100%">
                                                            <ul class="nav nav-tabs" role="tablist">
                                                                @foreach(config('translatable.locales') as $locale)
                                                                    <li class="nav-item">
                                                                        <a class="nav-link {{ $loop->first ? 'active' : '' }}" data-toggle="tab" href="#{{ $locale }}_insurance_page_content">
                                                                            {{ $locale == 'en' ? 'English' : 'Arabic' }}
                                                                        </a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                            <div class="tab-content">
                                                                @foreach(config('translatable.locales') as $locale)
                                                                    <div class="tab-pane fade {{ $loop->first ? "active show" : '' }}" id="{{ $locale }}_insurance_page_content" role="tabpanel">
                                                                        <div class="pt-4">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label class="control-label">{{ $locale == 'en' ? 'English' : 'Arabic' }} InsuranceCompany Page content</label>

                                                                                    <textarea name="insurance_page_content[{{ $locale }}][value]"
                                                                                              rows="4"
                                                                                              class="form-control"
                                                                                              placeholder="{{ $locale == 'en' ? 'English' : 'Arabic' }} InsuranceCompany page content">{!! $settings['insurance_page_content'][$locale] ?? old("insurance_page_content.$locale.value") !!}</textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <hr>

                                                    <div class="row mb-3">
                                                        <h4 class="ml-2">Contact Us Content</h4>
                                                        <div class="default-tab " style="width: 100%">
                                                            <ul class="nav nav-tabs" role="tablist">
                                                                @foreach(config('translatable.locales') as $locale)
                                                                    <li class="nav-item">
                                                                        <a class="nav-link {{ $loop->first ? 'active' : '' }}" data-toggle="tab" href="#{{ $locale }}_contact_us_content">
                                                                            {{ $locale == 'en' ? 'English' : 'Arabic' }}
                                                                        </a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                            <div class="tab-content">
                                                                @foreach(config('translatable.locales') as $locale)
                                                                    <div class="tab-pane fade {{ $loop->first ? "active show" : '' }}" id="{{ $locale }}_contact_us_content" role="tabpanel">
                                                                        <div class="pt-4">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label class="control-label">{{ $locale == 'en' ? 'English' : 'Arabic' }} Contact Us Content</label>

                                                                                    <textarea name="contact_us_content[{{ $locale }}][value]"
                                                                                              rows="4"
                                                                                              class="form-control"
                                                                                              placeholder="{{ $locale == 'en' ? 'English' : 'Arabic' }} Contact Us Content">{!! $settings['contact_us_content'][$locale] ?? old("contact_us_content.$locale.value") !!}</textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <hr>

                                                    <div class="row mb-3">
                                                        <h4 class="ml-2">Review Page Content</h4>
                                                        <div class="default-tab " style="width: 100%">
                                                            <ul class="nav nav-tabs" role="tablist">
                                                                @foreach(config('translatable.locales') as $locale)
                                                                    <li class="nav-item">
                                                                        <a class="nav-link {{ $loop->first ? 'active' : '' }}" data-toggle="tab" href="#{{ $locale }}_review_page_content">
                                                                            {{ $locale == 'en' ? 'English' : 'Arabic' }}
                                                                        </a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                            <div class="tab-content">
                                                                @foreach(config('translatable.locales') as $locale)
                                                                    <div class="tab-pane fade {{ $loop->first ? "active show" : '' }}" id="{{ $locale }}_review_page_content" role="tabpanel">
                                                                        <div class="pt-4">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label class="control-label">{{ $locale == 'en' ? 'English' : 'Arabic' }} Review Page Content</label>

                                                                                    <textarea name="review_page_content[{{ $locale }}][value]"
                                                                                              rows="4"
                                                                                              class="form-control"
                                                                                              placeholder="{{ $locale == 'en' ? 'English' : 'Arabic' }} Review Page Content">{!! $settings['review_page_content'][$locale] ?? old("review_page_content.$locale.value") !!}</textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <hr>

                                                    <button type="submit" class="btn btn-primary btn-block">Save</button>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="tab-pane fade" id="images_settings" role="tabpanel">
                                            <form class="form" method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data">
                                                @method('PUT')
                                                @csrf
                                                <div class="pt-4">
                                                    <div class="row">
                                                        <div class="col-md-6 form-group">
                                                            <label class="control-label">Website Logo</label>
                                                            <input type="file"
                                                                   name="images[website_logo]"
                                                                   class="dropify"
                                                                   data-max-file-size="3M"
                                                                   data-default-file="{{ $settings['website_logo'] ?? '' }}" />
                                                        </div>

                                                        <div class="col-md-6 form-group">
                                                            <label class="control-label">Website Icon</label>
                                                            <input type="file"
                                                                   name="images[website_icon]"
                                                                   class="dropify"
                                                                   data-max-file-size="3M"
                                                                   data-height="200"
                                                                   data-default-file="{{ $settings['website_icon'] ?? '' }}" />
                                                        </div>

                                                        <div class="col-md-6 form-group">
                                                            <label class="control-label">Home about image</label>
                                                            <input type="file"
                                                                   name="images[home_about_image]"
                                                                   class="dropify"
                                                                   data-max-file-size="3M"
                                                                   data-default-file="{{ $settings['home_about_image'] ?? '' }}" />
                                                        </div>

                                                        <div class="col-md-6 form-group">
                                                            <label class="control-label">About page image</label>
                                                            <input type="file"
                                                                   name="images[about_page_image]"
                                                                   class="dropify"
                                                                   data-max-file-size="3M"
                                                                   data-default-file="{{ $settings['about_page_image'] ?? '' }}" />
                                                        </div>
                                                    </div>

                                                    <hr>

                                                    <button type="submit" class="btn btn-primary btn-block">Save</button>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="tab-pane fade" id="seo_settings" role="tabpanel">
                                            <form class="form" method="POST" action="{{ route('admin.settings.update') }}">
                                                @method('PUT')
                                                @csrf

                                                <div class="pt-4">
                                                    <div class="row mb-3">
                                                        <!-- BEGIN :: home page seo -->
                                                        <div class="col-md-6">
                                                            <h4 class="ml-2">Home Page SEO</h4>
                                                            <div class="default-tab " style="width: 100%">
                                                                <ul class="nav nav-tabs" role="tablist">
                                                                    @foreach(config('translatable.locales') as $locale)
                                                                        <li class="nav-item">
                                                                            <a class="nav-link {{ $loop->first ? 'active' : '' }}" data-toggle="tab" href="#{{ $locale }}_home_page_seo">
                                                                                {{ $locale == 'en' ? 'English' : 'Arabic' }}
                                                                            </a>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                                <div class="tab-content">
                                                                    @foreach(config('translatable.locales') as $locale)
                                                                        <div class="tab-pane fade {{ $loop->first ? "active show" : '' }}" id="{{ $locale }}_home_page_seo" role="tabpanel">
                                                                            <div class="pt-4">
                                                                                <div class="col-md-12">
                                                                                    <div class="form-group">
                                                                                        <label class="control-label">{{ $locale == 'en' ? 'English' : 'Arabic' }} Home Page SEO</label>

                                                                                        <textarea name="home_page_seo[{{ $locale }}][value]"
                                                                                                  rows="10"
                                                                                                  class="form-control"
                                                                                                  placeholder="{{ $locale == 'en' ? 'English' : 'Arabic' }} Home Page SEO">{!! $settings['home_page_seo'][$locale] ?? old("home_page_seo.$locale.value") !!}</textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- END :: home page seo -->

                                                        <!-- BEGIN :: about us page seo -->
                                                        <div class="col-md-6">
                                                            <h4 class="ml-2">About Us Page SEO</h4>
                                                            <div class="default-tab " style="width: 100%">
                                                                <ul class="nav nav-tabs" role="tablist">
                                                                    @foreach(config('translatable.locales') as $locale)
                                                                        <li class="nav-item">
                                                                            <a class="nav-link {{ $loop->first ? 'active' : '' }}" data-toggle="tab" href="#{{ $locale }}_about_us_page_seo">
                                                                                {{ $locale == 'en' ? 'English' : 'Arabic' }}
                                                                            </a>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                                <div class="tab-content">
                                                                    @foreach(config('translatable.locales') as $locale)
                                                                        <div class="tab-pane fade {{ $loop->first ? "active show" : '' }}" id="{{ $locale }}_about_us_page_seo" role="tabpanel">
                                                                            <div class="pt-4">
                                                                                <div class="col-md-12">
                                                                                    <div class="form-group">
                                                                                        <label class="control-label">{{ $locale == 'en' ? 'English' : 'Arabic' }} About Us Page SEO</label>

                                                                                        <textarea name="about_us_page_seo[{{ $locale }}][value]"
                                                                                                  rows="10"
                                                                                                  class="form-control"
                                                                                                  placeholder="{{ $locale == 'en' ? 'English' : 'Arabic' }} About Us Page SEO">{!! $settings['about_us_page_seo'][$locale] ?? old("about_us_page_seo.$locale.value") !!}</textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- END :: about us page seo -->
                                                    </div>

                                                    <hr>


                                                    <div class="row mb-3">
                                                        <!-- BEGIN :: insurance companies page seo -->
                                                        <div class="col-md-6">
                                                            <h4 class="ml-2">Insurance companies Page SEO</h4>
                                                            <div class="default-tab " style="width: 100%">
                                                                <ul class="nav nav-tabs" role="tablist">
                                                                    @foreach(config('translatable.locales') as $locale)
                                                                        <li class="nav-item">
                                                                            <a class="nav-link {{ $loop->first ? 'active' : '' }}" data-toggle="tab" href="#{{ $locale }}_insurance_companies_page_seo">
                                                                                {{ $locale == 'en' ? 'English' : 'Arabic' }}
                                                                            </a>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                                <div class="tab-content">
                                                                    @foreach(config('translatable.locales') as $locale)
                                                                        <div class="tab-pane fade {{ $loop->first ? "active show" : '' }}" id="{{ $locale }}_insurance_companies_page_seo" role="tabpanel">
                                                                            <div class="pt-4">
                                                                                <div class="col-md-12">
                                                                                    <div class="form-group">
                                                                                        <label class="control-label">{{ $locale == 'en' ? 'English' : 'Arabic' }} Insurance companies Page SEO</label>

                                                                                        <textarea name="insurance_companies_page_seo[{{ $locale }}][value]"
                                                                                                  rows="10"
                                                                                                  class="form-control"
                                                                                                  placeholder="{{ $locale == 'en' ? 'English' : 'Arabic' }} Insurance companies Page SEO">{!! $settings['insurance_companies_page_seo'][$locale] ?? old("insurance_companies_page_seo.$locale.value") !!}</textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- END :: insurance companies page seo -->

                                                        <!-- BEGIN :: services page seo -->
                                                        <div class="col-md-6">
                                                            <h4 class="ml-2">Services Page SEO</h4>
                                                            <div class="default-tab " style="width: 100%">
                                                                <ul class="nav nav-tabs" role="tablist">
                                                                    @foreach(config('translatable.locales') as $locale)
                                                                        <li class="nav-item">
                                                                            <a class="nav-link {{ $loop->first ? 'active' : '' }}" data-toggle="tab" href="#{{ $locale }}_services_page_seo">
                                                                                {{ $locale == 'en' ? 'English' : 'Arabic' }}
                                                                            </a>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                                <div class="tab-content">
                                                                    @foreach(config('translatable.locales') as $locale)
                                                                        <div class="tab-pane fade {{ $loop->first ? "active show" : '' }}" id="{{ $locale }}_services_page_seo" role="tabpanel">
                                                                            <div class="pt-4">
                                                                                <div class="col-md-12">
                                                                                    <div class="form-group">
                                                                                        <label class="control-label">{{ $locale == 'en' ? 'English' : 'Arabic' }} Services Page SEO</label>

                                                                                        <textarea name="services_page_seo[{{ $locale }}][value]"
                                                                                                  rows="10"
                                                                                                  class="form-control"
                                                                                                  placeholder="{{ $locale == 'en' ? 'English' : 'Arabic' }} Services Page SEO">{!! $settings['services_page_seo'][$locale] ?? old("services_page_seo.$locale.value") !!}</textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- END :: services page seo -->

                                                    </div>

                                                    <hr>

                                                    <div class="row mb-3">
                                                         <!-- BEGIN :: Meta Title Blog Page SEO< -->
                                                         <div class="col-md-6">
                                                            <h4 class="ml-2">Meta Title Blog Page SEO</h4>
                                                            <div class="default-tab " style="width: 100%">
                                                                <ul class="nav nav-tabs" role="tablist">
                                                                    @foreach(config('translatable.locales') as $locale)
                                                                        <li class="nav-item">
                                                                            <a class="nav-link {{ $loop->first ? 'active' : '' }}" data-toggle="tab" href="#{{ $locale }}_metatitle_blog_page_seo">
                                                                                {{ $locale == 'en' ? 'English' : 'Arabic' }}
                                                                            </a>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                                <div class="tab-content">
                                                                    @foreach(config('translatable.locales') as $locale)
                                                                        <div class="tab-pane fade {{ $loop->first ? "active show" : '' }}" id="{{ $locale }}_metatitle_blog_page_seo" role="tabpanel">
                                                                            <div class="pt-4">
                                                                                <div class="col-md-12">
                                                                                    <div class="form-group">
                                                                                        <label class="control-label">{{ $locale == 'en' ? 'English' : 'Arabic' }} Meta Title Blog Page SEO</label>

                                                                                        <input name="metatitle_blog_page_seo[{{ $locale }}][value]" value="{{ $settings['metatitle_blog_page_seo'][$locale] ?? old("metatitle_blog_page_seo.$locale.value") }}"
                                                                                                  rows="10"
                                                                                                  class="form-control"
                                                                                                  placeholder="{{ $locale == 'en' ? 'English' : 'Arabic' }} Meta Title Blog Page SEO"/>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- END :: Meta Title Blog Page SEO< -->
                                                        <!-- BEGIN :: Blog page seo -->
                                                        <div class="col-md-6">
                                                            <h4 class="ml-2">Blogs Page SEO</h4>
                                                            <div class="default-tab " style="width: 100%">
                                                                <ul class="nav nav-tabs" role="tablist">
                                                                    @foreach(config('translatable.locales') as $locale)
                                                                        <li class="nav-item">
                                                                            <a class="nav-link {{ $loop->first ? 'active' : '' }}" data-toggle="tab" href="#{{ $locale }}_blogs_page_seo">
                                                                                {{ $locale == 'en' ? 'English' : 'Arabic' }}
                                                                            </a>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                                <div class="tab-content">
                                                                    @foreach(config('translatable.locales') as $locale)
                                                                        <div class="tab-pane fade {{ $loop->first ? "active show" : '' }}" id="{{ $locale }}_blogs_page_seo" role="tabpanel">
                                                                            <div class="pt-4">
                                                                                <div class="col-md-12">
                                                                                    <div class="form-group">
                                                                                        <label class="control-label">{{ $locale == 'en' ? 'English' : 'Arabic' }} Blogs Page SEO</label>

                                                                                        <textarea name="blogs_page_seo[{{ $locale }}][value]"
                                                                                                  rows="10"
                                                                                                  class="form-control"
                                                                                                  placeholder="{{ $locale == 'en' ? 'English' : 'Arabic' }} Blogs Page SEO">{!! $settings['blogs_page_seo'][$locale] ?? old("blogs_page_seo.$locale.value") !!}</textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- END :: doctors page seo -->
                                                    </div>

                                                    <hr>

                                                    <div class="row mb-3">
                                                         <!-- BEGIN :: Meta Title Dotor Page SEO< -->
                                                         <div class="col-md-6">
                                                            <h4 class="ml-2">Meta Title Dotor Page SEO</h4>
                                                            <div class="default-tab " style="width: 100%">
                                                                <ul class="nav nav-tabs" role="tablist">
                                                                    @foreach(config('translatable.locales') as $locale)
                                                                        <li class="nav-item">
                                                                            <a class="nav-link {{ $loop->first ? 'active' : '' }}" data-toggle="tab" href="#{{ $locale }}_metatitle_doctor_page_seo">
                                                                                {{ $locale == 'en' ? 'English' : 'Arabic' }}
                                                                            </a>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                                <div class="tab-content">
                                                                    @foreach(config('translatable.locales') as $locale)
                                                                        <div class="tab-pane fade {{ $loop->first ? "active show" : '' }}" id="{{ $locale }}_metatitle_doctor_page_seo" role="tabpanel">
                                                                            <div class="pt-4">
                                                                                <div class="col-md-12">
                                                                                    <div class="form-group">
                                                                                        <label class="control-label">{{ $locale == 'en' ? 'English' : 'Arabic' }} Meta Title Dotor Page SEO</label>

                                                                                        <input name="metatitle_doctor_page_seo[{{ $locale }}][value]" value="{{ $settings['metatitle_doctor_page_seo'][$locale] ?? old("metatitle_doctor_page_seo.$locale.value") }}"
                                                                                                  rows="10"
                                                                                                  class="form-control"
                                                                                                  placeholder="{{ $locale == 'en' ? 'English' : 'Arabic' }} Meta Title Dotor Page SEO"/>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- END :: Meta Title Dotor Page SEO< -->
                                                        <!-- BEGIN :: doctors page seo -->
                                                        <div class="col-md-6">
                                                            <h4 class="ml-2">Doctors Page SEO</h4>
                                                            <div class="default-tab " style="width: 100%">
                                                                <ul class="nav nav-tabs" role="tablist">
                                                                    @foreach(config('translatable.locales') as $locale)
                                                                        <li class="nav-item">
                                                                            <a class="nav-link {{ $loop->first ? 'active' : '' }}" data-toggle="tab" href="#{{ $locale }}_doctors_page_seo">
                                                                                {{ $locale == 'en' ? 'English' : 'Arabic' }}
                                                                            </a>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                                <div class="tab-content">
                                                                    @foreach(config('translatable.locales') as $locale)
                                                                        <div class="tab-pane fade {{ $loop->first ? "active show" : '' }}" id="{{ $locale }}_doctors_page_seo" role="tabpanel">
                                                                            <div class="pt-4">
                                                                                <div class="col-md-12">
                                                                                    <div class="form-group">
                                                                                        <label class="control-label">{{ $locale == 'en' ? 'English' : 'Arabic' }} Doctors Page SEO</label>

                                                                                        <textarea name="doctors_page_seo[{{ $locale }}][value]"
                                                                                                  rows="10"
                                                                                                  class="form-control"
                                                                                                  placeholder="{{ $locale == 'en' ? 'English' : 'Arabic' }} Doctors Page SEO">{!! $settings['doctors_page_seo'][$locale] ?? old("doctors_page_seo.$locale.value") !!}</textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- END :: doctors page seo -->
                                                    </div>

                                                    <hr>

                                                    <div class="row mb-3">
                                                         <!-- BEGIN :: Meta Title cases Page SEO< -->
                                                         <div class="col-md-6">
                                                            <h4 class="ml-2">Meta Title Cases Page SEO</h4>
                                                            <div class="default-tab " style="width: 100%">
                                                                <ul class="nav nav-tabs" role="tablist">
                                                                    @foreach(config('translatable.locales') as $locale)
                                                                        <li class="nav-item">
                                                                            <a class="nav-link {{ $loop->first ? 'active' : '' }}" data-toggle="tab" href="#{{ $locale }}_metatitle_cases_page_seo">
                                                                                {{ $locale == 'en' ? 'English' : 'Arabic' }}
                                                                            </a>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                                <div class="tab-content">
                                                                    @foreach(config('translatable.locales') as $locale)
                                                                        <div class="tab-pane fade {{ $loop->first ? "active show" : '' }}" id="{{ $locale }}_metatitle_cases_page_seo" role="tabpanel">
                                                                            <div class="pt-4">
                                                                                <div class="col-md-12">
                                                                                    <div class="form-group">
                                                                                        <label class="control-label">{{ $locale == 'en' ? 'English' : 'Arabic' }} Meta Title Cases Page SEO</label>

                                                                                        <input name="metatitle_cases_page_seo[{{ $locale }}][value]" value="{{ $settings['metatitle_cases_page_seo'][$locale] ?? old("metatitle_cases_page_seo.$locale.value") }}"
                                                                                                  rows="10"
                                                                                                  class="form-control"
                                                                                                  placeholder="{{ $locale == 'en' ? 'English' : 'Arabic' }} Meta Title Cases Page SEO"/>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- END :: Meta Title cases Page SEO< -->

                                                        <!-- BEGIN :: cases page seo -->
                                                        <div class="col-md-6">
                                                            <h4 class="ml-2">Cases Page SEO</h4>
                                                            <div class="default-tab " style="width: 100%">
                                                                <ul class="nav nav-tabs" role="tablist">
                                                                    @foreach(config('translatable.locales') as $locale)
                                                                        <li class="nav-item">
                                                                            <a class="nav-link {{ $loop->first ? 'active' : '' }}" data-toggle="tab" href="#{{ $locale }}_cases_page_seo">
                                                                                {{ $locale == 'en' ? 'English' : 'Arabic' }}
                                                                            </a>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                                <div class="tab-content">
                                                                    @foreach(config('translatable.locales') as $locale)
                                                                        <div class="tab-pane fade {{ $loop->first ? "active show" : '' }}" id="{{ $locale }}_cases_page_seo" role="tabpanel">
                                                                            <div class="pt-4">
                                                                                <div class="col-md-12">
                                                                                    <div class="form-group">
                                                                                        <label class="control-label">{{ $locale == 'en' ? 'English' : 'Arabic' }} Cases Page SEO</label>

                                                                                        <textarea name="cases_page_seo[{{ $locale }}][value]"
                                                                                                  rows="10"
                                                                                                  class="form-control"
                                                                                                  placeholder="{{ $locale == 'en' ? 'English' : 'Arabic' }} Cases Page SEO">{!! $settings['cases_page_seo'][$locale] ?? old("cases_page_seo.$locale.value") !!}</textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- END :: cases page seo -->
                                                    </div>

                                                    <hr>

                                                    <div class="row mb-3">
                                                        <!-- BEGIN :: installment page seo -->
                                                        <div class="col-md-6">
                                                            <h4 class="ml-2">Installment Page SEO</h4>
                                                            <div class="default-tab " style="width: 100%">
                                                                <ul class="nav nav-tabs" role="tablist">
                                                                    @foreach(config('translatable.locales') as $locale)
                                                                        <li class="nav-item">
                                                                            <a class="nav-link {{ $loop->first ? 'active' : '' }}" data-toggle="tab" href="#{{ $locale }}_installment_page_seo">
                                                                                {{ $locale == 'en' ? 'English' : 'Arabic' }}
                                                                            </a>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                                <div class="tab-content">
                                                                    @foreach(config('translatable.locales') as $locale)
                                                                        <div class="tab-pane fade {{ $loop->first ? "active show" : '' }}" id="{{ $locale }}_installment_page_seo" role="tabpanel">
                                                                            <div class="pt-4">
                                                                                <div class="col-md-12">
                                                                                    <div class="form-group">
                                                                                        <label class="control-label">{{ $locale == 'en' ? 'English' : 'Arabic' }} Installment Page SEO</label>

                                                                                        <textarea name="installment_page_seo[{{ $locale }}][value]"
                                                                                                  rows="10"
                                                                                                  class="form-control"
                                                                                                  placeholder="{{ $locale == 'en' ? 'English' : 'Arabic' }} Installment Page SEO">{!! $settings['installment_page_seo'][$locale] ?? old("installment_page_seo.$locale.value") !!}</textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- END :: installment page seo -->

                                                        <!-- BEGIN :: advices page seo -->
                                                        <div class="col-md-6">
                                                            <h4 class="ml-2">Advices Page SEO</h4>
                                                            <div class="default-tab " style="width: 100%">
                                                                <ul class="nav nav-tabs" role="tablist">
                                                                    @foreach(config('translatable.locales') as $locale)
                                                                        <li class="nav-item">
                                                                            <a class="nav-link {{ $loop->first ? 'active' : '' }}" data-toggle="tab" href="#{{ $locale }}_advices_page_seo">
                                                                                {{ $locale == 'en' ? 'English' : 'Arabic' }}
                                                                            </a>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                                <div class="tab-content">
                                                                    @foreach(config('translatable.locales') as $locale)
                                                                        <div class="tab-pane fade {{ $loop->first ? "active show" : '' }}" id="{{ $locale }}_advices_page_seo" role="tabpanel">
                                                                            <div class="pt-4">
                                                                                <div class="col-md-12">
                                                                                    <div class="form-group">
                                                                                        <label class="control-label">{{ $locale == 'en' ? 'English' : 'Arabic' }} Advices Page SEO</label>

                                                                                        <textarea name="advices_page_seo[{{ $locale }}][value]"
                                                                                                  rows="10"
                                                                                                  class="form-control"
                                                                                                  placeholder="{{ $locale == 'en' ? 'English' : 'Arabic' }} Advices Page SEO">{!! $settings['advices_page_seo'][$locale] ?? old("advices_page_seo.$locale.value") !!}</textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- END :: advices page seo -->
                                                    </div>

                                                    <hr>

                                                    <div class="row mb-3">
                                                       <!-- BEGIN :: Meta Title Contact Us Page SEO< -->
                                                       <div class="col-md-6">
                                                            <h4 class="ml-2">Meta Title Contact Us Page SEO</h4>
                                                            <div class="default-tab " style="width: 100%">
                                                                <ul class="nav nav-tabs" role="tablist">
                                                                    @foreach(config('translatable.locales') as $locale)
                                                                        <li class="nav-item">
                                                                            <a class="nav-link {{ $loop->first ? 'active' : '' }}" data-toggle="tab" href="#{{ $locale }}_metatitle_contactus_page_seo">
                                                                                {{ $locale == 'en' ? 'English' : 'Arabic' }}
                                                                            </a>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                                <div class="tab-content">
                                                                    @foreach(config('translatable.locales') as $locale)
                                                                        <div class="tab-pane fade {{ $loop->first ? "active show" : '' }}" id="{{ $locale }}_metatitle_contactus_page_seo" role="tabpanel">
                                                                            <div class="pt-4">
                                                                                <div class="col-md-12">
                                                                                    <div class="form-group">
                                                                                        <label class="control-label">{{ $locale == 'en' ? 'English' : 'Arabic' }} Meta Title Contact Us Page SEO</label>

                                                                                        <input name="metatitle_contactus_page_seo[{{ $locale }}][value]" value="{{ $settings['metatitle_contactus_page_seo'][$locale] ?? old("metatitle_contactus_page_seo.$locale.value") }}"
                                                                                                  rows="10"
                                                                                                  class="form-control"
                                                                                                  placeholder="{{ $locale == 'en' ? 'English' : 'Arabic' }} Meta Title Contact Us Page SEO"/>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- END :: Meta Title Contact Us Page SEO< -->

                                                        <!-- BEGIN :: contact us page seo -->
                                                        <div class="col-md-6">
                                                            <h4 class="ml-2">Contact Us Page SEO</h4>
                                                            <div class="default-tab " style="width: 100%">
                                                                <ul class="nav nav-tabs" role="tablist">
                                                                    @foreach(config('translatable.locales') as $locale)
                                                                        <li class="nav-item">
                                                                            <a class="nav-link {{ $loop->first ? 'active' : '' }}" data-toggle="tab" href="#{{ $locale }}_contact_us_page_seo">
                                                                                {{ $locale == 'en' ? 'English' : 'Arabic' }}
                                                                            </a>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                                <div class="tab-content">
                                                                    @foreach(config('translatable.locales') as $locale)
                                                                        <div class="tab-pane fade {{ $loop->first ? "active show" : '' }}" id="{{ $locale }}_contact_us_page_seo" role="tabpanel">
                                                                            <div class="pt-4">
                                                                                <div class="col-md-12">
                                                                                    <div class="form-group">
                                                                                        <label class="control-label">{{ $locale == 'en' ? 'English' : 'Arabic' }} Contact Us Page SEO</label>

                                                                                        <textarea name="contact_us_page_seo[{{ $locale }}][value]"
                                                                                                  rows="10"
                                                                                                  class="form-control"
                                                                                                  placeholder="{{ $locale == 'en' ? 'English' : 'Arabic' }} Contact Us Page SEO">{!! $settings['contact_us_page_seo'][$locale] ?? old("contact_us_page_seo.$locale.value") !!}</textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- END :: contact us page seo -->
                                                    </div>

                                                    <hr>

                                                    <div class="row mb-3">
                                                        <!-- BEGIN :: Meta Title Offer Page SEO< -->
                                                        <div class="col-md-6">
                                                            <h4 class="ml-2">Meta Title Offer Page SEO</h4>
                                                            <div class="default-tab " style="width: 100%">
                                                                <ul class="nav nav-tabs" role="tablist">
                                                                    @foreach(config('translatable.locales') as $locale)
                                                                        <li class="nav-item">
                                                                            <a class="nav-link {{ $loop->first ? 'active' : '' }}" data-toggle="tab" href="#{{ $locale }}_metatitle_offer_page_seo">
                                                                                {{ $locale == 'en' ? 'English' : 'Arabic' }}
                                                                            </a>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                                <div class="tab-content">
                                                                    @foreach(config('translatable.locales') as $locale)
                                                                        <div class="tab-pane fade {{ $loop->first ? "active show" : '' }}" id="{{ $locale }}_metatitle_offer_page_seo" role="tabpanel">
                                                                            <div class="pt-4">
                                                                                <div class="col-md-12">
                                                                                    <div class="form-group">
                                                                                        <label class="control-label">{{ $locale == 'en' ? 'English' : 'Arabic' }} Meta Title Offer Page SEO</label>

                                                                                        <input name="metatitle_offer_page_seo[{{ $locale }}][value]" value="{{ $settings['metatitle_offer_page_seo'][$locale] ?? old("metatitle_offer_page_seo.$locale.value") }}"
                                                                                                  rows="10"
                                                                                                  class="form-control"
                                                                                                  placeholder="{{ $locale == 'en' ? 'English' : 'Arabic' }} Meta Title Offer Page SEO"/>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- END :: Meta Title offer Page SEO< -->
                                                        <!-- BEGIN :: offers page seo -->
                                                        <div class="col-md-6">
                                                            <h4 class="ml-2">Offers Page SEO</h4>
                                                            <div class="default-tab " style="width: 100%">
                                                                <ul class="nav nav-tabs" role="tablist">
                                                                    @foreach(config('translatable.locales') as $locale)
                                                                        <li class="nav-item">
                                                                            <a class="nav-link {{ $loop->first ? 'active' : '' }}" data-toggle="tab" href="#{{ $locale }}_offers_page_seo">
                                                                                {{ $locale == 'en' ? 'English' : 'Arabic' }}
                                                                            </a>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                                <div class="tab-content">
                                                                    @foreach(config('translatable.locales') as $locale)
                                                                        <div class="tab-pane fade {{ $loop->first ? "active show" : '' }}" id="{{ $locale }}_offers_page_seo" role="tabpanel">
                                                                            <div class="pt-4">
                                                                                <div class="col-md-12">
                                                                                    <div class="form-group">
                                                                                        <label class="control-label">{{ $locale == 'en' ? 'English' : 'Arabic' }} Offers Page SEO</label>

                                                                                        <textarea name="offers_page_seo[{{ $locale }}][value]"
                                                                                                  rows="10"
                                                                                                  class="form-control"
                                                                                                  placeholder="{{ $locale == 'en' ? 'English' : 'Arabic' }} Offers Page SEO">{!! $settings['offers_page_seo'][$locale] ?? old("offers_page_seo.$locale.value") !!}</textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- END :: offers page seo -->
                                                    </div>

                                                    <hr>


                                                    <div class="row mb-3">
                                                        <!-- BEGIN :: Meta Title Offer book Page SEO< -->
                                                        <div class="col-md-6">
                                                            <h4 class="ml-2">Meta Title Offer book Page SEO</h4>
                                                            <div class="default-tab " style="width: 100%">
                                                                <ul class="nav nav-tabs" role="tablist">
                                                                    @foreach(config('translatable.locales') as $locale)
                                                                        <li class="nav-item">
                                                                            <a class="nav-link {{ $loop->first ? 'active' : '' }}" data-toggle="tab" href="#{{ $locale }}_metatitle_offer_book_page_seo">
                                                                                {{ $locale == 'en' ? 'English' : 'Arabic' }}
                                                                            </a>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                                <div class="tab-content">
                                                                    @foreach(config('translatable.locales') as $locale)
                                                                        <div class="tab-pane fade {{ $loop->first ? "active show" : '' }}" id="{{ $locale }}_metatitle_offer_book_page_seo" role="tabpanel">
                                                                            <div class="pt-4">
                                                                                <div class="col-md-12">
                                                                                    <div class="form-group">
                                                                                        <label class="control-label">{{ $locale == 'en' ? 'English' : 'Arabic' }} Meta Title Offer book Page SEO</label>

                                                                                        <input name="metatitle_offer_book_page_seo[{{ $locale }}][value]" value="{{ $settings['metatitle_offer_book_page_seo'][$locale] ?? old("metatitle_offer_book_page_seo.$locale.value") }}"
                                                                                                  rows="10"
                                                                                                  class="form-control"
                                                                                                  placeholder="{{ $locale == 'en' ? 'English' : 'Arabic' }} Meta Title Offer book Page SEO"/>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- END :: Meta Title offer book Page SEO< -->

                                                        <!-- BEGIN :: offer book page seo -->
                                                        <div class="col-md-6">
                                                            <h4 class="ml-2">offer book Page SEO</h4>
                                                            <div class="default-tab " style="width: 100%">
                                                                <ul class="nav nav-tabs" role="tablist">
                                                                    @foreach(config('translatable.locales') as $locale)
                                                                        <li class="nav-item">
                                                                            <a class="nav-link {{ $loop->first ? 'active' : '' }}" data-toggle="tab" href="#{{ $locale }}_offer_book_page_seo">
                                                                                {{ $locale == 'en' ? 'English' : 'Arabic' }}
                                                                            </a>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                                <div class="tab-content">
                                                                    @foreach(config('translatable.locales') as $locale)
                                                                        <div class="tab-pane fade {{ $loop->first ? "active show" : '' }}" id="{{ $locale }}_offer_book_page_seo" role="tabpanel">
                                                                            <div class="pt-4">
                                                                                <div class="col-md-12">
                                                                                    <div class="form-group">
                                                                                        <label class="control-label">{{ $locale == 'en' ? 'English' : 'Arabic' }} offer book Page SEO</label>

                                                                                        <textarea name="offer_book_page_seo[{{ $locale }}][value]"
                                                                                                  rows="10"
                                                                                                  class="form-control"
                                                                                                  placeholder="{{ $locale == 'en' ? 'English' : 'Arabic' }} offer book Page SEO">{!! $settings['offer_book_page_seo'][$locale] ?? old("offer_book_page_seo.$locale.value") !!}</textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- END :: offer book page seo -->
                                                    </div>

                                                    <hr>

                                                    <div class="row mb-3">
                                                        <!-- BEGIN :: Meta Title booking Page SEO< -->
                                                        <div class="col-md-6">
                                                            <h4 class="ml-2">Meta Title Booking Page SEO</h4>
                                                            <div class="default-tab " style="width: 100%">
                                                                <ul class="nav nav-tabs" role="tablist">
                                                                    @foreach(config('translatable.locales') as $locale)
                                                                        <li class="nav-item">
                                                                            <a class="nav-link {{ $loop->first ? 'active' : '' }}" data-toggle="tab" href="#{{ $locale }}_metatitle_booking_page_seo">
                                                                                {{ $locale == 'en' ? 'English' : 'Arabic' }}
                                                                            </a>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                                <div class="tab-content">
                                                                    @foreach(config('translatable.locales') as $locale)
                                                                        <div class="tab-pane fade {{ $loop->first ? "active show" : '' }}" id="{{ $locale }}_metatitle_booking_page_seo" role="tabpanel">
                                                                            <div class="pt-4">
                                                                                <div class="col-md-12">
                                                                                    <div class="form-group">
                                                                                        <label class="control-label">{{ $locale == 'en' ? 'English' : 'Arabic' }} Meta Title Booking Page SEO</label>

                                                                                        <input name="metatitle_booking_page_seo[{{ $locale }}][value]" value="{{ $settings['metatitle_booking_page_seo'][$locale] ?? old("metatitle_booking_page_seo.$locale.value") }}"
                                                                                                  rows="10"
                                                                                                  class="form-control"
                                                                                                  placeholder="{{ $locale == 'en' ? 'English' : 'Arabic' }} Meta Title booking Page SEO"/>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- END :: Meta Title offer book Page SEO< -->

                                                        <!-- BEGIN :: booking page seo -->
                                                        <div class="col-md-6">
                                                            <h4 class="ml-2">booking Page SEO</h4>
                                                            <div class="default-tab " style="width: 100%">
                                                                <ul class="nav nav-tabs" role="tablist">
                                                                    @foreach(config('translatable.locales') as $locale)
                                                                        <li class="nav-item">
                                                                            <a class="nav-link {{ $loop->first ? 'active' : '' }}" data-toggle="tab" href="#{{ $locale }}_booking_page_seo">
                                                                                {{ $locale == 'en' ? 'English' : 'Arabic' }}
                                                                            </a>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                                <div class="tab-content">
                                                                    @foreach(config('translatable.locales') as $locale)
                                                                        <div class="tab-pane fade {{ $loop->first ? "active show" : '' }}" id="{{ $locale }}_booking_page_seo" role="tabpanel">
                                                                            <div class="pt-4">
                                                                                <div class="col-md-12">
                                                                                    <div class="form-group">
                                                                                        <label class="control-label">{{ $locale == 'en' ? 'English' : 'Arabic' }} booking Page SEO</label>

                                                                                        <textarea name="booking_page_seo[{{ $locale }}][value]"
                                                                                                  rows="10"
                                                                                                  class="form-control"
                                                                                                  placeholder="{{ $locale == 'en' ? 'English' : 'Arabic' }} booking Page SEO">{!! $settings['booking_page_seo'][$locale] ?? old("booking_page_seo.$locale.value") !!}</textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- END :: booking page seo -->
                                                    </div>
                                                    <hr>

                                                    <div class="row mb-3">
                                                         <!-- BEGIN :: careers page seo -->
                                                         <div class="col-md-6">
                                                            <h4 class="ml-2">Careers Page SEO</h4>
                                                            <div class="default-tab " style="width: 100%">
                                                                <ul class="nav nav-tabs" role="tablist">
                                                                    @foreach(config('translatable.locales') as $locale)
                                                                        <li class="nav-item">
                                                                            <a class="nav-link {{ $loop->first ? 'active' : '' }}" data-toggle="tab" href="#{{ $locale }}_careers_page_seo">
                                                                                {{ $locale == 'en' ? 'English' : 'Arabic' }}
                                                                            </a>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                                <div class="tab-content">
                                                                    @foreach(config('translatable.locales') as $locale)
                                                                        <div class="tab-pane fade {{ $loop->first ? "active show" : '' }}" id="{{ $locale }}_careers_page_seo" role="tabpanel">
                                                                            <div class="pt-4">
                                                                                <div class="col-md-12">
                                                                                    <div class="form-group">
                                                                                        <label class="control-label">{{ $locale == 'en' ? 'English' : 'Arabic' }} Careers Page SEO</label>

                                                                                        <textarea name="careers_page_seo[{{ $locale }}][value]"
                                                                                                  rows="10"
                                                                                                  class="form-control"
                                                                                                  placeholder="{{ $locale == 'en' ? 'English' : 'Arabic' }} Careers Page SEO">{!! $settings['careers_page_seo'][$locale] ?? old("careers_page_seo.$locale.value") !!}</textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- END :: careers page seo -->
                                                     <!-- BEGIN :: review page seo -->
                                                        <div class="col-md-6">
                                                            <h4 class="ml-2">Review Page SEO</h4>
                                                            <div class="default-tab " style="width: 100%">
                                                                <ul class="nav nav-tabs" role="tablist">
                                                                    @foreach(config('translatable.locales') as $locale)
                                                                        <li class="nav-item">
                                                                            <a class="nav-link {{ $loop->first ? 'active' : '' }}" data-toggle="tab" href="#{{ $locale }}_review_page_seo">
                                                                                {{ $locale == 'en' ? 'English' : 'Arabic' }}
                                                                            </a>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                                <div class="tab-content">
                                                                    @foreach(config('translatable.locales') as $locale)
                                                                        <div class="tab-pane fade {{ $loop->first ? "active show" : '' }}" id="{{ $locale }}_review_page_seo" role="tabpanel">
                                                                            <div class="pt-4">
                                                                                <div class="col-md-12">
                                                                                    <div class="form-group">
                                                                                        <label class="control-label">{{ $locale == 'en' ? 'English' : 'Arabic' }} Review Page SEO</label>

                                                                                        <textarea name="review_page_seo[{{ $locale }}][value]"
                                                                                                  rows="10"
                                                                                                  class="form-control"
                                                                                                  placeholder="{{ $locale == 'en' ? 'English' : 'Arabic' }} Review Page SEO">{!! $settings['review_page_seo'][$locale] ?? old("review_page_seo.$locale.value") !!}</textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- END :: review page seo -->

                                                        <!-- BEGIN :: news page_seo page seo -->
                                                        <div class="col-md-6">
                                                            <h4 class="ml-2">News Page SEO</h4>
                                                            <div class="default-tab " style="width: 100%">
                                                                <ul class="nav nav-tabs" role="tablist">
                                                                    @foreach(config('translatable.locales') as $locale)
                                                                        <li class="nav-item">
                                                                            <a class="nav-link {{ $loop->first ? 'active' : '' }}" data-toggle="tab" href="#{{ $locale }}_news_page_seo">
                                                                                {{ $locale == 'en' ? 'English' : 'Arabic' }}
                                                                            </a>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                                <div class="tab-content">
                                                                    @foreach(config('translatable.locales') as $locale)
                                                                        <div class="tab-pane fade {{ $loop->first ? "active show" : '' }}" id="{{ $locale }}_news_page_seo" role="tabpanel">
                                                                            <div class="pt-4">
                                                                                <div class="col-md-12">
                                                                                    <div class="form-group">
                                                                                        <label class="control-label">{{ $locale == 'en' ? 'English' : 'Arabic' }} Review Page SEO</label>

                                                                                        <textarea name="news_page_seo[{{ $locale }}][value]"
                                                                                                  rows="10"
                                                                                                  class="form-control"
                                                                                                  placeholder="{{ $locale == 'en' ? 'English' : 'Arabic' }} Review Page SEO">{!! $settings['news_page_seo'][$locale] ?? old("news_page_seo.$locale.value") !!}</textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- END :: news page seo -->
                                                    </div>
                                                    <hr>
                                                </div>

                                                <button type="submit" class="btn btn-primary btn-block">Save</button>
                                            </form>
                                        </div>

                                        <div class="tab-pane fade" id="terms_and_conditions" role="tabpanel">
                                            <form class="form" method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data">
                                                @method('PUT')
                                                @csrf
                                                <div class="pt-4">
                                                    <div class="row">
                                                        <div class="col-md-6 form-group">
                                                            <label class="control-label">Terms and conditions image</label>
                                                            <input type="file"
                                                                   name="images[terms_and_conditions_image]"
                                                                   class="dropify"
                                                                   data-max-file-size="3M"
                                                                   data-default-file="{{ $settings['terms_and_conditions_image'] ?? '' }}" />
                                                        </div>
                                                    </div>

                                                    <hr>

                                                    <div class="row mb-3">
                                                        <h4 class="ml-2">Terms and conditions content</h4>
                                                        <div class="default-tab " style="width: 100%">
                                                            <ul class="nav nav-tabs" role="tablist">
                                                                @foreach(config('translatable.locales') as $locale)
                                                                    <li class="nav-item">
                                                                        <a class="nav-link {{ $loop->first ? 'active' : '' }}" data-toggle="tab" href="#{{ $locale }}_terms_and_conditions_content">
                                                                            {{ $locale == 'en' ? 'English' : 'Arabic' }}
                                                                        </a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                            <div class="tab-content">
                                                                @foreach(config('translatable.locales') as $locale)
                                                                    <div class="tab-pane fade {{ $loop->first ? "active show" : '' }}" id="{{ $locale }}_terms_and_conditions_content" role="tabpanel">
                                                                        <div class="pt-4">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label class="control-label">{{ $locale == 'en' ? 'English' : 'Arabic' }} Terms and conditions content</label>

                                                                                    <textarea name="terms_and_conditions_contnet[{{ $locale }}][value]"
                                                                                              rows="6"
                                                                                              id="summernote_terms_and_conditions_{{ $locale }}"
                                                                                              class="form-control"
                                                                                              placeholder="{{ $locale == 'en' ? 'English' : 'Arabic' }} Terms and conditions content">{!! $settings['terms_and_conditions_contnet'][$locale] ?? old("terms_and_conditions_contnet.$locale.value") !!}</textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <hr>

                                                    <button type="submit" class="btn btn-primary btn-block">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('back-scripts')
   <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
    <script>
        $('.dropify').dropify();
    </script>

    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js" integrity="sha512-9UR1ynHntZdqHnwXKTaOm1s6V9fExqejKvg5XMawEMToW4sSw+3jtLrYfZPijvnwnnE8Uol1O9BcAskoxgec+g==" crossorigin="anonymous"></script>
    <script>
        @foreach(config('translatable.locales') as $locale)
            $(document).ready(function() {
                $('#summernote_aboutus_{{ $locale }}').summernote({
                    height: 200
                });

                $('#summernote_terms_and_conditions_{{ $locale }}').summernote({
                    height: 600
                });
            });
        @endforeach
    </script>

    <script>
        $(document).ready(function(){
            var tagInputEle = $('.tags-input');
            tagInputEle.tagsinput();
        });
    </script>
@endsection

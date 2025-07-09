@extends('admin.layout.base')

@push('styles')
    <style>
        .form-control {
            border: 1px solid #c3c5cd;
        }
    </style>
@endpush

@section('title')
    Create a new Slider
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="basic-form">
                            <form class="form" method="POST" enctype="multipart/form-data" action="{{ route('admin.sliders.store') }}">
                                @method('POST')
                                @csrf


                                    <div class="form-row " style="margin-bottom:  10px">
                                        <div class="default-tab " style="width: 100%">
                                            <ul class="nav nav-tabs" role="tablist">
                                                @foreach(config('translatable.locales') as $locale)
                                                    <li class="nav-item">
                                                        <a class="nav-link {{ $loop->first ? 'active' : '' }}" data-toggle="tab" href="#{{ $locale }}">  {{ trans('messages.'.$locale) }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                            <div class="tab-content">
                                                @foreach(config('translatable.locales') as $locale)
                                                    <div class="tab-pane fade {{ $loop->first ? "active show" : '' }}" id="{{ $locale }}" role="tabpanel">
                                                        <div class="pt-4">
                                                            <div class="form-group col-md-12">
                                                                <label for="select_page_id"> @lang("messages.$locale") First Title</label>

                                                                <input name="{{ $locale }}[first_title]"
                                                                       value="{{ old("$locale.first_title") }}"
                                                                       class="form-control" />

                                                                @error("$locale.first_title")
                                                                <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group col-md-12">
                                                                <label for="select_page_id"> @lang("messages.$locale") Second Title</label>

                                                                <input name="{{ $locale }}[second_title]"
                                                                       value="{{ old("$locale.second_title") }}"
                                                                       class="form-control" />

                                                                @error("$locale.second_title")
                                                                <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group col-md-12">
                                                                <label for="select_page_id"> @lang("messages.$locale") Description</label>

                                                                <textarea id="input_page_name"
                                                                          name="{{ $locale }}[description]"
                                                                          class="form-control"
                                                                          rows="10">
                                                                    {{ old("$locale.description") }}
                                                                </textarea>

                                                                @error("$locale.description")
                                                                <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6 @error('image') has-danger @enderror">
                                            <label class="font-bold">Main Image (1920px x 1080px) <span class="text-danger">*</span></label>
                                            <input type="file" name="image" class="dropify" data-height="200" data-default-file=""/>
                                            @if($errors->has('image'))
                                                <span class="text-danger">{{ $errors->first('image') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                <button type="submit" class="btn btn-primary pull-right">Save</button>
                                <button type="button" onclick="parent.history.back();" class="btn btn-danger">Back</button>
                            </form>
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
@stop


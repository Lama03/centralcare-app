@extends('admin.layout.base')

@push('styles')
    <style>
        .form-control {
            border: 1px solid #a4a7b3;
        }
    </style>
@endpush

@section('title')
    Edit a Device ({{ $device->id }})
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="basic-form">
                            <form class="form" method="POST" enctype="multipart/form-data" action="{{ route('admin.devices.update', $device->id) }}">
                                @method('PUT')
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
                                                            <label for="name"> Name {{ $locale }}</label>
                                                            <input type="text" name="{{ $locale }}[name]" class="form-control" value="{{ $device->translate($locale)->name }}" />
                                                        </div>

                                                        <div class="form-group col-md-12">
                                                            <label for="description"> Description {{ $locale }}</label>
                                                            <textarea id="description" name="{{ $locale }}[description]" class="form-control" rows="10">{{ $device->translate($locale)->description }}</textarea>
                                                        </div>

                                                        <div class="form-group col-md-12">
                                                            <label for="features"> Features {{ $locale }}</label>
                                                            <textarea id="input_page_name"
                                                                      name="{{ $locale }}[features]"
                                                                      class="form-control"
                                                                      rows="15">{{ $device->translate($locale)->features }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6 @error('image') has-danger @enderror">
                                        <label class="font-bold">Main Image (1920px x 1080px) <span class="text-danger">*</span></label>
                                        <input type="file" name="image" class="dropify" data-height="200" data-default-file="{{ $device->image }}"/>
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
@endsection
@section('back-scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
<script>
    $('.dropify').dropify();
</script>
@endsection

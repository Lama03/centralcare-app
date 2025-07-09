@extends('admin.layout.base')

@push('styles')
    <style>
        .form-control {
            border: 1px solid #c3c5cd;
        }
    </style>
@endpush

@section('title')
    Edit a Services ({{ $form->name }})
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="basic-form">
                            <form class="form" method="POST" enctype="multipart/form-data" action="{{ route('admin.services.update', ['service' => $form->id]) }}">
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
                                                        <div class="form-group col-md-12 @error("$locale.name") has-danger @enderror">
                                                            <label for="name_id"> Name {{ $locale }} <span style="color: red">*</span></label>
                                                            <input type="text"
                                                                   id="name_id"
                                                                   name="{{ $locale }}[name]"
                                                                   placeholder="Enter name"
                                                                   value="{{ $form->translate($locale)->name }}"
                                                                   onload="convertToSlug(this.value, '{{ $locale }}')"
                                                                   onkeyup="convertToSlug(this.value, '{{ $locale }}')"
                                                                   class="form-control" />

                                                            @error("$locale.name")
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>

                                                        <div class="form-group col-md-12 @error("$locale.slug") has-danger @enderror">
                                                            <label for="slug_id"> Slug {{ $locale }} <span style="color: red">*</span></label>
                                                            <input type="text"
                                                                   id="slug_id"
                                                                   name="{{ $locale }}[slug]"
                                                                   placeholder="Enter slug"
                                                                   value="{{ $form->translate($locale)->slug }}"
                                                                   class="form-control slug_{{ $locale }}" />

                                                            @error("$locale.slug")
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>

                                                        <div class="form-group bmd-form-group col-md-12 @error("$locale.description") has-danger @enderror">
                                                            <label for="brif_id"> Description {{ $locale }} <span style="color: red">*</span></label>
                                                            <textarea id="brif_id" name="{{ $locale }}[description]" class="form-control" rows="10">{{ $form->translate($locale)->description }}</textarea>
                                                            @error("$locale.description")
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="header-left mt-2 mb-2" style="border: dashed;background-color: #e3e3e387;">
                                                            <div class="dashboard_bar ml-2">
                                                                Ceo Details {{ $locale }}
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="meta_title"> Meta Title {{ $locale }} </label>
                                                            <input type="text" id="meta_title" name="{{ $locale }}[meta_title]" placeholder="Enter title" value="{{ $form->translate($locale)->meta_title }}" class="form-control" />
                                                        </div>

                                                        <div class="form-group col-md-12">
                                                            <label for="canonical_url"> Canonical Url {{ $locale }} </label>
                                                            <input type="text" id="canonical_url" name="{{ $locale }}[canonical_url]" placeholder="Enter title" value="{{ $form->translate($locale)->canonical_url }}" class="form-control" />
                                                        </div>

                                                        <div class="form-group col-md-12">
                                                            <label for="meta_description"> Meta Description {{ $locale }}</label>
                                                            <textarea id="meta_description" name="{{ $locale }}[meta_description]" class="form-control" rows="10">{{ $form->translate($locale)->meta_description }}</textarea>
                                                        </div>

                                                        <div class="form-group col-md-12">
                                                            <label for="meta_keywords"> Meta Keywords {{ $locale }}</label>
                                                            <textarea id="meta_keywords" name="{{ $locale }}[meta_keywords]" class="form-control" rows="10">{{ $form->translate($locale)->meta_keywords }}</textarea>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label for="alt_image"> Alt image {{ $locale }} </label>
                                                            <input type="text" id="alt_image" name="{{ $locale }}[alt_image]" placeholder="Enter title" value="{{ $form->translate($locale)->alt_image }}" class="form-control" />
                                                        </div>
                                                        <hr style="border-top: 6px solid rgba(0, 0, 0, 0.47);">
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>

                                    <div class="form-group col-md-6 @error("icon") has-danger @enderror">
                                        <label for="icon"> Icon Text <span class="text-danger">*</span></label>
                                        <input type="text" id="icon" name="icon" placeholder="Enter Icon Text" value="{{ $form->icon }}" class="form-control" />

                                        @error("icon")
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                            <label for="type_of_place">Type Service<span style="color: red">*</span></label>
                                            <select class="custom-select form-control" name="type_of_place">
                                                <option value="1" {{ $form->type_of_place == '1' ? 'selected' : '' }}>Services Only</option>
                                                <option value="2" {{ $form->type_of_place == '2' ? 'selected' : '' }}>Offers Only</option>
                                                <option value="3" {{ $form->type_of_place == '3' ? 'selected' : '' }}>Both</option>
                                            </select>
                                    </div>
                                    <br>
                                    <div class="form-group col-md-6 @error('image') has-danger @enderror">
                                        <label class="font-bold">Image <span class="text-danger">*</span></label>
                                        <input type="file" name="image" class="dropify" data-height="200" data-default-file="{{$form->image}}"/>
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

    <script>
        $("#title").bind("paste", function(e){
            // access the clipboard using the api
            var pastedData = e.originalEvent.clipboardData.getData('text');

            convertToSlug(pastedData)
        } );


        /* Encode string to slug */
        function convertToSlug( str, local ) {
            //replace all special characters | symbols with a space
            str = str.replace(/[`~!@#$%^&*()_\-+=\[\]{};:'"\\|\/,.<>?\s]/g, ' ')
                .toLowerCase();

            // trim spaces at start and end of string
            str = str.replace(/^\s+|\s+$/gm,'');

            // replace space with dash/hyphen
            str = str.replace(/\s+/g, '-');

            $(".slug_"+  local +"").val(str)
        }

        /* Encode string to slug */
        function count( value ) {
            var words = value.split(" ");
            console.log(words.length);
        }
    </script>
@stop

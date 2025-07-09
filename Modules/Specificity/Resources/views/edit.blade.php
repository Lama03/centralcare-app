@extends('admin.layout.base')

@push('styles')
    <style>
        .form-control {
            border: 1px solid #c3c5cd;
        }
    </style>
@endpush

@section('title')
    Edit a Specificity ({{ $form->name }})
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="basic-form">
                            <form class="form" method="POST" enctype="multipart/form-data" action="{{ route('admin.specificities.update', ['specificity' => $form->id]) }}">
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

                                                        <div class="row">
                                                            <div class="form-group col-md-6 @error("$locale.name") has-danger @enderror">
                                                                <label for="name_id"> Name {{ $locale }} <span style="color: red">*</span></label>

                                                                <input type="text"
                                                                       id="name_id"
                                                                       name="{{ $locale }}[name]"
                                                                       placeholder="Enter name"
                                                                       value="{{ $form->translate($locale)->name }}"
                                                                       onload="convertToSlug(this.value, 'slug_input_{{ $locale }}')"
                                                                       onkeyup="convertToSlug(this.value, 'slug_input_{{ $locale }}')"
                                                                       class="form-control" />

                                                                @error("$locale.name")
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group col-md-6 @error("$locale.slug") has-danger @enderror">
                                                                <label for="slug_id"> Slug {{ $locale }} <span class="text-danger">*</span></label>

                                                                <input type="text"
                                                                       id="slug_input_{{ $locale }}"
                                                                       name="{{ $locale }}[slug]"
                                                                       placeholder="Enter slug"
                                                                       value="{{ $form->translate($locale)->slug }}"
                                                                       class="form-control" />

                                                                @error("$locale.slug")
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="desciption form-group bmd-form-group col-md-12 @error("$locale.description") has-danger @enderror">
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
                                                        <div class="form-group col-md-12">
                                                            <label for="alt_image"> Alt image {{ $locale }} </label>
                                                            <input type="text" id="alt_image" name="{{ $locale }}[alt_image]" placeholder="Enter title" value="{{ $form->translate($locale)->alt_image }}" class="form-control" />
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label for="alt_brief_image"> Alt Brief image {{ $locale }} </label>
                                                            <input type="text" id="alt_brief_image" name="{{ $locale }}[alt_brief_image]" placeholder="Enter title" value="{{ $form->translate($locale)->alt_brief_image }}" class="form-control" />
                                                        </div>
                                                        <hr style="border-top: 6px solid rgba(0, 0, 0, 0.47);">
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>


                                    <div class="form-group col-md-12 mt-3 @error('service_id') has-danger @enderror">
                                        <label for="service_id">Service<span style="color: red">*</span></label>
                                        <select class="custom-select form-control city-type" id="service_id" name="service_id">
                                            <option value="">-- Select --</option>
                                            @if(!empty($services))
                                                @foreach($services as $depart)
                                                <option value="{{$depart->id}}" {{ $form->service_id == $depart->id ? 'selected' : '' }}>{{$depart->name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @if($errors->has('service_id'))
                                            <span class="text-danger">{{ $errors->first('service_id') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-12">
                                    </div>

                                    <div class="form-group col-md-6 @error('icon') has-danger @enderror">
                                        <label class="font-bold">Image <span class="text-danger">*</span></label>
                                        <input type="file" name="icon" class="dropify" data-height="200" data-default-file="{{ $form->icon }}"/>
                                        @if($errors->has('icon'))
                                            <span class="text-danger">{{ $errors->first('icon') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group col-md-6 @error('image') has-danger @enderror">
                                        <label class="font-bold">Brief Image <span class="text-danger">*</span></label>
                                        <input type="file" name="image" class="dropify" data-height="200" data-default-file="{{ $form->image }}"/>
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
    <script type="text/javascript">
        tinymce.init({
            selector: '.desciption textarea',
            plugins: ' media link ,image code',
            height:350,
            toolbar: 'undo redo | image code',
            image_title: true,
            /* enable automatic uploads of images represented by blob or data URIs*/
            automatic_uploads: true,
            /*
                URL of our upload handler (for more details check: https://www.tiny.cloud/docs/configure/file-image-upload/#images_upload_url)
                images_upload_url: 'postAcceptor.php',
                here we add custom filepicker only to Image dialog
            */
            file_picker_types: 'image',
            /* and here's our custom image picker*/
            file_picker_callback: function (cb, value, meta) {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');

                /*
                Note: In modern browsers input[type="file"] is functional without
                even adding it to the DOM, but that might not be the case in some older
                or quirky browsers like IE, so you might want to add it to the DOM
                just in case, and visually hide it. And do not forget do remove it
                once you do not need it anymore.
                */

                input.onchange = function () {
                var file = this.files[0];

                var reader = new FileReader();
                reader.onload = function () {
                    /*
                    Note: Now we need to register the blob in TinyMCEs image blob
                    registry. In the next release this part hopefully won't be
                    necessary, as we are looking to handle it internally.
                    */
                    var id = 'blobid' + (new Date()).getTime();
                    var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                    var base64 = reader.result.split(',')[1];
                    var blobInfo = blobCache.create(id, file, base64);
                    blobCache.add(blobInfo);

                    /* call the callback and populate the Title field with the file name */
                    cb(blobInfo.blobUri(), { title: file.name });
                };
                reader.readAsDataURL(file);
                };

                input.click();
            },
        });
    </script>

    <script>
        /* Encode string to slug */
        function convertToSlug( str, element ) {

            //replace all special characters | symbols with a space
            str = str.replace(/[`~!@#$%^&*()_\-+=\[\]{};:'"\\|\/,.<>?\s]/g, ' ')
                .toLowerCase();

            // trim spaces at start and end of string
            str = str.replace(/^\s+|\s+$/gm,'');

            // replace space with dash/hyphen
            str = str.replace(/\s+/g, '-');

            $('#' + element).val(str);
        }
    </script>
@stop

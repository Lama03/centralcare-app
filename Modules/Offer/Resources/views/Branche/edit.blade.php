@extends('admin.layout.base')

@section('title')
    Edit a Offer Branche ({{ $form->name }})
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="basic-form">
                            <form class="form" method="POST" enctype="multipart/form-data" action="{{ route('admin.offer-branches.update', ['offer_branch' => $form->id]) }}">
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
                                                        <!-- @include('admin.layout.field', field('text', $locale.'[name]', 'Name', 6, $form->translate($locale), ['key' => 'name'])) -->
                                                        <div class="form-group bmd-form-group col-md-6 @error("$locale.name") has-danger @enderror">
                                                            <label for="name_id"> Name {{ $locale }} <span class="text-danger">*</span></label>
                                                            <input type="text" id="name_id" name="{{ $locale }}[name]" placeholder="Enter name" value="{{ $form->translate($locale)->name }}" class="form-control" />

                                                            @error("$locale.name")
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <!-- @include('admin.layout.field', field('text', $locale.'[slug]', 'Slug', 6, $form->translate($locale), ['key' => 'slug'])) -->
                                                        <div class="form-group bmd-form-group col-md-6 @error("$locale.slug") has-danger @enderror">
                                                            <label for="slug_id"> Slug {{ $locale }} <span class="text-danger">*</span></label>
                                                            <input type="text" id="slug_id" name="{{ $locale }}[slug]" placeholder="Enter slug" value="{{ $form->translate($locale)->slug }}" class="form-control" />

                                                            @error("$locale.slug")
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <!-- @include('admin.layout.field', field('text', $locale.'[desc_offer]', 'Title Offer', 6, $form->translate($locale), ['key' => 'desc_offer'])) -->
                                                        <div class="form-group bmd-form-group col-md-6 @error("$locale.desc_offer") has-danger @enderror">
                                                            <label for="desc_id"> Title Offer {{ $locale }} <span class="text-danger">*</span></label>
                                                            <input type="text" id="desc_id" name="{{ $locale }}[desc_offer]" placeholder="Enter Title" value="{{ $form->translate($locale)->desc_offer }}" class="form-control" />

                                                            @error("$locale.desc_offer")
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <!-- @include('admin.layout.field', field('text', $locale.'[currency]', 'Currency', 6, $form->translate($locale), ['key' => 'currency'])) -->
                                                        <div class="form-group bmd-form-group col-md-6 @error("$locale.currency") has-danger @enderror">
                                                            <label for="currency_id"> Currency {{ $locale }} <span class="text-danger">*</span></label>
                                                            <input type="text" id="currency_id" name="{{ $locale }}[currency]" placeholder="Enter currency" value="{{ $form->translate($locale)->currency }}" class="form-control" />

                                                            @error("$locale.currency")
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 @error('image') has-danger @enderror">
                                        <label class="font-bold">Image <span class="text-danger">*</span></label>
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
@endsection
@section('back-scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
<script>
    $('.dropify').dropify();
</script>
@endsection

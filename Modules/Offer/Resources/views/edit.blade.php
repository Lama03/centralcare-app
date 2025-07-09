@extends('admin.layout.base')

@section('title')
    Edit a Offer ({{ $form->name }})
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="basic-form">
                            <form class="form" method="POST" enctype="multipart/form-data" action="{{ route('admin.offers.update', ['offer' => $form->id]) }}">
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
                                                    <div class="form-group col-md-6 @error("$locale.name") has-danger @enderror">
                                                            <label for="name_id"> Name {{ $locale }} <span class="text-danger">*</span></label>
                                                            <input type="text" id="name_id" name="{{ $locale }}[name]" placeholder="Enter name" value="{{ $form->translate($locale)->name }}" class="form-control" />

                                                            @error("$locale.name")
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>

                                    <div class="form-group col-md-4 @error("price") has-danger @enderror">
                                        <label for="price_id"> Price <span class="text-danger">*</span></label>
                                        <input type="text" id="price_id" name="price" placeholder="Enter Price" value="{{ $form->price }}" class="form-control" />

                                        @error("price")
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    {{--<div class="form-group col-md-4">
                                        <label for="discount_id"> Discount (%)</label>
                                        <input type="text" id="discount_id" name="discount" placeholder="Enter Discount" value="{{ $form->discount }}" class="form-control" />
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="price_after"> Price After Discount</label>
                                        <input type="text" id="price_after" name="price_after_discount" placeholder="Enter Price After Discount" value="{{ $form->price_after_discount }}" class="form-control" />
                                    </div>--}}

                                    <div class="form-group col-md-12 @error('service_id') has-danger @enderror">
                                            <label for="service_id">Service<span style="color: red">*</span></label>
                                            <select class="custom-select form-control city-type" id="service_id" name="service_id">
                                                <option value="">-- Select --</option>
                                                @if(!empty($services))
                                                    @foreach($services as $service)
                                                    <option value="{{$service->id}}" {{ $form->service_id == $service->id ? 'selected' : '' }}>{{$service->name}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            @if($errors->has('service_id'))
                                                <span class="text-danger">{{ $errors->first('service_id') }}</span>
                                            @endif
                                    </div>

                                    {{--<div class="form-group col-md-6 @error('branche_id') has-danger @enderror">
                                            <label for="branche_id">Offer Branches<span style="color: red">*</span></label>
                                            <select class="custom-select form-control city-type" id="branche_id" name="branche_id">
                                                <option value="">-- Select --</option>
                                                @if(!empty($branches))
                                                    @foreach($branches as $branche)
                                                    <option value="{{$branche->id}}" {{ $form->branche_id == $branche->id ? 'selected' : '' }}>{{$branche->name}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            @if($errors->has('branche_id'))
                                                <span class="text-danger">{{ $errors->first('branche_id') }}</span>
                                            @endif
                                    </div>--}}

                                    <div class="form-group col-md-6 @error('image') has-danger @enderror">
                                        <label class="font-bold">Image <span class="text-danger">*</span></label>
                                        <input type="file" name="image" class="dropify" data-height="200" data-default-file="{{ $form->image }}"/>
                                        @if($errors->has('image'))
                                            <span class="text-danger">{{ $errors->first('image') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group col-md-6 @error('slider_image') has-danger @enderror">
                                        <label class="font-bold">Slider Image </label>
                                        <input type="file" name="slider_image" class="dropify" data-height="200" data-default-file="{{ $form->slider_image }}"/>
                                        @if($errors->has('slider_image'))
                                            <span class="text-danger">{{ $errors->first('slider_image') }}</span>
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
<script>
    $(document).ready(function() {
    $("#discount_id").keyup(function() {
        var discount = $(this).val();
        if(discount.length > 0 && $.isNumeric(discount)) {
            $("#price_after").attr('disabled',false).attr('required',true);
        } else {
            $("#discount_id").val('');
            $("#price_after").val('');
            $("#price_after").attr('disabled',true).attr('required',false);
        }
    });
    })
</script>
@endsection

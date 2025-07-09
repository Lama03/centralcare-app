@extends('admin.layout.base')

@section('title')
    Edit a Ticket ({{ $form->name }})
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="basic-form">
                            <form class="form" method="POST" enctype="multipart/form-data" action="{{ route('admin.tickets.update', ['ticket' => $form->id]) }}">
                                @method('PUT')
                                @csrf

                                <div class="form-row " style="margin-bottom:  10px">
                                    @include('admin.layout.field', field('text', 'name', 'Name', 4, $form))
                                    @include('admin.layout.field', field('text', 'phone', 'Phone', 4, $form))
                                    @include('admin.layout.field', field('text', 'email', 'Email', 4, $form))
                                    @if($form->topic == 'CONTACTUS')
                                    <div class="form-group col-md-6  bmd-form-gtroup">
                                            <label for="status">Purpose of contact</label>
                                            <select class="form-control" name="type_purpose" disabled>
                                                <option value="">-- Select --</option>
                                                <option value="1" {{ $form->type_purpose == '1' ? 'selected' : '' }}>Enquiry</option>
                                                <option value="2" {{ $form->type_purpose == '2' ? 'selected' : '' }}>Complaint</option>
                                                <option value="3" {{ $form->type_purpose == '3' ? 'selected' : '' }}>Suggestion</option>
                                                <option value="4" {{ $form->type_purpose == '4' ? 'selected' : '' }}>Other</option>
                                            </select>                                            
                                    </div>
                                    @endif
                                    @include('admin.layout.field', field('textarea', 'content', 'Content', 6, $form))
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

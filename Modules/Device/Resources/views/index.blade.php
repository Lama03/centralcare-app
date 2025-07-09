@extends('admin.layout.base')

@section('title')
    Devices
@endsection

@section('content')
    <div class="container-fluid">
        @include('admin.layout.alerts')
        <devices-list></devices-list>
    </div>
@endsection

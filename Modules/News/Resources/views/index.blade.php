@extends('admin.layout.base')

@section('title')
    News
@endsection

@section('content')
    <div class="container-fluid">
        @include('admin.layout.alerts')
        <news-list></news-list>
    </div>
@endsection

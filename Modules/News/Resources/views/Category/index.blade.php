@extends('admin.layout.base')

@section('title')
    News Categories
@endsection

@section('content')
    <div class="container-fluid">
        @include('admin.layout.alerts')
        <news-categories-list></news-categories-list>
    </div>
@endsection

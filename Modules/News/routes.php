<?php

use Illuminate\Support\Facades\Route;

$namespace = 'Modules\\News\\Controllers\\';

Route::prefix('/admin')->middleware('auth:web')->attribute('namespace', $namespace.'Admin')->as('admin.')->group( function () {
    Route::resource('news', 'NewsController')->only('index', 'edit', 'update', 'create', 'store');
    Route::get('/news/{news}/disable', 'NewsController@disable')->name('news.disable');
    Route::get('/news/{news}/enable', 'NewsController@enable')->name('news.enable');
});

Route::prefix('/admin')->middleware('auth:web')->attribute('namespace', $namespace.'Admin')->as('admin.')->group( function () {
    Route::resource('news-categories', 'NewsCategoryController')->only('index', 'edit', 'update', 'create', 'store');
});

Route::prefix('/api')->middleware('auth:web')->attribute('namespace', $namespace.'Api')->group( function () {
    Route::get('/news', 'NewsController@index')->name('api.news.index');
});

Route::prefix('/api')->middleware('auth:web')->attribute('namespace', $namespace.'Api')->group( function () {
    Route::get('/news-categories', 'CategoryController@index')->name('api.news.categories.index');
});

Route::group(['middleware' => 'language', 'where' => ['locale' => '[a-zA-Z]{2}'], 'namespace' => $namespace.'Web'], function () {
    Route::get('news/{news}', 'NewsController@details')->name('news.details');
});

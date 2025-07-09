<?php

use Illuminate\Support\Facades\Route;

$namespace = 'Modules\\Setting\\Controllers\\';

Route::prefix('/admin')->middleware('auth:web')->attribute('namespace', $namespace.'Admin')->as('admin.')->group( function () {
    Route::get('settings', 'SettingController@index')->name('settings.index');
    Route::put('settings/update', 'SettingController@update')->name('settings.update');
});


Route::prefix('/api')->middleware('auth:web')->attribute('namespace', $namespace.'Api')->group( function () {
    Route::get('/settings', 'SettingController@index')->name('api.settings.index');
});


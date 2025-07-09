<?php

use Illuminate\Support\Facades\Route;

$namespace = 'Modules\\Device\\Controllers\\';

Route::prefix('/api')->middleware('auth:web')->attribute('namespace', $namespace.'Api')->group( function () {
    Route::get('/devices', 'DeviceController@index')->name('api.devices.index');
});

Route::prefix('/admin')->middleware('auth:web')->attribute('namespace', $namespace.'Admin')->as('admin.')->group( function () {
    Route::resource('devices', 'DeviceController')->only('index', 'edit', 'update', 'create', 'store');
    Route::get('/devices/{device}/disable', 'DeviceController@disable')->name('devices.disable');
    Route::get('/devices/{device}/enable', 'DeviceController@enable')->name('devices.enable');
});

Route::group(['middleware' => 'language', 'where' => ['locale' => '[a-zA-Z]{2}'], 'namespace' => $namespace.'Web'], function () {
    Route::get('list/devices', 'DeviceController@index')->name('web.devices.index');
});

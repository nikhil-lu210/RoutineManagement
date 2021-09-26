<?php

use Illuminate\Support\Facades\Route;


// Dashboard
Route::group([
    'prefix' => '', //URL
    'as' => 'dashboard.', //Route
],
    function(){
        Route::get('/', 'DashboardController@index')->name('index');
    }
);

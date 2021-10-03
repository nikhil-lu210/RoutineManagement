<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/{any}', function () {
    return view('layouts.admin.app');
})->where('any', '.*');

<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

/*==============================================================
======================< admin Routes >==========================
==============================================================*/
Route::group(
    [
        'middleware' => ['web'],
    ],
    function () {
        Route::view('/', 'layouts.admin.app');
        include_once 'admin/admin.php';
    }
);

Route::get('/{any}', function () {
    return view('layouts.admin.app');
})->where('any', '.*');

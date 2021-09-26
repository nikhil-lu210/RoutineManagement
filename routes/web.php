<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

/*==============================================================
======================< admin Routes >==========================
==============================================================*/
Route::group(
    [
        'middleware' => ['auth', 'admin'],
    ],
    function () {
        include_once 'admin/admin.php';
    }
);

Route::get('/{any}', function () {
    return view('layouts.admin.app');
})->where('any', '.*');

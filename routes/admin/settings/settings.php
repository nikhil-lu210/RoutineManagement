<?php

use Illuminate\Support\Facades\Route;


Route::prefix('settings')->name('settings.')->group(function () {
    include_once 'student_class/student_class.php';
});

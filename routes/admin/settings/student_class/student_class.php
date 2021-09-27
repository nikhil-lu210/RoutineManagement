<?php

use App\Http\Controllers\Admin\Settings\StudentClass;
use Illuminate\Support\Facades\Route;


Route::prefix('student_class')->name('student_class.')->group(function () {
    Route::resource('/', StudentClass::class)->except(['create', 'show', 'edit', 'destroy']);
});

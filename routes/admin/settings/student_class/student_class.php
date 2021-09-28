<?php

use App\Http\Controllers\Admin\Settings\StudentClassController;
use Illuminate\Support\Facades\Route;


Route::prefix('student_class')->name('student_class.')->group(function () {
    // Route::resource('/', StudentClassController::class)->except(['create', 'show', 'edit', 'destroy']);
    Route::get('/', [StudentClassController::class, 'index'])->name('index');
    Route::post('/store', [StudentClassController::class, 'store'])->name('store');
    Route::post('/update/{id}', [StudentClassController::class, 'update'])->name('update');
});

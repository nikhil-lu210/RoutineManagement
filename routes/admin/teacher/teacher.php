<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Teacher\TeacherController;


Route::prefix('teacher')->name('teacher.')->group(function () {
    Route::get('/', [TeacherController::class, 'index'])->name('index');
    Route::post('/store', [TeacherController::class, 'store'])->name('store');
    Route::get('/show/{teacher_id}', [TeacherController::class, 'show'])->name('show');
    Route::post('/update/{id}', [TeacherController::class, 'update'])->name('update');
});

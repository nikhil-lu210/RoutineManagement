<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Student\StudentController;


Route::prefix('student')->name('student.')->group(function () {
    Route::get('/', [StudentController::class, 'index'])->name('index');
    Route::post('/store', [StudentController::class, 'store'])->name('store');
    Route::get('/show/{Student_id}', [StudentController::class, 'show'])->name('show');
    Route::post('/update/{id}', [StudentController::class, 'update'])->name('update');
});

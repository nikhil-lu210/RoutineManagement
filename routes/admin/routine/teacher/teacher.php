<?php

use App\Http\Controllers\Admin\Routine\GroupTeacherController;
use Illuminate\Support\Facades\Route;


Route::prefix('teacher')->name('teacher.')->group(function () {
    Route::get('/', [GroupTeacherController::class, 'index'])->name('index');
    Route::post('/store', [GroupTeacherController::class, 'store'])->name('store');
    Route::post('/update/{id}', [GroupTeacherController::class, 'update'])->name('update');
});

<?php

use App\Http\Controllers\Admin\Settings\PeriodController;
use Illuminate\Support\Facades\Route;


Route::prefix('period')->name('period.')->group(function () {
    Route::get('/', [PeriodController::class, 'index'])->name('index');
    Route::post('/store', [PeriodController::class, 'store'])->name('store');
    Route::post('/update/{id}', [PeriodController::class, 'update'])->name('update');
});

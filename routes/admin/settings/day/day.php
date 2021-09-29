<?php

use App\Http\Controllers\Admin\Settings\DayController;
use Illuminate\Support\Facades\Route;


Route::prefix('day')->name('day.')->group(function () {
    // Route::resource('/', DayController::class)->except(['create', 'show', 'edit', 'destroy']);
    Route::get('/', [DayController::class, 'index'])->name('index');
    Route::post('/store', [DayController::class, 'store'])->name('store');
    Route::post('/update/{id}', [DayController::class, 'update'])->name('update');
});

<?php

use App\Http\Controllers\Admin\Settings\YearController;
use Illuminate\Support\Facades\Route;


Route::prefix('year')->name('year.')->group(function () {
    // Route::resource('/', YearController::class)->except(['create', 'show', 'edit', 'destroy']);
    Route::get('/', [YearController::class, 'index'])->name('index');
    Route::post('/store', [YearController::class, 'store'])->name('store');
    Route::post('/update/{id}', [YearController::class, 'update'])->name('update');
});

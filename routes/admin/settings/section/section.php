<?php

use App\Http\Controllers\Admin\Settings\SectionController;
use Illuminate\Support\Facades\Route;


Route::prefix('section')->name('section.')->group(function () {
    // Route::resource('/', SectionController::class)->except(['create', 'show', 'edit', 'destroy']);
    Route::get('/', [SectionController::class, 'index'])->name('index');
    Route::post('/store', [SectionController::class, 'store'])->name('store');
    Route::post('/update/{id}', [SectionController::class, 'update'])->name('update');
});

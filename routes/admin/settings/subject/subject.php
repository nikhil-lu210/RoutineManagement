<?php

use App\Http\Controllers\Admin\Settings\SubjectController;
use Illuminate\Support\Facades\Route;


Route::prefix('subject')->name('subject.')->group(function () {
    // Route::resource('/', SubjectController::class)->except(['create', 'show', 'edit', 'destroy']);
    Route::get('/', [SubjectController::class, 'index'])->name('index');
    Route::post('/store', [SubjectController::class, 'store'])->name('store');
    Route::post('/update/{id}', [SubjectController::class, 'update'])->name('update');
});

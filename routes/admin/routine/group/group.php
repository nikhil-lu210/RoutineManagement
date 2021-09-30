<?php

use App\Http\Controllers\Admin\Routine\RoutineGroupController;
use Illuminate\Support\Facades\Route;


Route::prefix('group')->name('group.')->group(function () {
    Route::get('/', [RoutineGroupController::class, 'index'])->name('index');
    Route::post('/store', [RoutineGroupController::class, 'store'])->name('store');
    Route::post('/update/{id}', [RoutineGroupController::class, 'update'])->name('update');
});

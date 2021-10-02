<?php

use App\Http\Controllers\Admin\Routine\RoutineController;
use Illuminate\Support\Facades\Route;


Route::prefix('routine')->name('routine.')->group(function () {
    Route::get('/', [RoutineController::class, 'index'])->name('index');
    Route::get('/latest', [RoutineController::class, 'latestRoutine'])->name('latest');
    Route::get('/create', [RoutineController::class, 'create'])->name('create');
    Route::post('/store', [RoutineController::class, 'store'])->name('store');
    Route::post('/update/{id}', [RoutineController::class, 'update'])->name('update');
});

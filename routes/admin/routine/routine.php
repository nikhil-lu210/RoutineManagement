<?php

use Illuminate\Support\Facades\Route;


Route::prefix('routine')->name('routine.')->group(function () {
    include_once 'group/group.php';
});

<?php

use Illuminate\Support\Facades\Route;


Route::prefix('routine')->name('routine.')->group(function () {
    include_once 'routine/routine.php';
    include_once 'group/group.php';
    include_once 'teacher/teacher.php';
});

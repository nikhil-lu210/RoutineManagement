<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function () {
    include_once 'teacher/teacher.php';
    include_once 'student/student.php';
    include_once 'settings/settings.php';
});

<?php

use Illuminate\Support\Facades\Route;


Route::prefix('settings')->name('settings.')->group(function () {
    include_once 'student_class/student_class.php';
    include_once 'subject/subject.php';
    include_once 'year/year.php';
    include_once 'day/day.php';
    include_once 'section/section.php';
});

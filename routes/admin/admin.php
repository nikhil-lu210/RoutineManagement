<?php

use Illuminate\Support\Facades\Route;

// admin Routes
Route::group([
    'prefix' => 'admin', // URL
    'as' => 'admin.', // Route
    'namespace' => 'Admin', // Controller
],
    function(){
        /* ==================================
        ============< Dashboard >============
        ===================================*/
        // Dashboard
        include_once 'dashboard/dashboard.php';
    }
);

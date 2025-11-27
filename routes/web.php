<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view()->first(['welcome', 'fallback.welcome'], [
        'currentPath' => request()->getPathInfo(),
    ]);
});
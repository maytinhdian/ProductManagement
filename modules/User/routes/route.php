<?php

use Illuminate\Support\Facades\Route;

Route::middleware('demo')->get('/user', function () {
    return config('config.test');
});

<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionUserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [JobController::class, 'index']);

Route::controller(RegisteredUserController::class)->group(function() {
    Route::get('/register', 'create');
    Route::post('/register', 'store');
});

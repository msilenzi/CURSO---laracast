<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SessionUserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [JobController::class, 'index']);
Route::get('/search', SearchController::class);

Route::controller(RegisteredUserController::class)
    ->middleware("guest")
    ->group(function() {
        Route::get('/register', 'create');
        Route::post('/register', 'store');
    });

Route::controller(SessionUserController::class)->group(function() {
    Route::get('/login', 'create')->middleware("guest");
    Route::post('/login', 'store')->middleware("guest");
    Route::delete('/logout', 'destroy')->middleware("auth");
});

<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home', ['title' => 'Home']);
// Route::get('/', function () {
//     return view('home', ['title' => 'Home']);
// });

Route::view('/contact','contact', ['title' => 'Contact',]);

Route::resource('jobs', JobController::class);
// Route::controller(JobController::class)->group(function () {
//     Route::get('/jobs', 'index');
//     Route::get('/jobs/create', 'create');
//     Route::post('/jobs', 'store');
//     Route::get('/jobs/{job}', 'show');
//     Route::get('/jobs/{job}/edit', 'edit');
//     Route::patch('/jobs/{job}', 'update');
//     Route::delete('/jobs/{job}', 'destroy');
// });

Route::controller(RegisterUserController::class)->group(function () {
    Route::get('/auth/register', 'create');
    Route::post('/auth/register', 'store');
});

Route::controller(SessionController::class)->group(function () {
    Route::get('/auth/login', 'create');
    Route::post('/auth/login', 'store');
    Route::post('/auth/logout', 'destroy');
});

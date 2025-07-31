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

// Este atajo no permite definir políticas independientes para cada ruta:
// Route::resource('jobs', JobController::class);

Route::controller(JobController::class)->group(function () {
    Route::get('/jobs', 'index');

    Route::get('/jobs/create', 'create')
        ->middleware('auth');

    Route::post('/jobs', 'store')
        ->middleware('auth');

    Route::get('/jobs/{job}', 'show');

    Route::get('/jobs/{job}/edit', 'edit')
        ->middleware('auth')
        ->can('update', 'job');

    Route::patch('/jobs/{job}', 'update')
        ->middleware('auth')
        ->can('update', 'job');

    Route::delete('/jobs/{job}', 'destroy')
        ->middleware('auth')
        ->can('destroy', 'job');
});

Route::controller(RegisterUserController::class)->group(function () {
    Route::get('/auth/register', 'create');
    Route::post('/auth/register', 'store');
});

Route::controller(SessionController::class)->group(function () {
    Route::get('/auth/login', 'create')->name('login');
    Route::post('/auth/login', 'store');
    Route::post('/auth/logout', 'destroy');
});

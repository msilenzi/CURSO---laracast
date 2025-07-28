<?php

use App\Models\Job;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', [
        'title' => 'Home'
    ]);
});

Route::get('/jobs', function() {
    return view('jobs', [
        'title' => 'Jobs',
        'jobs' => Job::with('employer')->get()
    ]);
});

Route::get('/jobs/{id}', function ($id) {
    return view('job', [
        'title' => 'Job',
        'job' => Job::find($id)
    ]);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact',]);
});

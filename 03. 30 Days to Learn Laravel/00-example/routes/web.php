<?php

use App\Models\Job;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'Home']);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact',]);
});

/*
 * Jobs ========================================================================
 */

// Display all jobs:
Route::get('/jobs', function() {
    return view('jobs.index', [
        'title' => 'Jobs',
        'jobs' => Job::with('employer')->latest()->paginate(10)
    ]);
});

// Create a job:
Route::get('/jobs/create', function() {
    return view('jobs.create', ['title' => 'Create Job']);
});

// Display one job:
Route::get('/jobs/{id}', function ($id) {
    return view('jobs.show', [
        'title' => 'Job',
        'job' => Job::find($id)
    ]);
});

// Create a new job:
Route::post('/jobs', function() {
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required']
    ]);

    $newJob = Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1,
    ]);

    return redirect("/jobs/{$newJob['id']}");
});

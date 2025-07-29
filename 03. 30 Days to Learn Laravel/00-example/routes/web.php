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

Route::get('/jobs', function() {
    return view('jobs.index', [
        'title' => 'Jobs',
        'jobs' => Job::with('employer')->latest()->paginate(10)
    ]);
});

Route::get('/jobs/create', function() {
    return view('jobs.create', ['title' => 'Create Job']);
});

Route::get('/jobs/{id}', function ($id) {
    return view('jobs.show', [
        'title' => 'Job',
        'job' => Job::find($id)
    ]);
});

Route::post('/jobs', function() {
    $newJob = Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1,
    ]);

    return redirect("/jobs/{$newJob['id']}");
});

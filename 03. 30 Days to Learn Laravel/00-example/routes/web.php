<?php

use App\Models\Jobs;
use Illuminate\Support\Facades\Route;

$jobs = [
    ['id' => 1, 'title' => 'Director',   'salary' => '$50,000'],
    ['id' => 2, 'title' => 'Programmer', 'salary' => '$40,000'],
    ['id' => 3, 'title' => 'Teacher',    'salary' => '$30,000']
];

Route::get('/', function () {
    return view('home', [
        'title' => 'Home'
    ]);
});

Route::get('/jobs', fn() => view('jobs', [
    'title' => 'Jobs',
    'jobs' => Jobs::findAll()
]));

Route::get('/jobs/{id}', function ($id) use ($jobs) {
    return view('job', [
        'title' => 'Job',
        'job' => Jobs::findOneById($id)
    ]);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact',]);
});

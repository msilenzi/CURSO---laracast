<?php

namespace App\Http\Controllers;

use App\Mail\JobPosted;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class JobController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        return view('jobs.index', [
            'title' => 'Jobs',
            'jobs' => Job::with('employer')->latest()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view('jobs.create', ['title' => 'Create Job']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required']
        ]);

        $newJob = Job::create([
            'title' => request('title'),
            'salary' => request('salary'),
            'employer_id' => 1,
        ]);

        Mail::to($newJob->employer->user)->send(new JobPosted($newJob));

        return redirect("/jobs/{$newJob['id']}");
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job) {
        return view('jobs.show', [
            'title' => 'Job',
            'job' => $job
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job) {
        return view('jobs.edit', [
            'title' => 'Job',
            'job' => $job
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Job $job) {
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required']
        ]);

        $job->update([
            'title' => request('title'),
            'salary' => request('salary')
        ]);

        return redirect("/jobs/{$job->id}");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job) {
        $job->delete();
        return redirect('/jobs');
    }
}

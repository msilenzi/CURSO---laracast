<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class JobController extends Controller
{
    public function index()
    {
        return view('jobs.index', [
            // ALWAYS USE THE `WITH()` METHOD to eager load any relationship we require and avoid the n+1 problem.
            // The `with()` method brings the model with the relationships in a single optimized query,
            // instead of querying for each one separately.
            'jobs' => Job::latest()->with(['employer', 'tags'])->get(),
            'tags' => Tag::all(),
        ]);
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'title' => ['required'],
            'salary' => ['required'],
            'location' => ['required'],
            'employment_type' => [
                'required',
                Rule::in(['Full Time', 'Part Time', 'Contract', 'Internship', 'Temporary']
                )],
            'url' => ['required', 'active_url'],
            'tags' => ['nullable'],
        ]);
        $attributes['featured'] = $request->has('featured');

        $newJob = Auth::user()->employer->jobs()->create(Arr::except($attributes, 'tags'));

        if ($request->filled('tags')) {
            foreach (explode(',', $attributes['tags']) as $tag) {
                $newJob->tag($tag);
            }
        }

        return redirect('/');
    }
}

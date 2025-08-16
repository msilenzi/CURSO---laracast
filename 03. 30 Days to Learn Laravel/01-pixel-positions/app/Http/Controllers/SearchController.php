<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class SearchController extends Controller {
    // Se invoca automáticamente, sin necesidad de especificarlo en el router
    // Este enfoque es útil cuadno se quiere crear un controller que realiza
    // una sola acción.
    public function __invoke(Request $request) {
        $jobs = Job::where('title', 'LIKE', '%'.$request->q.'%')->get();
        return view('jobs.results', [
            'jobs' => $jobs,
            'search' => $request->q,
        ]);
    }
}

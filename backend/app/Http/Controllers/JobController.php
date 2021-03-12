<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use Laravel\Lumen\Routing\Controller as BaseController;

class JobController extends BaseController
{
    public function create(Request $request)
    {
        $job = new Job;
        $job->title = $request->title;
        $job->description = $request->description;
        $job->date = $request->date;
        $job->location = $request->location;
        $job->applicants = $request->applicants;
        $job->save();

        return response()->json($job);
    }

    public function show()
    {
        $jobs = Job::all();

        return response()->json($jobs);
        
    }
}

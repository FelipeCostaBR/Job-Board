<?php

namespace App\Http\Controllers;
use Laravel\Lumen\Routing\Controller as BaseController;

use App\Models\Job;

class JobController extends BaseController
{
    public function show()
    {
        $jobs = Job::all();
        return response()->json($jobs);
    }
}

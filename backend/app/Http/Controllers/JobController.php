<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Laravel\Lumen\Routing\Controller as BaseController;

use App\Models\Job;

class JobController extends BaseController
{
    public function create()
    {
        $row = 1;
        $file = fopen(storage_path('app/jobs.csv'), "r");
        while (($data = fgetcsv($file)) !== FALSE) {
            if ($row > 1) {
                $job = new Job;
                $job->title = $data[0];
                $job->description = $data[1];
                $job->date = $data[2];
                $job->location = $data[3];
                $job->applicants = $data[4];
                $job->save();
            }
            $row++;
        }
        
        return response()->json(["msg" => "File successfully updated"]);
    }

    public function show()
    {
        $jobs = Job::all();
        return response()->json($jobs);
    }
}

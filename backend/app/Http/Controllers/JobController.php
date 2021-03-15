<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Laravel\Lumen\Routing\Controller as BaseController;

class JobController extends BaseController
{
    public function show()
    {
        try {
            $jobs = DB::table('jobs')->select('*')->get();
            return response()->json($jobs);
        } catch (\Throwable $th) {
            return response()
                ->json([['error' => $th, 'message' => 'bad request']], 401);
        }
    }

    public function job_details($id)
    {
        try {
            $jobs_details = DB::table('jobs_applicants')
            ->join('jobs', 'jobs_applicants.id_job', '=', 'jobs.id')
            ->join('applicants', 'jobs_applicants.id_applicant', '=', 'applicants.name')
            ->select('jobs.title', 'jobs.description', 'jobs.date', 'jobs.location', 'applicants.name')
            ->where('jobs_applicants.id_job', '=', $id)
            ->get();

        $applicants = array();
        foreach ($jobs_details as $value) {
            array_push($applicants, ['name' => $value->name]);
        }
        $first_job_element = $jobs_details[0];

        $job_detail = [
            [
                'title' =>  $first_job_element->title,
                'description' =>  $first_job_element->description,
                'location' =>  $first_job_element->location,
                'date' =>  $first_job_element->date,
                'applicants' => $applicants
            ]
        ];

        return response()->json($job_detail);
        } catch (\Throwable $th) {
            return response()
                ->json([['error' => $th, 'message' => 'bad request']], 401);
        }

    }
}

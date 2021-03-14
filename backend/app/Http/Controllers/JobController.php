<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laravel\Lumen\Routing\Controller as BaseController;

class JobController extends BaseController
{
    public function show()
    {
        $jobs = DB::table('jobs')->select('*')->get();
        return response()->json($jobs);
    }

    public function job_details($id)
    {
        $jobs_details = DB::table('jobs_applicants')
        ->join('jobs', 'jobs_applicants.id_job', '=', 'jobs.id')
        ->join('applicants', 'jobs_applicants.id_applicant', '=', 'applicants.name')
        ->select('jobs.title', 'jobs.description', 'jobs.date', 'jobs.location', 'applicants.name')
        ->where('jobs_applicants.id_job', '=', $id)
        ->get();


        return response()->json($jobs_details);
    }
}



// $sql = "SELECT jobs.*, 
// (SELECT DISTINCT name FROM applicants WHERE name = jobs_applicants.id_applicant) AS name
//             FROM jobs_applicants
//             INNER JOIN jobs ON jobs.id = jobs_applicants.id_job 
//                 WHERE jobs_applicants.id_job = ?
//                 GROUP BY jobs_applicants.id_applicant, jobs.id";

// // $sql = "SELECT DISTINCT applicants.name FROM applicants 
// //         INNER JOIN jobs_applicants ON jobs_applicants.id_applicant = applicants.name
// //         WHERE jobs_applicants.id_applicant = $id";

// $jobs_details = DB::select($sql, [$id]);
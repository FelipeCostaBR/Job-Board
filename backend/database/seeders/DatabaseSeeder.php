<?php
// RUN artisan db:seed

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Models\Job;
use App\Models\Applicant;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $row = 1;
        $applicantsArray = array();
        $file = fopen(storage_path('app/jobs.csv'), "r");

        // check for all applicants in the file and push into array.
        while (($data = fgetcsv($file)) !== FALSE) {
            if ($row > 1) {
                $applicant_list = $data[4];
                foreach (explode(',', $applicant_list) as $name) {
                    array_push($applicantsArray, trim($name));
                }
            }
            $row++;
        }
        // after check all the applicants in the file make it unique and insert into applicants table.
        $uniqueApplicants = array_unique($applicantsArray);

        foreach ($uniqueApplicants as $name) {
            $applicant = new Applicant;
            $applicant->name = $name;
            $applicant->save();
        }


        // check for all jobs in the file and insert into jobs table..
        rewind($file);
        $row = 1;
        while (($data = fgetcsv($file)) !== FALSE) {
            if ($row > 1) {
                $job = new Job;
                $job->title = $data[0];
                $job->description = $data[1];
                $job->date = $data[2];
                $job->location = $data[3];
                $job->save();


                // Insert into jobs_applicants table the relation of one job and all applicants.
                $applicantsList = explode(',', $data[4],);
                foreach ($applicantsList as $name) {
                    DB::insert(
                        'insert into jobs_applicants (id_job, id_applicant) values (?, ?)',
                        [$job->id, trim($name)]
                    );
                }
            }
            $row++;
        }
    }
}


        // rewind($file);
        // $row = 1;
        // $applicantsArray = array();
        // while (($data = fgetcsv($file)) !== FALSE) {
        //     if ($row > 1) {

        //         foreach (explode(',', $data[4],) as $key => $value) {
        //             array_push($applicantsArray, trim($value));
        //         }
        //         // $applicantsArray = explode(',',$data[4],);
        //     }
        //     $row++;
        // }
        // $uniqueApplicants = array_unique($applicantsArray);





        // $applicantObject = function ($applicant) {
        //     $obj  = (object) ['name' => $applicant];
        //      return $obj;
        // };

        // $applicant = array_map($applicantObject, $uniqueApplicants);
        // echo $applicant;
        // DB::table('applicants')->insertOrIgnore([
        //     $applicant
        // ]);


        // $applicantList = implode(" ",  $uniqueApplicants);
        // $sql = "insert into applicants (name) values (?) WHERE name NOT IN ( '" . implode( "', '" , $uniqueApplicants ) . "' )";
        // $sql = 'insert into applicants (name) values (?)';

        // DB::insert($sql, [$uniqueApplicants]);
        // DB::table('applicants')->insertOrIgnore([
        //     [ 'name' => 'Felipe'],
        //     [ 'name' => 'Costa'],
        // ]);


        // foreach ($uniqueApplicants as $key => $applicant) {
        //     $select = DB::select('select * from jobs where title = ?;', ['Superstar Barhand Staff']);

        //      echo implode(", ",$select);
        // }

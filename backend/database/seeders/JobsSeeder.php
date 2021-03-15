<?php
// RUN artisan db:seed

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobsSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */

  public function run()
  {
    $row = 1;
    $data = array();
    $jobs_applicants = array();
    $file = fopen(storage_path('app/jobs.csv'), "r");

    /**
     * read for all jobs in the CSV and insert into jobs_table and get the specific id.
     * 
     * I thought about using a stored procedure to loop into jobs_table but the application doesn't 
     * have a lot of registers.
     */

    while (($data = fgetcsv($file)) !== FALSE) {
      if ($row > 1) {
        $applicants_list = explode(',', $data[4],);

        $id_job = DB::table('jobs')->insertGetId(
          [
            'title' => $data[0],
            'description' => $data[1],
            'date' => $data[2],
            'location' => $data[3]
          ]
        );

        // Insert into jobs_applicants array the relation of a job and all applicants.  
        foreach ($applicants_list as $name) {
          array_push(
            $jobs_applicants,
            ['id_job' => $id_job, 'id_applicant' =>  trim($name)]
          );
        }
      }
      $row++;
    }
    fclose($file);
    // insert all registers once into the tables  jobs_applicants
    DB::table('jobs_applicants')->insert($jobs_applicants);
  }
}

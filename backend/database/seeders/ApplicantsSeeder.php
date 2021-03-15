<?php
// RUN artisan db:seed

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ApplicantsSeeder extends Seeder
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
    $applicants = array();
    $applicants_array = array();

    $file = fopen(storage_path('app/jobs.csv'), "r");

    // read for all applicants in the CSV and push into array.
    while (($data = fgetcsv($file)) !== FALSE) {
      if ($row > 1) {
        $applicant_list = $data[4];
        foreach (explode(',', $applicant_list) as $name) {
          array_push($applicants_array, trim($name));
        }
      }
      $row++;
    }
    $unique_applicants = array_unique($applicants_array);

    // Insert into applicants array the unique names. 
    foreach ($unique_applicants as $name) {
      array_push($applicants, ['name' => $name]);
    }

    fclose($file);
    // insert all registers once into the table applicants
    DB::table('applicants')->insert($applicants);
  }
}

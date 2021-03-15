<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Database\Seeders\ApplicantsSeeder;
use Database\Seeders\JobsSeeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call([
             ApplicantsSeeder::class,
             JobsSeeder::class
         ]);

    }
}
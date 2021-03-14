<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsApplicants extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs_applicants', function (Blueprint $table) {
            $table->unsignedInteger('id_job');
            $table->char('id_applicant');
            $table->foreign('id_job')->references('id')->on('jobs');
            $table->foreign('id_applicant')->references('name')->on('applicants');
            // $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs_applicants');
    }
}

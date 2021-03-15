<?php

class RoutesTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGetJobs()
    {
        $this->json('GET', '/jobs')
            ->seeJson(['id' => 1], [
                '' => 1,
                'title' => '',
                'description' => '',
                "date" => "10/08/2019",
                "location" => ""
            ]);
    }
    public function testGetJobDetails()
    {
        $this->json('GET', '/jobs/1')
            ->seeJson(['id' => 1], [
                'title' => '',
                'description' => '',
                "date" => "10/08/2019",
                "location" => "",
                "applicants" => ['name' => '']
            ]);
    }
}

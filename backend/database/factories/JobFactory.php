<?php

namespace Database\Factories;

use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class JobFactory extends Factory 
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \App\Models\Job::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->title,
            'description' => $this->faker->text(),
            'date' => $this->faker->now(),
            'location' => $this->fake->text(),
            'applicants' => $this->fake->text(),
            'created_at' => now(),
        ];
    }
}

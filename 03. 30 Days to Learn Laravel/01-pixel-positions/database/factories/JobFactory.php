<?php

namespace Database\Factories;

use App\Models\Employer;
use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Job>
 */
class JobFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array {
        return [
            'employer_id' => Employer::factory(),
            'title' => fake()->jobTitle(),
            'salary' => 'USD ' . fake()->numberBetween(20, 120) * 1_000,
            'location' => fake()->boolean(20) ? 'Remote' : fake()->city(),
            'employment_type' => fake()->randomElement(['Full Time', 'Part Time', 'Contract', 'Internship', 'Temporary']),
            'url' => fake()->url(),
            'featured' => fake()->boolean(20),
        ];
    }
}

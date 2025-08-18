<?php

namespace Database\Factories;

use App\Models\Employer;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Employer>
 */
class EmployerFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array {
        $name = fake()->company();
        $textLogo = preg_replace('/[^A-Z]/', '', $name);
        return [
            'name' => $name,
            'logo' => "https://placehold.co/100/2a2a2a/ffffff?text=$textLogo",
            'user_id' => User::factory(),
        ];
    }
}

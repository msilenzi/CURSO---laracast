<?php

namespace Database\Seeders;

use App\Models\Employer;
use App\Models\Job;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     */
    public function run(): void {
        $user = User::factory()->create([
            'first_name' => 'John',
            'last_name'  => 'Doe',
            'email'      => 'jdoe@example.com',
            'password'   => 'jdoe1234'
        ]);

        $employer = Employer::factory()->create([
            'name'    => 'Kelsier Ventures',
            'user_id' => $user->id
        ]);

        Job::factory()->create([
            'title'       => 'Coinshot Brand Specialist',
            'salary'      => 'USD 30,000',
            'employer_id' => $employer->id
        ]);

        Job::factory()->create([
            'title'       => 'Hemalurgic Systems Engineer',
            'salary'      => 'USD 40,000',
            'employer_id' => $employer->id
        ]);

        Job::factory()->create([
            'title'       => 'Skaa Outreach Coordinator',
            'salary'      => 'USD 50,000',
            'employer_id' => $employer->id
        ]);

        $this->call([
            JobSeeder::class,
            TagSeeder::class,
        ]);
    }
}

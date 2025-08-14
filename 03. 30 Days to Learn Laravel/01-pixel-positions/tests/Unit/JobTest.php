<?php

namespace Tests\Unit;

use App\Models\Employer;
use App\Models\Job;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class JobTest extends TestCase {
    use RefreshDatabase;

    public function test_ItShouldBelongToAnEmployer(): void {
        $employer = Employer::factory()->create();
        $job = Job::factory()->create([
            'employer_id' => $employer->id,
        ]);

        $this->assertTrue($job->employer->is($employer));
    }

    public function test_ItShouldHaveTags(): void {
        $job = Job::factory()->create();
        $job->tag('new tag');

        $this->assertCount(1, $job->tags);
    }
}

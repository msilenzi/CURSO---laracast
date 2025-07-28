<?php

namespace App\Models;

use Illuminate\Support\Arr;

class Jobs {
    /** @var Jobs[] */
    private static array $jobs;

    private function __construct() {}

    public static function findAll() {
        self::init();
        return self::$jobs;
    }

    public static function findOneById($id): ?Job {
        self::init();
        $job = Arr::first(self::$jobs, fn($job) => $job->getId() == $id);
        // if (!$job) abort(404);
        return $job;
    }

    private static function init(): void {
        if (!isset(self::$jobs)) {
            self::$jobs = [
                new Job(1, 'Director', '$50,000'),
                new Job(2, 'Programmer', '$40,000'),
                new Job(3, 'Teacher', '$30,000')
            ];
        }
    }
}

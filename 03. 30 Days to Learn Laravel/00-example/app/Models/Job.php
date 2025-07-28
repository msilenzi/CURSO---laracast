<?php

namespace App\Models;

class Job {

    public function __construct(
        private int $id,
        private string $title,
        private string $salary
    ) {}

    public function getId(): int {
        return $this->id;
    }

    public function getTitle(): string {
        return $this->title;
    }

    public function getSalary(): string {
        return $this->salary;
    }


}

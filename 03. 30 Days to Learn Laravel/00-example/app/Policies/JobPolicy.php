<?php

namespace App\Policies;

use App\Models\Job;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class JobPolicy {
    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Job $job): bool  {
        // $model->is(): determine if two models have the same ID and belong to the same table.
        return $job->employer->user->is($user);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Job $job): bool  {
        return $job->employer->user->is($user);
    }
}

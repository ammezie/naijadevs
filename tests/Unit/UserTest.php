<?php

namespace Tests\Unit;

use App\Models\Job;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UserTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function fetch_jobs_created_by_user()
    {
        $jobs = factory(Job::class, 3)->create();

        $user = factory(User::class)->create();

        $anotherJob = factory(Job::class)->create([
            'user_id' => $user->id,
        ]);

        $userJobs = Job::userJobs($user->id);

        $this->assertCount(1, $userJobs);
    }
}

<?php

namespace Tests\Feature;

use App\Models\Job;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UserTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function an_authenticated_user_can_view_a_list_of_own_jobs()
    {
        $jobs = factory(Job::class, 3)->create();

        $this->actingAs(factory(User::class)->create());

        $userJob = factory(Job::class)->create([
            'user_id' => auth()->id(),
            'title' => 'Sample Title',
        ]);

        $response = $this->get('/my-jobs');

        $response->assertSee($userJob->title);
    }
}

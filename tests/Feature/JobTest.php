<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class JobTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function an_authenticated_user_can_create_a_job_post()
    {
        $this->actingAs($user = factory('App\Models\User')->create());

        $job = factory('App\Models\Job')->make([
            'user_id' => $user->id,
        ]);

        $this->post('/jobs', $job->toArray());

        $this->get('/jobs')
            ->assertSee($job->title)
            ->assertSee($job->description);
    }

    /** @test */
    public function guests_can_not_create_job_post()
    {
        $this->expectException('Illuminate\Auth\AuthenticationException');

        $job = factory('App\Models\Job')->make();

        $this->post('/jobs', $job->toArray());
    }
}

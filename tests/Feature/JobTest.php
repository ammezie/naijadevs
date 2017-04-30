<?php

namespace Tests\Feature;

use App\Models\Job;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class JobTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function an_authenticated_user_can_create_a_job()
    {
        $this->actingAs(factory(User::class)->create());

        $job = factory(Job::class)->make();

        $this->post('/jobs', $job->toArray());

        $this->assertDatabaseHas('jobs', [
            'title' => $job->title,
            'description' => $job->description,
        ]);
    }

    /** @test */
    public function guests_can_not_create_job()
    {
        $this->expectException('Illuminate\Auth\AuthenticationException');

        $job = factory(Job::class)->make();

        $this->post('/jobs', $job->toArray());
    }

    /** @test */
    // public function an_authenticated_user_can_edit_an_already_created_job()
    // {
    //     // Given
    //     $this->actingAs($user = factory(User::class)->create());
    //     $job = factory(Job::class)->create([
    //         'user_id' => $user->id
    //     ]);
    //     $UserJob = $user->jobs;

    //     // When
    //     $this->put('/jobs/' . $job->id . '/edit', [
    //         'title' => 'New Title',
    //         'description' => 'New job description'
    //     ]);

    //     // Then
    //     $this->get($job->path())
    //         ->assertSee($job->title)
    //         ->assertSee($job->description);
    // }

    /** @test */
    public function users_can_view_a_job()
    {
        // Given
        $job = factory(Job::class)->create();

        // When
        $response = $this->get($job->path());

        // Then
        $response->assertSee($job->title)
            ->assertSee($job->description);
    }
}

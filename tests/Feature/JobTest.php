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
    public function an_authenticated_user_can_edit_job()
    {
        $this->actingAs(factory(User::class)->create());

        $job = factory(Job::class)->create([
            'user_id' => auth()->id()
        ]);

        $this->patch($job->path(), [
            'title' => 'New Title',
            'description' => 'New job description',
            'user_id' => auth()->id(),
            'apply' => $job->apply,
            'type_id' => $job->type_id,
            'location_id' => $job->location_id,
            'category_id' => $job->category_id,
            'salary' => 120000,
        ]);

        $this->assertDatabaseHas('jobs', [
            'title' => 'New Title',
            'description' => 'New job description',
        ]);
    }

    /** @test */
    public function an_authenticated_user_can_edit_only_own_job()
    {
        $this->expectException('Illuminate\Auth\Access\AuthorizationException');

        $this->actingAs(factory(User::class)->create());
        
        $job = factory(Job::class)->create();

        $this->patch($job->path(), [
            'title' => 'New Title',
            'description' => 'New job description',
            'user_id' => auth()->id(),
            'apply' => $job->apply,
            'type_id' => $job->type_id,
            'location_id' => $job->location_id,
            'category_id' => $job->category_id,
            'salary' => 120000,
        ]);
    }

    /** @test */
    public function users_can_view_a_job()
    {
        $job = factory(Job::class)->create();

        $response = $this->get($job->path());

        $response->assertSee($job->title)
            ->assertSee($job->description);
    }
}

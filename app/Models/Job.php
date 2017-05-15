<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * Get the URI of a job
     *
     * @return string
     */
    public function path()
    {
        return "/jobs/$this->id/" . str_slug($this->title);
    }

    /**
     * Get the user that created the job
     *
     * @return \Illuminate\Database\Eloquent\Relations\Relation
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the type of the job
     *
     * @return \Illuminate\Database\Eloquent\Relations\Relation
     */
    public function type()
    {
        return $this->belongsTo(JobType::class);
    }

    /**
     * Get the category of the job
     *
     * @return \Illuminate\Database\Eloquent\Relations\Relation
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the location of the job
     *
     * @return \Illuminate\Database\Eloquent\Relations\Relation
     */
    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    /**
     * Persist job to database
     *
     * @param array $attributes
     * @return Job
     */
    public static function createJob($attributes)
    {
        return static::create($attributes);
    }

    /**
     * Persist job to database
     *
     * @param array $attributes
     * @return Job
     */
    public function updateJob($attributes)
    {
        return $this->update($attributes);
    }

    public static function userJobs($user)
    {
        return static::where('user_id', $user)->get();
    }
}

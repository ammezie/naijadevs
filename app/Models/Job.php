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
        return '/jobs/' . $this->id;
    }

    /**
     * Get the user that created the job
     *
     * @return Illuminate\Database\Eloquent\Relations\Relation
     */
    public function creator()
    {
        return $this->belongsTo(User::class);
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
}

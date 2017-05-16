<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobType extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * Get the jobs for the job type
     *
     * @return \Illuminate\Database\Eloquent\Relations\Relation
     */
    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    /**
     * Get all job types
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getAll()
    {
        return static::all();
    }
}

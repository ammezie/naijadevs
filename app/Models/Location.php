<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * Get the jobs for the job location
     *
     * @return \Illuminate\Database\Eloquent\Relations\Relation
     */
    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    /**
     * A location can have many users
     *
     * @return Illuminate\Database\Eloquent\Relations\Relation
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }

    /**
     * Get all locations
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getAll()
    {
        return static::all();
    }
}

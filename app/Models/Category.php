<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * Get the jobs for the job category
     *
     * @return \Illuminate\Database\Eloquent\Relations\Relation
     */
    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    /**
     * Get all categories
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getAll()
    {
        return static::all();
    }
}

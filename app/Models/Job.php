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
}

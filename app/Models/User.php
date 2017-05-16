<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'company_name',
        'company_website',
        'company_location',
        'company_about',
        'company_logo',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get the jobs that have been created by the user
     *
     * @return Illuminate\Database\Eloquent\Relations\Relation
     */
    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    /**
     * A user belongs to a location
     *
     * @return Illuminate\Database\Eloquent\Relations\Relation
     */
    public function location()
    {
        return $this->belongsTo(Location::class, 'company_location');
    }

    public static function getUserByID($userID)
    {
        return static::findOrFail($userID);
    }
}

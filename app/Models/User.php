<?php

namespace App\Models;

use App\Models\Activity;
use App\Traits\Slugable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Malhal\Geographical\Geographical;

class User extends Authenticatable
{
    use Notifiable, Geographical, Slugable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'slug',
        'latitude',
        'longitude',
        'api_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function activities()
    {
        return $this->belongsToMany(Activity::class, 'activity_members');
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = $this->slug($value);
    }
}

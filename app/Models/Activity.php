<?php

namespace App\Models;

use App\Models\User;
use App\Traits\Slugable;
use Illuminate\Database\Eloquent\Model;
use Malhal\Geographical\Geographical;

class Activity extends Model
{
    use Geographical, Slugable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'slug',
        'latitude',
        'longitude',
    ];

    public function members()
    {
        return $this->belongsToMany(User::class, 'activity_members');
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = $this->slug($value);
    }
}

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
        'start_at',
        'end_at',
    ];

    public function members()
    {
        return $this->belongsToMany(User::class, 'activity_members');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'activity_tags');
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = $this->slug($value);
    }
}

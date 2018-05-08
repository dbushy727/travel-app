<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;

trait Slugable
{
    public function slug($name)
    {
        if (!$this instanceof Model) {
            throw new \Exception('Must be called on a model');
        }

        $slug = str_slug(str_limit($name, 20));

        $count = $this::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();

        return $count ? "{$slug}-{$count}" : $slug;
    }
}
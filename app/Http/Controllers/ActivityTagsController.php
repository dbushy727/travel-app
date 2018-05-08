<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Tag;
use Illuminate\Http\Request;

class ActivityTagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Tag $tag)
    {
        return $tag->activities;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Tag $tag, Activity $activity)
    {
        $tag->activities()->withTimestamps()->save($activity);

        return $tag->activities;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag, Activity $activity)
    {
        $tag->activities()->detach($activity);

        return $tag->activities;
    }
}

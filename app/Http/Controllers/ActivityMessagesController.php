<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class ActivityMessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Activity $activity)
    {
        return $activity->messages;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Activity $activity, Request $request)
    {
        $message = Message::create([
            'body'    => $request->get('message'),
            'user_id' => $this->authenticated_user->id,
        ]);

        $activity->messages()->withTimestamps()->save($message);

        return $activity->messages;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activity $activity, Message $message)
    {
        $activity->messages()->detach($message);

        return $activity->messages;
    }
}

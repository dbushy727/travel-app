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
        Message::create([
            'body'    => $request->get('message'),
            'user_id' => $this->authenticated_user->id,
            'chatroom_id' => $activity->chatroom->id,
        ]);

        return $activity->messages;
    }
}

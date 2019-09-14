<?php

namespace App\Observers;

use App\Models\Activity;
use App\Models\Chatroom;

class ActivityObserver
{
    public function creating(Activity $activity)
    {
        if ($activity->chatroom_id) {
            return true;
        }

        $chatroom = Chatroom::create(['type' => 'activity']);

        $activity->chatroom_id = $chatroom->id;
        return $activity->save();
    }
}

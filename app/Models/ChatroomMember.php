<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatroomMember extends Model
{
    public function chatroom()
    {
        return $this->belongsTo(Chatroom::class);
    }
}

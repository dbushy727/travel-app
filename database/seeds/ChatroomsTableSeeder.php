<?php

use App\Models\Activity;
use App\Models\Chatroom;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ChatroomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect()->times(10, function () {
            $type = rand(0,1) ? 'activity' : 'private';
            return Chatroom::create(['type' => $type]);
        });
    }
}

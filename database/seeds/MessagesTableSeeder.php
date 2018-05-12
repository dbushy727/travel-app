<?php

namespace Seed;

use App\Models\Activity;
use App\Models\Message;
use App\Models\User;
use Illuminate\Database\Seeder;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = app('Faker\Generator');

        User::inRandomOrder()->take(5)->get()->each(function ($user) use ($faker) {
            $activity = Activity::inRandomOrder()->first();

            $message = Message::create([
                'user_id' => $user->id,
                'body' => $faker->sentence,
            ]);

            $activity->messages()->withTimestamps()->attach($message);
        });
    }
}

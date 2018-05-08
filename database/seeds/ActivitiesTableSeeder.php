<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class ActivitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Activity::class, 10)->create()->each(function ($activity) {
            $users = User::inRandomOrder()->take(rand(1, 3))->get();
            $activity->members()->withTimestamps()->saveMany($users);
        });

    }
}

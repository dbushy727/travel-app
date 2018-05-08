<?php

use App\Models\Activity;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = app('Faker\Generator');

        collect()->times(10, function () use ($faker) {
            return Tag::create([
                'name' => $faker->unique()->word,
                // 'created_at' => Carbon::now(),
                // 'updated_at' => Carbon::now(),
            ]);
        })->each(function ($tag) {
            $activities = Activity::inRandomOrder()->take(rand(1, 4))->get();
            $tag->activities()->withTimestamps()->saveMany($activities);
        });
    }
}

<?php

use Carbon\Carbon;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Models\Activity::class, function (Faker $faker) {
    $start_at = $faker->dateTimeThisMonth->format('Y-m-d h:i:s');
    $end_at   = Carbon::parse($start_at)->addHours(rand(3,10));
    return [
        'name'        => $faker->sentence,
        'description' => $faker->paragraph,
        'latitude'    => $faker->latitude,
        'longitude'   => $faker->longitude,
        'start_at'    => $start_at,
        'end_at'      => $end_at,
    ];
});

<?php

use Illuminate\Database\Seeder;
use Seed\MessagesTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(ChatroomsTableSeeder::class);
        $this->call(ActivitiesTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(MessagesTableSeeder::class);
    }
}

<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AgesTableSeeder::class);
        $this->call(LevelsTableSeeder::class);
        $this->call(SportsTableSeeder::class);
        $this->call(SexTableSeeder::class);
        $this->call(WeekdaysTableSeeder::class);
        $this->call(FrequenciesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(TeamsTableSeeder::class);
        $this->call(PostsTableSeeder::class);
        $this->call(LikesTableSeeder::class);
        $this->call(FollowsTableSeeder::class);
//        $this->call(MessagesTableSeeder::class);
        $this->call(BoardsTableSeeder::class);
    }
}

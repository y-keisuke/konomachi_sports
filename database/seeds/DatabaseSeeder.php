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
        $this->call(UsersTableSeeder::class);
        $this->call(TeamsTableSeeder::class);
        $this->call(PostsTableSeeder::class);
        $this->call(TeamUserTableSeeder::class);
        $this->call(SexTableSeeder::class);
        $this->call(UserLevelTableSeeder::class);
        $this->call(LikesTableSeeder::class);
        $this->call(FollowsTableSeeder::class);
        $this->call(MessagesTableSeeder::class);
        $this->call(BoardsTableSeeder::class);
    }
}

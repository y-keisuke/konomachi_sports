<?php

use Faker\Factory;
use Illuminate\Database\Seeder;

class LikesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('ja_JP');

        for ($i = 0; $i < 20; $i++) {
            DB::table('likes')->insert([
                'like_user_id' => $faker->numberBetween(1, 20),
                'liked_team_id' => $faker->numberBetween(1, 10),
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
            ]);
        }
    }
}

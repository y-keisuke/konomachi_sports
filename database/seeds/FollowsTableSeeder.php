<?php

use Faker\Factory;
use Illuminate\Database\Seeder;

class FollowsTableSeeder extends Seeder
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
            DB::table('follows')->insert([
                'follow_user_id' => $faker->numberBetween(1, 20),
                'followed_user_id' => $faker->numberBetween(1, 20),
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
            ]);
        }
    }
}

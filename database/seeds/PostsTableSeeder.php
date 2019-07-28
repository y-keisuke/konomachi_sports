<?php

use Faker\Factory;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('ja_JP');

        for ($i = 0; $i < 40; $i++)
        {
            DB::table('posts')->insert([
                'user_id' =>$faker->numberBetween(1, 30),
                'team_id' =>$faker->numberBetween(1, 30),
                'title' => $faker->sentence(2),
                'body' => $faker->paragraph(),
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
            ]);
        }
    }
}

<?php

use Faker\Factory;
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
        $faker = Factory::create('ja_JP');

        for ($i = 0; $i < 20; $i++)
        {
            DB::table('messages')->insert([
                'board_id' => $faker->numberBetween(1, 10),
                'user_id' =>$faker->numberBetween(1, 20),
                'message' =>$faker->sentence(),
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
            ]);
        }
    }
}

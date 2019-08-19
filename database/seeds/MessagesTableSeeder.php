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

        for ($i = 0; $i < 5; $i++)
        {
            DB::table('messages')->insert([
                'board_id' => $i,
                'user_id' => 1,
                'message' =>$faker->sentence(),
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
            ]);
        }
    }
}

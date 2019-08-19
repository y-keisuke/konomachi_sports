<?php

use Faker\Factory;
use Illuminate\Database\Seeder;

class BoardsTableSeeder extends Seeder
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
            DB::table('boards')->insert([
                'from_user_id' =>$faker->numberBetween(1, 20),
                'to_user_id' =>$faker->numberBetween(1, 20),
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
            ]);
        }
    }
}

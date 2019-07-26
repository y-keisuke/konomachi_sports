<?php

use Faker\Factory;
use Illuminate\Database\Seeder;

class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('ja_JP');

        for ($i = 0; $i < 10; $i++)
        {
            DB::table('teams')->insert([
                'user_id' => $faker->numberBetween(1,10),
                'sports' => $faker->numberBetween(1,6),
                'age' => $faker->numberBetween(1,12),
                'level' => $faker->numberBetween(1,3),
                'area' => $faker->city,
                'frequency' => $faker->numberBetween(1,4),
                'weekday' => $faker->numberBetween(1,8),
                'hp' => $faker->url,
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
            ]);
        }
    }
}

<?php

use Faker\Factory;
use Illuminate\Database\Seeder;

class TeamMembersTableSeeder extends Seeder
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
            DB::table('team_members')->insert([
                'user_id' =>$faker->numberBetween(1, 20),
                'team_id' =>$faker->numberBetween(1, 10),
                'admin' =>$faker->boolean(),
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
            ]);
        }
    }
}

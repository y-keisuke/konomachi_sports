<?php

use Faker\Factory;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => '管理者',
            'email' => 'keisuke.test.yamauchi@gmail.com',
            'password' => bcrypt('12341234'),
        ]);
        User::create([
            'name' => 'テストユーザー',
            'email' => 'test@example.com',
            'password' => bcrypt('12345678'),
        ]);

        $faker = Factory::create('ja_JP');

        for ($i = 0; $i < 20; $i++)
        {
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->email,
                'sports1' => $faker->numberBetween(1,6),
                'sports_years1' => $faker->numberBetween(1, 10),
                'sports2' => $faker->numberBetween(1,6),
                'sports_years2' => $faker->numberBetween(1, 10),
                'sports3' => $faker->numberBetween(1,6),
                'sports_years3' => $faker->numberBetween(1, 10),
                'age' => $faker->numberBetween(20,50),
                'sex' => $faker->numberBetween(1,2),
                'password' => $faker->password,
                'area' => $faker->city,
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
            ]);
        }
    }
}

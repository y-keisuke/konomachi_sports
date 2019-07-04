<?php

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
        \App\Models\User::create([
            'name' => '管理者',
            'email' => 'keisuke.test.yamauchi@gmail.com',
            'password' => bcrypt('12341234'),
        ]);

        $faker = Faker\Factory::create('ja_JP');

        for ($i = 0; $i < 20; $i++)
        {
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->email,
                'sports1' => $faker->randomElement(array ('バレーボール', '野球', 'サッカー', 'バドミントン', 'テニス', 'フットサル', 'ランニング')),
                'sports_years1' => $faker->numberBetween(1, 10),
                'sports2' => $faker->randomElement(array ('バレーボール', '野球', 'サッカー', 'バドミントン', 'テニス', 'フットサル', 'ランニング')),
                'sports_years2' => $faker->numberBetween(1, 10),
                'sports3' => $faker->randomElement(array ('バレーボール', '野球', 'サッカー', 'バドミントン', 'テニス', 'フットサル', 'ランニング')),
                'sports_years3' => $faker->numberBetween(1, 10),
                'age' => $faker->numberBetween(20,50),
                'sex' => $faker->randomElement(array ('男性', '女性')),
                'password' => $faker->password,
                'area' => $faker->city,
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
            ]);
        }
    }
}

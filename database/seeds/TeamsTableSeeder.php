<?php

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
        $faker = Faker\Factory::create('ja_JP');

        for ($i = 0; $i < 10; $i++)
        {
            DB::table('teams')->insert([
                'sports' => $faker->randomElement(array ('バレーボール', '野球', 'サッカー', 'バドミントン', 'テニス', 'フットサル', 'ランニング')),
                'age' => $faker->numberBetween(20,50),
                'level' => $faker->randomElement(array ('初心者歓迎', '経験者求む')),
                'area' => $faker->city,
                'frequency' => $faker->randomElement(array ('毎週木金', '毎週土曜', '毎週日曜', '第一三土曜', '第一金曜')),
                'hp' => $faker->url,
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
            ]);
        }
    }
}

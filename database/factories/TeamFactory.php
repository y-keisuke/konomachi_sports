<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\Team;
use Faker\Generator as Faker;

$factory->define(Team::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween(1, 30),
        'sports' => $faker->randomElement(['バレーボール', 'サッカー', 'ラグビー', '野球', 'バスケットボール', 'テニス']),
        'age' => $faker->randomElement(['10代～20代', '20代～30代', '30代～40代', '40代～50代', '50代～60代', '20代～40代', '30代～50代', '40代～60代', '50代～70代']),
        'level' => $faker->randomElement(['初心者歓迎', '経験者募集', '経験問いません', 'ガチ勢募集']),
        'area' => $faker->city,
        'frequency' => $faker->randomElement(['毎週', '2週間に1回', '3週間に1回', '1ヶ月に1回']),
        'weekday' => $faker->randomElement(['月曜日', '火曜日', '水曜日', '木曜日', '金曜日', '土曜日', '日曜日', '不定']),
        'hp' => $faker->url,
        'created_at' => $faker->dateTime(),
        'updated_at' => $faker->dateTime(),
    ];
});

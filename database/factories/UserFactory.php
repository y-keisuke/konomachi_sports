<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'sports1' => $faker->randomElement(['バレーボール', 'サッカー', 'ラグビー', '野球', 'バスケットボール', 'テニス']),
        'sports_years1' => $faker->numberBetween(1, 10),
        'sports2' => $faker->randomElement(['バレーボール', 'サッカー', 'ラグビー', '野球', 'バスケットボール', 'テニス']),
        'sports_years2' => $faker->numberBetween(1, 10),
        'sports3' => $faker->randomElement(['バレーボール', 'サッカー', 'ラグビー', '野球', 'バスケットボール', 'テニス']),
        'sports_years3' => $faker->numberBetween(1, 10),
        'age' => $faker->numberBetween(20, 50),
        'sex' => $faker->randomElement(['男性', '女性']),
        'area' => $faker->city,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

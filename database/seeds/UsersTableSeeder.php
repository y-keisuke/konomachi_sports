<?php

use App\Models\User;
use Faker\Factory;
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
            'email' => 'info@konomachi-sports.com',
            'password' => bcrypt('12341234'),
            'admin' => 1,
        ]);
        User::create([
            'name' => 'テストユーザー',
            'email' => 'test@example.com',
            'password' => bcrypt('12345678'),
        ]);

        factory(App\Models\User::class, 50)->create();
    }
}

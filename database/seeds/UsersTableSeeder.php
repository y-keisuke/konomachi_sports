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
    }
}

<?php

use Illuminate\Database\Seeder;

class UserLevelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'level' => '初心者歓迎'
        ];
        DB::table('user_level')->insert($param);

        $param = [
            'level' => '経験者募集'
        ];
        DB::table('user_level')->insert($param);

        $param = [
            'level' => '経験は問いません'
        ];
        DB::table('user_level')->insert($param);
    }
}

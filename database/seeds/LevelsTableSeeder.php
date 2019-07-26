<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            ['level' => '初心者歓迎'],
            ['level' => '経験者募集'],
            ['level' => '経験問いません'],
            ['level' => 'ガチ勢募集'],
        ];
        DB::table('levels')->insert($param);
    }
}

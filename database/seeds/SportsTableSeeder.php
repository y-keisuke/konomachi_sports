<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            ['sport' => 'バレーボール'],
            ['sport' => 'サッカー'],
            ['sport' => '野球'],
            ['sport' => 'テニス'],
            ['sport' => 'バスケットボール'],
            ['sport' => 'ラグビー'],
        ];
        DB::table('sports')->insert($param);
    }
}

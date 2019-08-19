<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WeekdaysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            ['weekday' => '月曜日'],
            ['weekday' => '火曜日'],
            ['weekday' => '水曜日'],
            ['weekday' => '木曜日'],
            ['weekday' => '金曜日'],
            ['weekday' => '土曜日'],
            ['weekday' => '日曜日'],
            ['weekday' => '不定'],
        ];
        DB::table('weekdays')->insert($param);
    }
}

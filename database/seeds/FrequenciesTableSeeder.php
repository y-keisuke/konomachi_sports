<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FrequenciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            ['frequency' => '毎週'],
            ['frequency' => '2週間に1回'],
            ['frequency' => '3週間に1回'],
            ['frequency' => '1ヶ月に1回'],
        ];
        DB::table('frequencies')->insert($param);
    }
}

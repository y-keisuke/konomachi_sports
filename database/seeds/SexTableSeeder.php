<?php

use Illuminate\Database\Seeder;

class SexTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            ['sex' => '男性'],
            ['sex' => '女性'],
        ];
        DB::table('sex')->insert($param);
    }
}

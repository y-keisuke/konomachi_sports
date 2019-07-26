<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AgesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            ['age' => '10代～20代'],
            ['age' => '10代～30代'],
            ['age' => '20代～30代'],
            ['age' => '20代～40代'],
            ['age' => '30代～40代'],
            ['age' => '30代～50代'],
            ['age' => '40代～50代'],
            ['age' => '40代～60代'],
            ['age' => '50代～60代'],
            ['age' => '50代～70代'],
            ['age' => '60代～70代'],
            ['age' => '60代～80代'],
        ];
        DB::table('ages')->insert($param);
    }
}

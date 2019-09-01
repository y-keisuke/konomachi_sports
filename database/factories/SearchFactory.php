<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\Team;

$factory->define(Team::class, function () {
    return [[
        'sports' => 'バレーボール',
        'age' => '10代～20代',
        'level' => '初心者歓迎',
        'frequency' => '毎週',
        'weekday' => '月曜日',
    ],
    [
        'sports' => 'サッカー',
        'age' => '30代～40代',
        'level' => '初心者歓迎',
        'frequency' => '毎週',
        'weekday' => '金曜日',
    ],
    [
        'sports' => '野球',
        'age' => '50代～60代',
        'level' => '初心者歓迎',
        'frequency' => '2週間に1回',
        'weekday' => '月曜日',
    ],
    ];
}, 'test_search_data');

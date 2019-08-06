<?php

use App\Models\Age;
use App\Models\Frequency;
use App\Models\Level;
use App\Models\Sport;
use App\Models\Weekday;

//アクティブなURLを判定

function isActiveUrl($url, $string = 'active')
{
    return \Illuminate\Support\Facades\Request::is($url) ? $string : '';
}

/**
 * 空かどうか判断し、データがあれば$dataを、空であれば＄strを返す
 *
 * @param $data
 * @param string $string
 *
 * @return string
 */
function emptyJudge($data, $string = '')
{
    return $data ? $data : $string;
}

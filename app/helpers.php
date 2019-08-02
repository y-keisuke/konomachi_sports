<?php

use Illuminate\Support\Facades\DB;
use App\Models\Sport;
use App\Models\Age;
use App\Models\Level;
use App\Models\Frequency;
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
 * @return string
 */
function emptyJudge($data, $string = '')
{
    $result = $data ? $data : $string;
    return $result;
}

/**
 * SportDB情報取得
 * @param $id
 * @return
 */
function sportGet($id) {
    $data = Sport::find($id)->sport;
    return $data;
}



/**
 * AgeDB情報取得
 * @param $id
 * @return
 */
function ageGet($id) {
    $data = Age::find($id)->age;
    return $data;
}

/**
 * LevelDB情報取得
 * @param $id
 * @return
 */
function levelGet($id) {
    $data = Level::find($id)->level;
    return $data;
}

/**
 * FrequencyDB情報取得
 * @param $id
 * @return
 */
function frequencyGet($id) {
    $data = Frequency::find($id)->frequency;
    return $data;
}

/**
 * WeekdayDB情報取得
 * @param $id
 * @return
 */
function weekdayGet($id) {
    $data = Weekday::find($id)->weekday;
    return $data;
}
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

/**
 * SportDB情報取得
 *
 * @param $id
 *
 * @return
 */
function sportGet($id)
{
    return Sport::find($id)->sport;
}

/**
 * AgeDB情報取得
 *
 * @param $id
 *
 * @return
 */
function ageGet($id)
{
    return Age::find($id)->age;
}

/**
 * LevelDB情報取得
 *
 * @param $id
 *
 * @return
 */
function levelGet($id)
{
    return Level::find($id)->level;
}

/**
 * FrequencyDB情報取得
 *
 * @param $id
 *
 * @return
 */
function frequencyGet($id)
{
    return Frequency::find($id)->frequency;
}

/**
 * WeekdayDB情報取得
 *
 * @param $id
 *
 * @return
 */
function weekdayGet($id)
{
    return Weekday::find($id)->weekday;
}

<?php

use Illuminate\Support\Facades\DB;

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
 * sexテーブルデータを取得
 *
 */
function sex()
{
    $sex = DB::table('sex')->select('id', 'sex')->get();
    return $sex;
}
<?php

//アクティブなURLを判定
function isActiveUrl($url, $string = 'active')
{
    return \Illuminate\Support\Facades\Request::is($url) ? $string : '';
}
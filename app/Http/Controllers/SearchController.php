<?php

namespace App\Http\Controllers;

use App\Models\Age;
use App\Models\Frequency;
use App\Models\Level;
use App\Models\Sport;
use App\Models\Weekday;
use Illuminate\Http\Request;
use App\Models\Team;

class SearchController extends Controller
{
    public function search(Request $request, Team $team)
    {
        //プルダウン用リスト
        $sports_list = Sport::orderBy('sport', 'asc')->get();
        $ages_list = Age::orderBy('age', 'asc')->get();
        $levels_list = Level::orderBy('level', 'asc')->get();
        $frequencies_list = Frequency::orderBy('frequency', 'asc')->get();
        $weekdays_list = Weekday::orderBy('weekday', 'asc')->get();

        //チーム情報取得
        $teams = Team::all();
        //チーム情報の検索にかけるカラムを配列に格納
        $sports = '';
        $age = '';
        $level = '';
        $area = '';
        $frequency = '';
        $weekday = '';
        $data = array ('sports' => $sports, 'age' => $age, 'level' => $level, 'area' => $area, 'frequency' => $frequency, 'weekday' => $weekday);

        //formからそれぞれの情報を取得（各変数にそれぞれのidを代入）
        foreach ($data as $key => &$value) {
            if ($request->has($key)) {
                $value = $request->$key;
            }
        }
        unset($value);

        //formから取得した情報をもとにDBからデータ取得
        foreach ($data as $key => $value) {
            if (!empty($value)) {
                $teams = $teams->where($key, $value);
            }
        }
        //検索結果用
//        $s_sport = Sport::find($team->sports)->sport;
//        $s_age = Age::find($team->age)->age;
//        $s_level = Level::find($team->level)->level;
//        $s_frequency = Frequency::find($team->frequency)->frequency;
//        $s_weekday = Weekday::find($team->weekday)->weekday;

        $s_sport = Sport::all();
        $s_age = Age::all();
        $s_level = Level::all();
        $s_frequency = Frequency::all();
        $s_weekday = Weekday::all();

        return view('search.search', ['teams' => $teams, 'sports_list' => $sports_list,'ages_list' => $ages_list, 'levels_list' => $levels_list, 'frequencies_list' => $frequencies_list, 'weekdays_list' => $weekdays_list, 'sports' => $data['sports'], 'age' => $data['age'], 'level' => $data['level'], 'area' => $data['area'], 'frequency' => $data['frequency'], 'weekday' => $data['weekday'],'s_sport' => $s_sport, 's_age' => $s_age, 's_level' => $s_level, 's_frequency' => $s_frequency, 's_weekday' => $s_weekday]);
    }

    public function reset()
    {
        //プルダウン用リスト
        $sports_list = Sport::orderBy('sport', 'asc')->get();
        $ages_list = Age::orderBy('age', 'asc')->get();
        $levels_list = Level::orderBy('level', 'asc')->get();
        $frequencies_list = Frequency::orderBy('frequency', 'asc')->get();
        $weekdays_list = Weekday::orderBy('weekday', 'asc')->get();

        //チーム情報取得
        $teams = Team::all();

        return view('search.search', ['teams' => $teams, 'sports_list' => $sports_list,'ages_list' => $ages_list, 'levels_list' => $levels_list, 'frequencies_list' => $frequencies_list, 'weekdays_list' => $weekdays_list, 'sports' => '', 'age' => '', 'level' => '', 'area' => '', 'frequency' => '', 'weekday' => '']);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Age;
use App\Models\Frequency;
use App\Models\Level;
use App\Models\Sport;
use App\Models\Team;
use App\Models\Weekday;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        //プルダウン用リスト
        $sports_list = Sport::orderBy('sport', 'asc')->get();
        $ages_list = Age::orderBy('age', 'asc')->get();
        $levels_list = Level::all();
        $frequencies_list = Frequency::all();
        $weekdays_list = Weekday::all();

        //チーム情報取得、検索前に全データを表示
        $teams = Team::paginate(10);

        //リクエスト情報を各変数に代入
        $sports = $request->sports;
        $age = $request->age;
        $level = $request->level;
        $area = $request->area;
        $frequency = $request->frequency;
        $weekday = $request->weekday;

        //スコープを使ってチーム情報を検索
        if (!empty($sports) | !empty($age) | !empty($level) | !empty($area) | !empty($frequency) | !empty($weekday)) {
            $teams = Team::equalSports($sports)
                ->fuzzyAreas($area)
                ->equalAges($age)
                ->equalLevels($level)
                ->equalFrequencies($frequency)
                ->equalWeekdays($weekday)
                ->paginate(10);
        }

        return view('search.search', ['teams' => $teams, 'sports_list' => $sports_list, 'ages_list' => $ages_list, 'levels_list' => $levels_list, 'frequencies_list' => $frequencies_list, 'weekdays_list' => $weekdays_list, 'sports' => $sports, 'age' => $age, 'level' => $level, 'area' => $area, 'frequency' => $frequency, 'weekday' => $weekday]);
    }

    /**
     * 検索結果のリセット
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function reset()
    {
        //プルダウン用リスト
        $sports_list = Sport::orderBy('sport', 'asc')->get();
        $ages_list = Age::orderBy('age', 'asc')->get();
        $levels_list = Level::all();
        $frequencies_list = Frequency::all();
        $weekdays_list = Weekday::all();

        //チーム情報取得
        $teams = Team::paginate(10);

        return view('search.search', ['teams' => $teams, 'sports_list' => $sports_list, 'ages_list' => $ages_list, 'levels_list' => $levels_list, 'frequencies_list' => $frequencies_list, 'weekdays_list' => $weekdays_list, 'sports' => '', 'age' => '', 'level' => '', 'area' => '', 'frequency' => '', 'weekday' => '']);
    }
}

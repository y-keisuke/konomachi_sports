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
    public function search(Request $request)
    {
        $sports_list = Sport::orderBy('sport', 'asc')->get();
        $ages_list = Age::orderBy('age', 'asc')->get();
        $levels_list = Level::orderBy('level', 'asc')->get();
        $frequencies_list = Frequency::orderBy('frequency', 'asc')->get();
        $weekdays_list = Weekday::orderBy('weekday', 'asc')->get();
        $teams = Team::all();
        $sports = '';
        $age = '';
        $level = '';
        $area = '';
        $frequency = '';
        $data = array ('sports' => $sports, 'age' => $age, 'level' => $level, 'area' => $area, 'frequency' => $frequency);

        //formからそれぞれの情報を取得
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

        return view('search.search', ['teams' => $teams, 'sports_list' => $sports_list,'ages_list' => $ages_list, 'levels_list' => $levels_list, 'frequencies_list' => $frequencies_list, 'weekdays_list' => $weekdays_list, 'sports' => $data['sports'], 'age' => $data['age'], 'level' => $data['level'], 'area' => $data['area'], 'frequency' => $data['frequency']]);
    }

}

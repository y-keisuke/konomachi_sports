<?php

namespace App\Http\Controllers;

use App\Models\Sport;
use Illuminate\Http\Request;
use App\Models\Team;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $sports_list = Sport::orderBy('sport', 'asc')->get();
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

        return view('search.search', ['teams' => $teams, 'sports_list' => $sports_list, 'sports' => $data['sports'], 'age' => $data['age'], 'level' => $data['level'], 'area' => $data['area'], 'frequency' => $data['frequency']]);
    }

}

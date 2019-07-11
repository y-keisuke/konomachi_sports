<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        //formからそれぞれの情報を取得
        if ($request->has('sports')) {
            $sports = $request->sports;
        }
        if ($request->has('age')) {
            $age = $request->age;
        }
        if ($request->has('level')) {
            $level = $request->level;
        }
        if ($request->has('area')) {
            $area = $request->area;
        }
        if ($request->has('frequency')) {
            $frequency = $request->frequency;
        }
        //formから取得した情報をもとにDBからデータ取得
        $teams = Team::where('sports', $sports)
            ->orWhere('age', $age)
            ->orWhere('level', $level)
            ->orWhere('area', $area)
            ->orWhere('frequency', $frequency)
            ->get();

        return view('search.search', ['teams' => $teams, 'sports' => $sports, 'age' => $age, 'level' => $level, 'area' => $area, 'frequency' => $frequency]);
    }

}

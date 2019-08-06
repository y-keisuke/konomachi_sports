<?php

namespace App\Http\Controllers;

use App\Models\Age;
use App\Models\Frequency;
use App\Models\Level;
use App\Models\Sport;
use App\Models\Weekday;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'can:admin_only']);
    }

    public function index()
    {
        if (Auth::id() === 1) {
            $sports_list = Sport::orderBy('sport', 'asc')->get();
            $ages_list = Age::orderBy('age', 'asc')->get();
            $levels_list = Level::orderBy('level', 'asc')->get();
            $frequencies_list = Frequency::get();
            $weekdays_list = Weekday::get();
            return view('admin.index', ['sports_list' => $sports_list, 'ages_list' => $ages_list, 'levels_list' => $levels_list, 'frequencies_list' => $frequencies_list, 'weekdays_list' => $weekdays_list]);
        }

        return redirect('/')->with('alert_msg', '不正アクセスです');
    }
}

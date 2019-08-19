<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeamRequest;
use App\Models\Age;
use App\Models\Frequency;
use App\Models\Level;
use App\Models\Sport;
use App\Models\Team;
use App\Models\User;
use App\Models\Weekday;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::id() === 1) {
            $teams = Team::all();
            return view('teams.index', ['teams' => $teams]);
        }
        return redirect('/')->with('alert_msg', '不正アクセスです');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {
        if (Auth::check()) {
            $sports_list = Sport::orderBy('sport', 'asc')->get();
            $ages_list = Age::orderBy('age', 'asc')->get();
            $levels_list = Level::orderBy('level', 'asc')->get();
            $frequencies_list = Frequency::orderBy('frequency', 'asc')->get();
            $weekdays_list = Weekday::orderBy('weekday', 'asc')->get();
            return view('teams.create', ['user' => $user, 'sports_list' => $sports_list, 'ages_list' => $ages_list, 'levels_list' => $levels_list, 'frequencies_list' => $frequencies_list, 'weekdays_list' => $weekdays_list])->with('success_msg', SUCCESS_MSG04);
        }

        return redirect('users/create')->with('alert_msg', 'チーム登録は個人登録後に行えます');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(TeamRequest $request)
    {
        $form = $request->all();
        unset($form['_token']);
        $team = new Team();
        $team->fill($form)->save();
        return redirect('teams/' . $team->id)->with('success_msg', 'チームを作成しました');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        $user = User::find($team->user_id);
        $posts = $team->posts; //活動状況取得
        $likes = $team->likes; //いいねをしてるすべてのユーザー
        if (Auth::check()) {
            $like = $team->likes->where('id', Auth::user()->id)->first(); //現在のログインユーザーがいいねをしているかどうか
        } else {
            $like = '';
        }
        return view('teams.show', ['team' => $team, 'user' => $user, 'posts' => $posts, 'likes' => $likes, 'like' => $like]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        $sports_list = Sport::orderBy('sport', 'asc')->get();
        $ages_list = Age::orderBy('age', 'asc')->get();
        $levels_list = Level::orderBy('level', 'asc')->get();
        $frequencies_list = Frequency::orderBy('frequency', 'asc')->get();
        $weekdays_list = Weekday::orderBy('weekday', 'asc')->get();
        return view('teams.edit', ['team' => $team, 'sports_list' => $sports_list, 'ages_list' => $ages_list, 'levels_list' => $levels_list, 'frequencies_list' => $frequencies_list, 'weekdays_list' => $weekdays_list]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(TeamRequest $request, Team $team)
    {
        $form = $request->all();
        unset($form['_token']);
        $team->fill($form)->save();
        return redirect('teams/' . $team->id)->with('success_msg', 'チーム情報を更新しました');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        $team->delete();
        return redirect('teams')->with('success_msg', 'チームを削除しました');
    }
}

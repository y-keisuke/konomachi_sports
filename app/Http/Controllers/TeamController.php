<?php

namespace App\Http\Controllers;

use App\Models\Age;
use App\Models\Frequency;
use App\Models\Level;
use App\Models\Sport;
use App\Models\TeamUser;
use App\Models\Weekday;
use Illuminate\Http\Request;
use App\Http\Requests\TeamRequest;
use App\Models\Team;
use App\Models\User;
use App\Models\Post;
use Auth;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::all();
        return view('teams.index', ['teams' => $teams]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {
        $sports_list = Sport::orderBy('sport', 'asc')->get();
        $ages_list = Age::orderBy('age', 'asc')->get();
        $levels_list = Level::orderBy('level', 'asc')->get();
        $frequencies_list = Frequency::orderBy('frequency', 'asc')->get();
        $weekdays_list = Weekday::orderBy('weekday', 'asc')->get();
        return view('teams.create', ['user' => $user, 'sports_list' => $sports_list, 'ages_list' => $ages_list, 'levels_list' => $levels_list, 'frequencies_list' => $frequencies_list, 'weekdays_list' => $weekdays_list]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\TeamRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeamRequest $request)
    {
        $form = $request->all();
        unset($form['_token']);
        $team = new Team;
        $team->fill($form)->save();
        return redirect('teams/' . $team->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Team $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        $users = $team->users()->paginate(10);
        $posts = $team->posts;
        $likes = $team->likes; //いいねをしてるすべてのユーザー
        $like = $team->likes->where('id', Auth::user()->id)->first(); //現在のログインユーザーがいいねをしているかどうか
        return view('teams.show', ['team' => $team, 'users' => $users, 'posts' => $posts, 'likes' => $likes, 'like' => $like]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Team $team
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
     * @param  \App\Http\Requests\TeamRequest  $request
     * @param  \App\Models\Team $team
     * @return \Illuminate\Http\Response
     */
    public function update(TeamRequest $request, Team $team)
    {
        $form = $request->all();
        unset($form['_token']);
        $team->fill($form)->save();
        return redirect('teams/' . $team->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Team $team
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Team $team)
    {
        $team->delete();
        return redirect('teams');
    }
}

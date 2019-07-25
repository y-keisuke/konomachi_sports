<?php

namespace App\Http\Controllers;

use App\Models\Sex;
use App\Models\Sport;
use App\Models\Team;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * ユーザー一覧を表示
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sex_list = Sex::select('sex')->get();
        $sports_list = Sport::select('sport')->get();
        $ages_list = config('age');
        return view('users.create', ['sex_list' => $sex_list, 'sports_list' => $sports_list, 'ages_list' => $ages_list]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form = $request->all();
        unset($form['_token']);
        $user = new User;
        $user->fill($form)->save();
        return redirect('users/' . $user->id);
    }

    /**
     * ユーザーの詳細ページ
     *
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $u = User::find($user->id);
        $teams = $u->teams;
        $likes = $u->likes;
        $follow = $u->follow; //ユーザーがフォローしているユーザー
        $followed = $u->followed; //ユーザーがフォローされているユーザー
        $following = $followed->where('id', \Auth::user()->id)->first(); //ユーザーがログインユーザーをフォローしているかどうか
        $from_boards = $u->from_boards;
        $to_boards = $u->to_boards;
        return view('users.show', ['user' => $user, 'teams' => $teams, 'likes' => $likes, 'follow' => $follow, 'followed' => $followed, 'following' => $following, 'from_boards' => $from_boards, 'to_boards' => $to_boards]);
    }

    /**
     * ユーザー情報の編集画面
     *
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $sports_list = Sport::orderBy('sport', 'asc')->get();
        $sex = Sex::select('sex')->get();
        $sports = Sport::select('sport')->get();
        $age_list = config('age');
        return view('users.edit', ['user' => $user, 'sex' => $sex, 'sports' => $sports, 'age_list' => $age_list]);
    }

    /**
     * 編集内容にてDBデータベースを更新
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $form = $request->all();
        unset($form['_token']);
        $user->fill($form)->save();
        return redirect('users/' . $user->id);
    }

    /**
     * ユーザー情報を削除
     *
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect('users');
    }
}

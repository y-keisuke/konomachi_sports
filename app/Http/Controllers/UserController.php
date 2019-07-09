<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use App\Models\User;

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
        //registerにて実施
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //registerにて実施
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
        return view('users.edit', ['user' => $user]);
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

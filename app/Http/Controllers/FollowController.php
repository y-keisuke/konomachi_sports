<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Follow;
use Illuminate\Support\Facades\DB;

class FollowController extends Controller
{
    /**
     * ユーザーをフォローする
     *
     * @param Request $request
     */
    public function store(Request $request)
    {
        $followed_user_id = $request->user_id;
        Follow::create(
            array (
                'follow_user_id' => \Auth::user()->id,
                'followed_user_id' => $followed_user_id,
            )
        );
        return redirect('users/' . $followed_user_id . '#follow');
    }

    /**
     * フォローを解除する
     */
    public function destory(Request $request)
    {
        $followed_user_id = $request->user_id;
        $follow_user_id = \Auth::user()->id;
        DB::table('follows')->where([['follow_user_id', $follow_user_id], ['followed_user_id', $followed_user_id]])->delete();
        return redirect('users/' . $followed_user_id . '#follow');
    }
}

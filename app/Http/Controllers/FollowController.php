<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FollowController extends Controller
{
    /**
     * ユーザーをフォローする
     */
    public function store(Request $request)
    {
        $followed_user_id = $request->user_id;
        $user = User::where('id', $followed_user_id)->first();
        $following = Follow::where(['follow_user_id' => \Auth::user()->id, 'followed_user_id' => $followed_user_id,])->first();
        if ($following) {
            return redirect('users/' . $followed_user_id)->with('alert_msg', 'すでにフォローしています');
        } else {
            Follow::create(
                [
                    'follow_user_id' => \Auth::user()->id,
                    'followed_user_id' => $followed_user_id,
                ]
            );
            return redirect('users/' . $followed_user_id . '#follow')->with('success_msg', $user->name . 'さんをフォローしました');
        }

    }

    /**
     * フォローを解除する
     */
    public function destory(Request $request)
    {
        $followed_user_id = $request->user_id;
        $user = User::where('id', $followed_user_id)->first();
        $follow_user_id = \Auth::user()->id;
        DB::table('follows')->where([['follow_user_id', $follow_user_id], ['followed_user_id', $followed_user_id]])->delete();
        return redirect('users/' . $followed_user_id . '#follow')->with('success_msg', $user->name . 'さんをフォロー解除しました');
    }
}

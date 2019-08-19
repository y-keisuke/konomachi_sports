<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class LikeController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Team $team, Request $request)
    {
        $team->id = $request->team_id;
        Like::create(
            [
                'like_user_id' => \Auth::user()->id,
                'liked_team_id' => $team->id,
            ]
        );
        return redirect('teams/' . $team->id . '#like')->with('success_msg', 'お気に入り登録しました');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return Response
     */
    public function destroy(Request $request)
    {
        $team_id = $request['team_id'];
        $user_id = \Auth::user()->id;
        DB::table('likes')->where([['like_user_id', $user_id], ['liked_team_id', $team_id]])->delete();
        return redirect('teams/' . $team_id . '#like')->with('success_msg', 'お気に入り解除しました');
    }
}

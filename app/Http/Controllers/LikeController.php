<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Team;
use App\Models\Like;


class LikeController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Models\Team $team
     * @return \Illuminate\Http\Response
     */
    public function store(User $user, Team $team, Request $request)
    {
        $team->id = $request->team_id;
        Like::create(
            array (
                'like_user_id' => \Auth::user()->id,
                'liked_team_id' => $team->id,
            )
        );
        return redirect('teams/' . $team->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $team_id
     * @param $like_user_id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $team_id = $request['team_id'];
        $user_id = \Auth::user()->id;
        DB::table('likes')->where([['like_user_id', $user_id], ['liked_team_id', $team_id]])->delete();
        return redirect('teams/' . $team_id);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Board;
use App\Models\Message;
use App\Models\User;

class BoardController extends Controller
{
    /**
     * メッセージルーム
     *
     * @param Board $board
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Board $board)
    {
        $b = Message::where('board_id', $board->id)->orderBy('created_at', 'desc');
        $user = \Auth::user();
        $other_user = $board->otherUser;
        $messages = $board->messages->sortByDesc('created_at');
        return view('boards.show', ['user' => $user, 'board' => $board, 'other_user' => $other_user, 'messages' => $messages, 'b' => $b]);
    }

    /**
     * メッセージルーム作成
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $from_user_id = $request->from_user_id;
        $to_user_id = $request->to_user_id;
        //from_user_idとto_user_idに情報があれば取得
        //fromとtoを入れ替えて2パターン
        $b1 = Board::where([
            ['from_user_id', $from_user_id],
            ['to_user_id', $to_user_id],
        ])->get();
        $b2 = Board::where([
            ['from_user_id', $to_user_id],
            ['to_user_id', $from_user_id],
        ])->get();
        //上記で取得した情報があるか確認
        //なければ作成
        if (count($b1) === 0 && count($b2) === 0) {
            $board = new Board;
            $board->from_user_id = $from_user_id;
            $board->to_user_id = $to_user_id;
            $board->save();
        } elseif (count($b1) !== 0) {
            $board = $b1;
        } elseif (count($b2) !== 0) {
            $board = $b2;
        }
        return redirect('boards/' . $board->implode('id'));
    }
}

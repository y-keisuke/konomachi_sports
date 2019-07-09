<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Board;

class BoardController extends Controller
{

    public function show()
    {
        $current_user_id = \Auth::id();
        $boards = Board::where('from_user_id', $current_user_id)->orWhere('to_user_id', $current_user_id)->get();
        return view('boards.show', ['boards' => $boards]);
    }
}

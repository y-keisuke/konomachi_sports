<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function store(Request $request)
    {
        $user_id = $request->user_id;
        $board_id = $request->board_id;
        $form = $request->all();
        unset($form['_token']);
        $message = new Message;
        $message->fill($form)->save();
        return redirect('boards/' . $board_id);
    }
}

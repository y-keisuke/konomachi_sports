<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Board;
use App\Models\User;

class Message extends Model
{
    protected $guarded = array('id');

    public static $rules = array (
        'board_id' => 'required|integer',
        'user_id' => 'required|integer',
        'message' => 'required|string',
    );

    /**
     * ボード情報を取得
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function board()
    {
        return $this->belongsTo('App\Models\Board');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}

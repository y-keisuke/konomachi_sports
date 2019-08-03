<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public static $rules = [
        'board_id' => 'required|integer',
        'user_id' => 'required|integer',
        'message' => 'required|string',
    ];

    protected $guarded = ['id'];

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

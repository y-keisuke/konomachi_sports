<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public static $rules = [
        'user_id' => 'required',
        'team_id' => 'required',
        'title' => 'required|string',
        'body' => 'required|string',
    ];

    protected $guarded = ['id'];

    /**
     * リレーション（多対1）
     */
    public function team()
    {
        return $this->belongsTo('App\Models\Team');
    }
}

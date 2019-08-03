<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public static $rules = [
        'like_user_id' => 'required|integer',
        'liked_team_id' => 'required|integer',
    ];

    protected $guarded = ['id'];
}

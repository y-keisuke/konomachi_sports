<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $guarded = array('id');

    public static $rules = array (
        'like_user_id' => 'required|integer',
        'liked_team_id' => 'required|integer',
    );
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    public static $rules = [
        'follow_user_id' => 'required|integer',
        'followed_user_id' => 'required|integer',
    ];

    protected $guarded = ['id'];
}

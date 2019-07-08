<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $guarded = array('id');

    public static $rules = array (
        'follow_user_id' => 'required|integer',
        'followed_user_id' => 'required|integer',
    );
}

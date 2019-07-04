<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = array('id');

    public static $rules = array (
        'user_id' => 'required|integer',
        'team_id' => 'required|integer',
        'title' => 'required|string',
        'body' => 'required|string',
    );
}

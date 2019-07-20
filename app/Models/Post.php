<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = array('id');

    public static $rules = array (
        'user_id' => 'required',
        'team_id' => 'required',
        'title' => 'required|string',
        'body' => 'required|string',
    );



    /**
     * リレーション（多対1）
     *
     */
    public function team()
    {
        return $this->belongsTo('App\Models\Team');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $guarded = array('id');

    public static $rules = array (
        'sports' => 'required|string',
        'age' => 'required|integer',
        'level' => 'required|string',
        'area' => 'required|string',
        'frequency' => 'required|string',
        'hp' => 'url',
    );

    /**
     * リレーション（多対多）
     *
     */
    public function users()
    {
        return $this->belongsToMany('App\Models\User');
    }
    /**
     * リレーション（1対多）
     *
     */
    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }
}

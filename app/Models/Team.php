<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Like;

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

    /**
     * リレーション（多対多）
     * チームにいいねをしているユーザー情報を取得
     */
    public function likes()
    {
        return $this->belongsToMany('App\Models\User', 'likes', 'liked_team_id', 'like_user_id');
    }

    /**
     * ログインユーザーのお気に入り登録しているIDを取得
     *
     */
    public function like_by()
    {
        return Like::where('like_user_id', Auth::user()->id)->first;
    }
}

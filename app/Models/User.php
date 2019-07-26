<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'sports1', 'sports_years1','sports2', 'sports_years2', 'sports3', 'sports_years3', 'age', 'sex', 'area',
    ];

    public static $rules = array (
        'name' => 'required|string',
        'email' => 'required|email',
        'sports1' => 'required|string',
        'sports2' => 'required|string',
        'sports3' => 'required|string',
        'sports_years1' => 'required|integer',
        'sports_years2' => 'required|integer',
        'sports_years3' => 'required|integer',
        'age' => 'required|integer',
        'sex' => 'required|string',
        'area' => 'required|string',
        'password' => 'required|string',
    );

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * リレーション（1対多）
     * チームに所属するユーザー情報を取得
     */
    public function teams()
    {
        return $this->hasMany('App\Models\Team');
    }

    /**
     * リレーション（多対多）
     * いいねをしているチーム情報を取得
     */
    public function likes()
    {
        return $this->belongsToMany('App\Models\Team', 'likes', 'like_user_id', 'liked_team_id');
    }

    /**
     * リレーション（多対多）
     * 自分がフォローしているユーザー情報を取得
     */
    public function follow()
    {
        return $this->belongsToMany('App\Models\User', 'follows', 'follow_user_id', 'followed_user_id');
    }

    /**
     * リレーション（多対多）
     * 自分をフォローしているユーザー情報を取得
     */
    public function followed()
    {
        return $this->belongsToMany('App\Models\User', 'follows', 'followed_user_id', 'follow_user_id');
    }

    /**
     * 自分から送ったメッセージ部屋の情報
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function from_boards()
    {
        return $this->belongsToMany('App\Models\User', 'boards', 'from_user_id', 'to_user_id')->withPivot('id');
    }

    /**
     * 相手から受け取ったメッセージ部屋の情報
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function to_boards()
    {
        return $this->belongsToMany('App\Models\User', 'boards', 'to_user_id', 'from_user_id')->withPivot('id');
    }

    /**
     *
     */
    public function messages()
    {
        return $this->hasMany('App\Models\Message');
    }

    /**
     * リレーション（1対多）
     *
     */
    public function sport()
    {
        return $this->hasOne('App\Models\Sport');
    }
}

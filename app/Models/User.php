<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail as MustVerifyEmailContract;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\CustomResetPassword;
use App\Notifications\CustomVerifyEmail;

class User extends Authenticatable implements MustVerifyEmailContract
{
    use MustVerifyEmail, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'sports1', 'sports_years1','sports2', 'sports_years2', 'sports3', 'sports_years3', 'age', 'sex', 'area',
    ];

    public static $rules = array (
        'name' => 'required|string|max:10',
        'email' => 'required|email',
        'sports1' => 'string|nullable',
        'sports2' => 'string|nullable',
        'sports3' => 'string|nullable',
        'sports_years1' => 'integer|nullable',
        'sports_years2' => 'integer|nullable',
        'sports_years3' => 'integer|nullable',
        'age' => 'integer|nullable',
        'sex' => 'string|nullable',
        'area' => 'string|nullable',
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
     * パスワード再設定メール送信
     *
     * @param string $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new CustomResetPassword($token));
    }

    /**
     * メールアドレス確認用メール
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new CustomVerifyEmail());
    }

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

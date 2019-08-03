<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    public static $rules = [
        'from_user_id' => 'required|integer',
        'to_user_id' => 'required|integer',
    ];

    protected $guarded = ['id'];

    /**
     * メッセージを送ったユーザーを取得
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function fromUser()
    {
        return $this->hasOne('App\Models\User', 'id', 'from_user_id');
    }

    /**
     * メッセージを受け取ったユーザーの情報を取得
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function toUser()
    {
        return $this->hasOne('App\Models\User', 'id', 'to_user_id');
    }

    /**
     * 自分ではないユーザーの情報を取得
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function otherUser()
    {
        $user_id = \Auth::id();
        $other_key = '';

        if ($user_id === $this->from_user_id) {
            $other_key = 'to_user_id';
        } elseif ($user_id === $this->to_user_id) {
            $other_key = 'from_user_id';
        }
        return $this->hasOne('App\Models\User', 'id', $other_key);
    }

    /**
     * メッセージ情報を取得
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function messages()
    {
        return $this->hasMany('App\Models\Message');
    }
}

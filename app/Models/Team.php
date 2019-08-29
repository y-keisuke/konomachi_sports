<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    public static $rules = [
        'sports' => 'required|string',
        'age' => 'required|integer',
        'level' => 'required|string',
        'area' => 'required|string',
        'frequency' => 'required|string',
        'hp' => 'url',
        'user_id' => 'required',
    ];

    protected $guarded = ['id'];

    /**
     * リレーション（1対多）
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * リレーション（1対多）
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
     * リレーション（1対多）
     */
    public function age()
    {
        return $this->belongsTo('App\Models\Age', 'age');
    }

    /**
     * リレーション（1対多）
     */
    public function frequency()
    {
        return $this->belongsTo('App\Models\Frequency');
    }

    /**
     * リレーション（1対多）
     */
    public function level()
    {
        return $this->belongsTo('App\Models\Level');
    }

    /**
     * リレーション（1対多）
     */
    public function sex()
    {
        return $this->belongsTo('App\Models\Sex');
    }

    /**
     * リレーション（1対多）
     */
    public function sport()
    {
        return $this->belongsTo('App\Models\Sport');
    }

    /**
     * リレーション（1対多）
     */
    public function weekday()
    {
        return $this->belongsTo('App\Models\Weekday');
    }

    /**
     * ログインユーザーのお気に入り登録しているIDを取得
     */
    public function like_by()
    {
        return Like::where('like_user_id', Auth::user()->id)->first;
    }

    /**
     * スコープでスポーツ情報取得
     *
     * @param $query
     * @param $str
     * @return mixed
     */
    public function scopeEqualSports($query, $str)
    {
        if ($str) {
            return $query->where('sports', $str);
        }
        return null;
    }

    /**
     * スコープで地域情報取得
     *
     * @param $query
     * @param $str
     * @return
     */
    public function scopeFuzzyAreas($query, $str)
    {
        if ($str) {
            return $query->where('area', 'like', "%{$str}%");
        }
        return null;
    }

    /**
     * スコープで年齢層情報取得
     *
     * @param $query
     * @param $str
     * @return
     */
    public function scopeEqualAges($query, $str)
    {
        if ($str) {
            return $query->where('age', $str);
        }
        return null;
    }

    /**
     * スコープで募集対象情報取得
     *
     * @param $query
     * @param $str
     * @return
     */
    public function scopeEqualLevels($query, $str)
    {
        if ($str) {
            return $query->where('level', $str);
        }
        return null;
    }

    /**
     * スコープで活動頻度情報取得
     *
     * @param $query
     * @param $str
     * @return
     */
    public function scopeEqualFrequencies($query, $str)
    {
        if ($str) {
            return $query->where('frequency', $str);
        }
        return null;
    }

    /**
     * スコープで活動曜日情報取得
     *
     * @param $query
     * @param $str
     * @return
     */
    public function scopeEqualWeekdays($query, $str)
    {
        if ($str) {
            return $query->where('weekday', $str);
        }
        return null;
    }
}

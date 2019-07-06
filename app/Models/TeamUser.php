<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamUser extends Model
{
    protected $guarded = array('id');

    public static $rules = array (
        'team_id' => 'required|integer',
        'user_id' => 'required|integer',
        'admin'   => 'required|boolean',
    );

    /**
     * リレーション（従）
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function team()
    {
        return $this->belongsTo('App\Models\Team');
    }

    /**
     * リレーション（従）
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}

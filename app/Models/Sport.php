<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
    protected $guarded = array('id');

    /**
     * リレーション（1対多）
     *
     */
    public function teams()
    {
        return $this->hasMany('App\Models\Team');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Age extends Model
{
    protected $guarded = array('id');

    /**
     * リレーション（1対多）
     *
     */
    public function team()
    {
        return $this->belongsTo('App\Models\Age');
    }
}

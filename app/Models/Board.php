<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    protected $guarded = array('id');

    public static $rules = array (
        'from_user_id' => 'required|integer',
        'to_user_id' => 'required|integer',
    );

    public function users()
    {
        return $this->belongsTo('App\User');
    }
    public function messages()
    {
        return $this->hasMany('App\Message');
    }
}

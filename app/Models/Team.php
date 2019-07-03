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
}

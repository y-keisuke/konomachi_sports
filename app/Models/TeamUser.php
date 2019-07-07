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

}

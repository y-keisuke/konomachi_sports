<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $guarded = ['id'];

    /**
     * モデルと関連しているテーブル
     *
     * @var string
     */
    protected $table = 'admin';
}

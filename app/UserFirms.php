<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserFirms extends Model
{
    protected $fillable = [
        'user_id', 'firm_id'
    ];
}

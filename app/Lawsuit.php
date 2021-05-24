<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lawsuit extends Model
{
    protected $fillable = [
        'user_id', 'council_id','partner_id','enforcer_id','date_from','date_to','price','status'
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Warning extends Model
{
    protected $fillable = [
        'user_id', 'council_id','address_id', 'space_id','date_from','date_to','price','status'
    ];
}

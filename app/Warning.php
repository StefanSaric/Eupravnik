<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Warning extends Model
{
    protected $fillable = [
        'council_id','partner_id','date_from','date_to','price','status'
    ];
}

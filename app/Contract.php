<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $fillable = [
        'user_id', 'council_id', 'partner_id', 'description', 'date_from', 'date_to', 'price', 'real_price', 'group'
    ];
}

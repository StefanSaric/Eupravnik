<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Firm extends Model
{
    protected $fillable = [
        'user_id', 'name', 'address', 'city', 'post', 'phone', 'email', 'pib', 'id_number', 'account', 'password', 'percentage'
    ];
}

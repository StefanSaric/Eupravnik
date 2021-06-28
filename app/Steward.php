<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Steward extends Model
{
    protected $fillable = [
        'user_id', 'firm_id', 'name', 'last_name', 'jmbg', 'email', 'password', 'phone', 'address', 'licence', 'account'
    ];
}

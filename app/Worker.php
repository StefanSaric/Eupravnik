<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    protected $fillable = [
        'email', 'password', 'password_confirm', 'type_id', 'first_name', 'last_name', 'address', 'telephone', 'licence'
    ];

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enforcer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'company_id', 'name', 'email', 'phone', 'address', 'city', 'postcode', 'account', 'pib', 'maticni', 'br_resenja', 'status'
    ];
}

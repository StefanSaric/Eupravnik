<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'company_id', 'partner_code', 'name', 'email', 'phone', 'address', 'city', 'postcode', 'account', 'pib', 'maticni', 'status'
    ];
}

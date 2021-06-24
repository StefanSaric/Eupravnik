<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Council extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firm_id' ,'user_id', 'reserve_id', 'name', 'short_name', 'city', 'area', 'account', 'maticni', 'latitude', 'longitude', 'pib', 'phone'
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Space extends Model
{
    protected $fillable = [
        'council_address_id', 'council_id', 'representative', 'phone', 'email', 
        'floor_number', 'apartment_number', 'household_members_number',
        'reported_area_size', 'on_site_area_size', 'type', 'status'
    ];
}

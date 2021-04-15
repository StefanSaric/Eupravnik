<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CouncilAddress extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'council_id', 'address', 'protection_status', 'area_size', 'built_year', 'short_name', 'floors_number', 'elevators_number', 'roof_type', 'lightning_rod', 'district_heating', 'cellar', 'attic', 'shelter', 'energy_passport'
    ];
}

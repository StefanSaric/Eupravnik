<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    protected $fillable = [
        'council_id', 'user_id', 'group_id', 'date', 'name', 'reported_condition', 'contractor', 'priority', 'element_date', 'type', 'status', 'is_checked'
    ];

    public function offers() {
        return $this->hasMany('App\Offer','maintenance_id','id');
    }
}

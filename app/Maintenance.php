<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    protected $fillable = [
        'council_id', 'user_id', 'date', 'name', 'reported_condition', 'contractor', 'priority', 'element_date', 'type', 'status'
    ];
}

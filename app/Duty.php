<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Duty extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'name', 'description', 'date_from', 'time_from', 'date_to', 'time_to', 'is_private'
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'council_id', 'owner', 'date', 'partner', 'amount', 'type', 'state', 'realised', 'rest'
    ];
}

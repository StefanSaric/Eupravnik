<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Worker_Types extends Model
{
    protected $fillable = [
        'name'
    ];

    public $table = 'worker_types';
}

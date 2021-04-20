<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [
        'url', 'name', 'type', 'type_id'
    ];
}

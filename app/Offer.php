<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $fillable = [
        'program_id', 'partner_id', 'date', 'price', 'description', 'status'
    ];

    public function documents() {
        return $this->hasMany('App\Document', 'offer_id', 'id');
    }
}

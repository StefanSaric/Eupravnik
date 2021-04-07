<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $fillable = [
        'maintenance_id', 'partner_id', 'date', 'price', 'description'
    ];

    public function documents() {
        return $this->hasMany('App\Document', 'offer_id', 'id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TicketPrice extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    protected $table = "ticket_prices";

    public function tripRoute()
    {
     return $this->belongsTo('App\TripRoute','trip_route_id','id');
    }
    public function fleetType()
    {
     return $this->belongsTo('App\FleetType','fleet_type_id','id');
    }

    protected $dates = [
        'created_at', 'updated_at',
    ];

    
}

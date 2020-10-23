<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TripAssign extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    protected $table ="trip_assigns";

    protected $with = ['fleetRegistration','tripRoute'];


    public function ticketBooking()
    {
        return $this->hasMany('App\TicketBooking','trip_assign_id_no', 'id');
    }

    public function fleetRegistration()
    {
        return $this->belongsTo('App\FleetRegistration','fleet_registration_id', 'id');
    }
    public function tripRoute()
    {
        return $this->belongsTo('App\TripRoute','trip_route_id', 'id');
    }


    protected $dates = [
        'start_date', 'end_date',
    ];

}

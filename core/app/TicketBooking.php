<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TicketBooking extends Model
{
    use SoftDeletes;
    protected $guarded = ['id'];
    protected $table = "ticket_bookings";

    protected $with = ['tripRoute','fleetRegistration','pdf'];


    public function tripRoute()
    {
        return $this->belongsTo('App\TripRoute','trip_route_id','id');
    }
    public function fleetRegistration()
    {
        return $this->belongsTo('App\FleetRegistration','fleet_registration_id','id');
    }
    public function tripAssign()
    {
        return $this->belongsTo('App\TripAssign','trip_assign_id_no','id');
    }

    public function agent()
    {
        return $this->belongsTo('App\Agent','agent_id','id');
    }


    public function  pdf(){
        return $this->hasOne('App\LogPdf','ticket_id');
    }


}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FleetRegistration extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    protected $table ="fleet_registrations";

    public function fleetType()
    {
        return $this->belongsTo('App\FleetType','fleet_type_id','id');
    }


    protected $dates = [
        'deleted_at'
    ];

}

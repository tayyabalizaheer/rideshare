<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TripRoute extends Model
{
    use SoftDeletes;
    protected $table = "trip_routes";

    protected $guarded = [];

    protected $with = ['startPoint','endPoint'];

    public function startPoint()
    {
        return $this->belongsTo('App\TripLocation','start_point','id');
    }
    public function endPoint()
    {
        return $this->belongsTo('App\TripLocation','end_point','id');
    }

    protected $dates = [
        'start_date','end_date',
    ];
}

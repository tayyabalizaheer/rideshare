<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TripLocation extends Model
{
    use SoftDeletes;
    protected  $guarded = [];
    protected $table ="trip_locations";


}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FleetType extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    protected $table ="fleet_types";

}

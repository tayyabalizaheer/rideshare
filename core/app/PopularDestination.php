<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PopularDestination extends Model
{
    protected $guarded = ['id'];

    protected $table = "popular_destinations";
}

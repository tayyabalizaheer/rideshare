<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PopularTour extends Model
{
    protected $guarded = ['id'];
    protected $table = "popular_tours";
}

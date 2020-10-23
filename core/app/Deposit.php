<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    protected $table = 'deposits';
    protected $guarded = [];


    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }

    public function agent()
    {
        return $this->belongsTo('App\Agent','user_id','id');
    }
    public function gateway()
    {
        return $this->belongsTo('App\Gateway');
    }

    public function ticketPassenger()
    {
        return $this->belongsTo('App\TicketBooking','ticket_booking_id','id');
    }




}

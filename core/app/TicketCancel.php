<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TicketCancel extends Model
{
    use SoftDeletes;
    protected $guarded = ['id'];

    protected $table = "ticket_cancels";

    protected $with = ['user','ticketBooking'];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function ticketBooking()
    {
        return $this->belongsTo('App\TicketBooking', 'ticket_booking_id', 'id');
    }







}

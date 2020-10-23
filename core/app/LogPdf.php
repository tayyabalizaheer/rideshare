<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogPdf extends Model
{
    protected  $table = "log_pdfs";
    protected  $guarded = [];

    public function ticketBooking()
    {
        return $this->belongsTo('App\TicketBooking','ticket_id','id');
    }

}

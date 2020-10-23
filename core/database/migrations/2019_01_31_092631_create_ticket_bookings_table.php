<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_no')->nullable();
            $table->integer('trip_id_no')->nullable();
            $table->integer('tkt_passenger_id_no')->nullable();
            $table->integer('trip_route_id')->nullable();
            $table->string('pickup_trip_location')->nullable();
            $table->string('drop_trip_location')->nullable();
            $table->float('price')->nullable();
            $table->float('discount')->nullable();
            $table->integer('total_seat')->nullable();
            $table->string('seat_numbers')->nullable();
            $table->string('offer_code')->nullable();
            $table->integer('tkt_refund_id')->nullable();
            $table->integer('agent_id')->nullable();
            $table->dateTime('booking_date')->nullable();
            $table->dateTime('date')->nullable();
            $table->string('booking_type')->nullable();
            $table->tinyInteger('payment_status')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ticket_bookings');
    }
}

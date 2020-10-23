<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFleetRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fleet_registrations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('reg_no')->nullable();
            $table->integer('fleet_type_id')->nullable();
            $table->string('engine_no')->nullable();
            $table->string('model_no')->nullable();
            $table->string('chasis_no')->nullable();
            $table->string('layout')->nullable();
            $table->string('lastseat')->nullable();
            $table->integer('total_seat')->nullable();
            $table->text('seat_numbers')->nullable();
            $table->string('fleet_facilities')->nullable();
            $table->string('owner')->nullable();
            $table->string('company')->nullable();
            $table->tinyInteger('ac_available')->default(0);
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('fleet_registrations');
    }
}

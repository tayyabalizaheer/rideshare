<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTripAssignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trip_assigns', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fleet_registration_id')->nullable();
            $table->integer('trip_route_id')->nullable();
            $table->timestamp('start_date')->nullable();
            $table->timestamp('end_date')->nullable();
            $table->integer('sold_ticket')->default(0);
            $table->decimal('	total_income', 8, 2)->default(0);
            $table->decimal('	total_expense', 8, 2)->default(0);
            $table->decimal('	total_fuel', 8, 2)->default(0);
            $table->text('comment')->nullable();
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
        Schema::dropIfExists('trip_assigns');
    }
}

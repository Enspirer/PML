<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('first_name');
            $table->text('last_name');
            $table->text('method_of_contact');
            $table->text('email')->nullable();
            $table->text('phone_number')->nullable();
            $table->text('message')->nullable();
            $table->text('im_resident')->nullable();
            $table->text('respond_check')->nullable();
            $table->text('user_id');
            $table->text('property_id');
            $table->text('agent_id');
            $table->text('booking_time')->nullable();
            $table->text('status');
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
        Schema::dropIfExists('bookings');
    }
}

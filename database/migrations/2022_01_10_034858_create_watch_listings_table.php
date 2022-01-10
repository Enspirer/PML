<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWatchListingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('watch_listings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('new_list')->nullable();
            $table->text('sold_list')->nullable();
            $table->text('de_list')->nullable();
            $table->text('watch_list')->nullable();
            $table->text('user_id');
            $table->text('property_id');
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
        Schema::dropIfExists('watch_listings');
    }
}

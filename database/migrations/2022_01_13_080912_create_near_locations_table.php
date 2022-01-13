<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNearLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('near_locations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('lng');
            $table->text('lat');
            $table->text('name');
            $table->text('address');
            $table->text('property_id');
            $table->text('icon')->nullable();
            $table->text('feature_img')->nullable();
            $table->text('type');
            $table->text('distance');
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
        Schema::dropIfExists('near_locations');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('country_name')->nullable();
            $table->text('slug')->nullable();
            $table->text('currency')->nullable();
            $table->text('user_id')->nullable();
            $table->text('country_id')->nullable();
            $table->text('country_manager')->nullable();
            $table->text('status')->nullable();
            $table->text('features_manager')->nullable();
            $table->text('currency_rate')->nullable();
            $table->text('address')->nullable();
            $table->text('opening_hours')->nullable();
            $table->text('phone_numbers')->nullable();
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
        Schema::dropIfExists('countries');
    }
}

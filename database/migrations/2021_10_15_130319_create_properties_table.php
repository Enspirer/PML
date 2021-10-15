<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('long');
            $table->text('lat');
            $table->text('beds')->nullable();
            $table->text('baths')->nullable();
            $table->text('property_type');
            $table->text('price');
            $table->text('negotiable')->nullable();
            $table->text('land_size')->nullable();
            $table->text('listed_since')->nullable();
            $table->text('open_houses_only')->nullable();
            $table->text('zoning_type')->nullable();
            $table->text('number_of_units')->nullable();
            $table->text('building_size')->nullable();
            $table->text('farm_type')->nullable();
            $table->text('building_type')->nullable();
            $table->text('open_house_only')->nullable();
            $table->text('transaction_type');
            $table->text('parking_type')->nullable();
            $table->text('country');
            $table->text('name');
            $table->text('main_category');
            $table->text('meta_description')->nullable();
            $table->text('slug');
            $table->text('image_ids')->nullable();
            $table->text('user_id');
            $table->text('admin_approval')->nullable();
            $table->text('country_manager_approval')->nullable();
            $table->text('feature_image_id')->nullable();
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
        Schema::dropIfExists('properties');
    }
}

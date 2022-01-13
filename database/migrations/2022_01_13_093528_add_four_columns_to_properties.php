<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFourColumnsToProperties extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->text('address_one')->nullable()->after('meta_keywords');
            $table->text('address_two')->nullable()->after('meta_keywords');
            $table->text('states')->nullable()->after('meta_keywords');
            $table->text('postal_code')->nullable()->after('meta_keywords');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->dropColumn('address_one');
            $table->dropColumn('address_two');
            $table->dropColumn('states');
            $table->dropColumn('postal_code');
        });
    }
}

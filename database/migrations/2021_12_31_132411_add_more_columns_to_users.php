<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMoreColumnsToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->text('mobile_phone')->nullable()->after('email');
            $table->text('home_phone')->nullable()->after('email');
            $table->text('postal_code')->nullable()->after('email');
            $table->text('country')->nullable()->after('email');
            $table->text('province')->nullable()->after('email');
            $table->text('city')->nullable()->after('email');
            $table->text('marital_status')->nullable()->after('email');
            $table->text('gender')->nullable()->after('email');
            $table->text('birth_date')->nullable()->after('email');
            $table->text('preference')->nullable()->after('email');
            $table->text('display_name')->nullable()->after('email');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('mobile_phone');
            $table->dropColumn('home_phone');
            $table->dropColumn('postal_code');
            $table->dropColumn('country');
            $table->dropColumn('province');
            $table->dropColumn('city');
            $table->dropColumn('marital_status');
            $table->dropColumn('gender');
            $table->dropColumn('birth_date');
            $table->dropColumn('preference');
            $table->dropColumn('display_name');
        });
    }
}

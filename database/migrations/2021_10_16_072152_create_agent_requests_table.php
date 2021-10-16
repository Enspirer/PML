<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agent_requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('name')->nullable();
            $table->text('country')->nullable();
            $table->text('agent_type')->nullable();
            $table->text('validation_type')->nullable();
            $table->text('company_name')->nullable();
            $table->text('company_registration_number')->nullable();
            $table->text('address')->nullable();
            $table->text('city')->nullable();
            $table->text('telephone')->nullable();
            $table->text('email')->nullable();
            $table->text('description_message')->nullable();
            $table->text('request')->nullable();
            $table->text('photo')->nullable();
            $table->text('cover_photo')->nullable();
            $table->text('nic')->nullable();
            $table->text('passport')->nullable();
            $table->text('license')->nullable();
            $table->text('tax_number')->nullable();
            $table->text('user_id')->nullable();
            $table->text('status')->nullable();
            $table->text('nic_photo')->nullable();
            $table->text('passport_photo')->nullable();
            $table->text('license_photo')->nullable();
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
        Schema::dropIfExists('agent_requests');
    }
}

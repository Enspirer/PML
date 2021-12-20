<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAreaManagerApprovalColumnToAgentRequests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('agent_requests', function (Blueprint $table) {
            $table->text('area_manager_approval')->nullable()->after('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('agent_requests', function (Blueprint $table) {
            $table->dropColumn('area_manager_approval');
        });
    }
}

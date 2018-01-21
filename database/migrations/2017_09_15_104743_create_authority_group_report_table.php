<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthorityGroupReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('authority_group_report', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('authority_group_id')->unsigned();
            $table->Integer('report_id')->unsigned();
        });

        Schema::table('authority_group_report', function($table) {
            $table->foreign('authority_group_id')->references('id')->on('authority_groups');
            $table->foreign('report_id')->references('id')->on('reports');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('authority_group_report');
    }
}

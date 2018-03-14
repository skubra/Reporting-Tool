<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGraphsReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('graph_report', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('report_id')->unsigned();
            $table->Integer('graph_id')->unsigned();
        });

        Schema::table('graph_report', function($table) {
            $table->foreign('report_id')->references('id')->on('reports');
            $table->foreign('graph_id')->references('id')->on('graphs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('graph_report');
    }
}

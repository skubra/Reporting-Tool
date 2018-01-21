<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FormParamReport extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_param_report', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('report_id')->unsigned();
            $table->Integer('form_param_id')->unsigned();
        });

        Schema::table('form_param_report', function($table) {
            $table->foreign('report_id')->references('id')->on('reports');
            $table->foreign('form_param_id')->references('id')->on('form_params');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('form_param_report');
    }
}

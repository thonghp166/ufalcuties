<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffFieldTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('field_staff', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('staff_id')->unsigned();
            $table->integer('field_id')->unsigned();
            $table->engine = 'InnoDB';
        });
        Schema::table('field_staff', function($table) {
            $table->foreign('staff_id')->references('id')->on('staff')->onDelete('cascade');
            $table->foreign('field_id')->references('id')->on('field')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('field_staff');
    }
}

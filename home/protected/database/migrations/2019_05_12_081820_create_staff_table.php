<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unique()->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('name');
            $table->string('code')->default('');
            $table->string('account')->unique();
            $table->string('staff_type')->default('Giảng viên');
            $table->string('degree')->default('');
            $table->string('phone')->default('');
            $table->string('vnu_email')->unique();
            $table->string('gmail')->default('');
            $table->string('website')->default('');
            $table->string('address')->default('');
            $table->integer('department_id')->default(1)->unsigned();
            $table->foreign('department_id')->references('id')->on('department')->onDelete('cascade');
            $table->string('img_url')->default('images/avatar/defaultAvatar.png');
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staff');
    }
}

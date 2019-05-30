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
            $table->integer('department_id')->unsigned()->default(1);
            $table->string('img_url')->default('images/avatar/defaultAvatar.png');
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
        Schema::dropIfExists('staff');
    }
}

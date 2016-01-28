<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->binary('avatar')->nullable();
            $table->enum('gender', array('男', '女'))->nullable();
            $table->date('birthday')->nullable();
            $table->string('province_id', 20)->nullable();
            $table->string('city_id', 20)->nullable();
            $table->string('area_id', 20)->nullable();
            $table->integer('grade')->unsigned()->default(1);
            $table->integer('credit')->unsigned()->default(0);
            $table->rememberToken();
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
        Schema::drop('users');
    }
}

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
            $table->string('author_name');
            $table->date('birthday');
            $table->string('phone_number');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->string('description');
            $table->string('create');
            $table->string('edit');
            $table->string('delete');
            $table->string('admin');    
            $table->timestamp('added_on');
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

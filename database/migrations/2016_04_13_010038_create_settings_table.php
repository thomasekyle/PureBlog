<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('users');
            $table->string('blog_name')->unique();
            $table->string('blog_description');
            $table->string('blog_phone_number');
            $table->string('blog_email');
            $table->string('blog_facebook');
            $table->string('blog_twitter');
            $table->string('blog_linkedin');
            $table->string('blog_instagram');
            $table->string('blog_github');
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
        //
    }
}

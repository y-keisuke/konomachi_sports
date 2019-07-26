<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('sports')->unsigned();
            $table->integer('age')->unsigned();
            $table->integer('level')->unsigned();
            $table->string('area');
            $table->integer('frequency')->unsigned();
            $table->integer('weekday')->unsigned();
            $table->string('hp')->nullable();
            $table->timestamps();
            //外部キー
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('sports')->references('id')->on('sports')->onDelete('cascade');
            $table->foreign('age')->references('id')->on('ages')->onDelete('cascade');
            $table->foreign('level')->references('id')->on('levels')->onDelete('cascade');
            $table->foreign('frequency')->references('id')->on('frequencies')->onDelete('cascade');
            $table->foreign('weekday')->references('id')->on('weekdays')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teams');
    }
}

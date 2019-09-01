<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table): void {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('sports');
            $table->string('age');
            $table->string('level');
            $table->string('area');
            $table->string('frequency');
            $table->string('weekday');
            $table->string('hp')->nullable();
            $table->timestamps();
            //外部キー
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('sports')->references('sport')->on('sports')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('age')->references('age')->on('ages')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('level')->references('level')->on('levels')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('frequency')->references('frequency')->on('frequencies')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('weekday')->references('weekday')->on('weekdays')->onDelete('cascade')->onUpdate('cascade');
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

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('likes', function (Blueprint $table): void {
            $table->increments('id');
            $table->integer('like_user_id')->unsigned();
            $table->integer('liked_team_id')->unsigned();
            $table->timestamps();
            //外部キー
            $table->foreign('like_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('liked_team_id')->references('id')->on('teams')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('likes');
    }
}

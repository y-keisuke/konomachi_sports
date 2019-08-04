<?php

use Illuminate\Support\Facades\Schema;
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
            $table->string('sports1')->nullable();
            $table->integer('sports_years1')->nullable();
            $table->string('sports2')->nullable();
            $table->integer('sports_years2')->nullable();
            $table->string('sports3')->nullable();
            $table->integer('sports_years3')->nullable();
            $table->integer('age')->nullable();
            $table->string('sex')->nullable();
            $table->string('area')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            //外部キー
            $table->foreign('sports1')->references('sport')->on('sports')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('sports2')->references('sport')->on('sports')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('sports3')->references('sport')->on('sports')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('sex')->references('sex')->on('sex')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('users');
        Schema::enableForeignKeyConstraints();
    }
}

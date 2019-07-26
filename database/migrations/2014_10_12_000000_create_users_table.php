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
            $table->integer('sports1')->nullable()->unsigned();
            $table->integer('sports_years1')->nullable();
            $table->integer('sports2')->nullable()->unsigned();
            $table->integer('sports_years2')->nullable();
            $table->integer('sports3')->nullable()->unsigned();
            $table->integer('sports_years3')->nullable();
            $table->integer('age')->nullable();
            $table->integer('sex')->nullable();
            $table->string('area')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            //外部キー
            $table->foreign('sports1')->references('id')->on('sports')->onDelete('cascade');
            $table->foreign('sports2')->references('id')->on('sports')->onDelete('cascade');
            $table->foreign('sports3')->references('id')->on('sports')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}

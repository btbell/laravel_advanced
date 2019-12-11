<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BasicPointingSystem extends Migration
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
            $table->string('title');
            $table->timestamps();
        });

        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('team_id')->index('team_id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->longText('description')->nullable();
            $table->unsignedInteger('team_id')->index('team_id');
            $table->timestamps();
        });

        Schema::create('points', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('value')->index('value');
            $table->unsignedInteger('ticket_id')->index('ticket_id');
            $table->unsignedInteger('owner_id')->index('owner_id');
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
        Schema::dropIfExists('points');
        Schema::dropIfExists('tickets');
        Schema::dropIfExists('teams');
        Schema::dropIfExists('users');
    }
}
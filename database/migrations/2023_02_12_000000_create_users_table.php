<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->unsignedBigInteger('alliance_id')->nullable();
            $table->unsignedBigInteger('current_team_id')->nullable();
            $table->unsignedBigInteger('current_squad_id')->nullable();
            $table->unsignedBigInteger('contract_id')->nullable();
            $table->tinyInteger('role')->nullable()->comment('admin = 1,coach = 2,player = 3');
            $table->string('name')->nullable();
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('gender')->nullable();
            $table->string('photo')->nullable();
            $table->date('dob')->nullable();
            $table->unsignedBigInteger('player_position')->nullable();
            $table->string('authcode')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->foreign('alliance_id')->references('id')->on('alliances')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('current_team_id')->references('id')->on('teams')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('current_squad_id')->references('id')->on('squads')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('contract_id')->references('id')->on('contracts')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('player_position')->references('id')->on('player_positions')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('users');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFixturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fixtures', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('team_1_id')->nullable();
            $table->string('team_2')->nullable();
            $table->text('location')->nullable();
            $table->string('result')->nullable();
            $table->string('outcome')->nullable();
            $table->date('date')->nullable();
            $table->tinyInteger('score_added')->default(0);
            $table->foreign('team_1_id')->references('id')->on('alliances')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('fixtures');
    }
}

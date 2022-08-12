<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scores', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('game_version_id');

            $table->mediumInteger('score')->unsigned(); //16777215
            $table->smallInteger('level')->unsigned(); //65535
            $table->smallInteger('time_s')->unsigned(); //65535
            //nelle colonne ck vanno salvate le variabili di controllo anti cheat
            $table->mediumInteger('score_ck')->unsigned();
            $table->smallInteger('level_ck')->unsigned();
            $table->smallInteger('time_s_ck')->unsigned();

            $table->unsignedBigInteger('user_id');

            $table->foreign('game_version_id')
                ->references('id')
                ->on('game_versions');

            $table->foreign('user_id')
                ->references('id')
                ->on('users');
            
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
        Schema::dropIfExists('scores');
    }
}

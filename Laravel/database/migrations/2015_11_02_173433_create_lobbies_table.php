<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLobbiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lobbies', function (Blueprint $table) {
            $table->increments('id');
			$table->string('matchType');
			$table->string('startTime');
			$table->integer('entryFee');
			$table->integer('numberOfPlayers');
			$table->integer('player1ID')->default(-1);
			$table->integer('player2ID')->default(-1);
			$table->string('player1_1');
			$table->string('player1_2');
			$table->string('player1_3');
			$table->string('player1_4');
			$table->string('player1_5');
			$table->string('player2_1');
			$table->string('player2_2');
			$table->string('player2_3');
			$table->string('player2_4');
			$table->string('player2_5');
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
        Schema::drop('lobbies');
    }
}

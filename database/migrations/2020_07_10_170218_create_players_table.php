<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->id();
			$table->integer('team_id');
			$table->string('logoUri');
			$table->string('firstName');
			$table->string('lastName');
			$table->string('imageUri');
			$table->integer('jersey_number');
			$table->string('country');
			$table->string('country');
			$table->text('player_history');
			$table->integer('status');
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
        Schema::dropIfExists('players');
    }
}

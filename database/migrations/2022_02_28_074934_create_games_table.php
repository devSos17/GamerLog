<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('title')->unique();

            // clasification 1 to many
            /* $table->foreign('clasification_id'); */
            $table->string('clasification');

            $table->integer('cost');
            $table->integer('price');
        });
    }

    public function down()
    {
        Schema::dropIfExists('games');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsolesTable extends Migration
{
    public function up()
    {
        Schema::create('game_consoles', function (Blueprint $table) {
            $table->id()->unique();
            $table->timestamps();

            $table->string('name');

            $table->string('brand');

        });

        Schema::table('games', function(Blueprint $table){
            $table->unsignedBigInteger('game_console_id')->nullable()->after('clasification');

            $table->foreign('game_console_id')->references('id')->on('game_consoles')
                ->onUpdate('cascade')
                ->onDelete('set null');

        });
    }

    public function down()
    {
        Schema::dropIfExists('consoles');
    }
}

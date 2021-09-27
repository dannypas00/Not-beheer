<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayerFixturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('player_fixtures', function (Blueprint $table) {
            $table->id();

            $table->foreignId('fixture_id')
                ->nullable()
                ->references('id')
                ->on('fixtures');

            $table->foreignId('player_id')
                ->nullable()
                ->references('id')
                ->on('players');

            $table->unsignedBigInteger('order');

            $table->softDeletes();
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
        Schema::dropIfExists('player_matches');
    }
}

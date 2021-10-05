<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FixturesPlayer1Player2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fixtures', function (Blueprint $table) {
            $table->foreignId('player_1')
                ->after('start_score')
                ->nullable()
                ->references('id')
                ->on('players');
            $table->foreignId('player_2')
                ->after('start_score')
                ->nullable()
                ->references('id')
                ->on('players');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fixtures', function (Blueprint $table) {
            $table->dropColumn('player_1');
            $table->dropColumn('player_2');
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTurnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('turns', function (Blueprint $table) {
            $table->id();
            $table->foreignId('player')
                ->references('id')
                ->on('players')
                ->cascadeOnDelete();
            $table->foreignId('leg')
                ->references('id')
                ->on('legs')
                ->cascadeOnDelete();
            $table->string('throw_1', 8);
            $table->string('throw_2', 8);
            $table->string('throw_3', 8);
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
        Schema::dropIfExists('turns');
    }
}

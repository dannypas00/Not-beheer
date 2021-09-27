<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLegsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('legs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('set_id')
                ->nullable()
                ->references('id')
                ->on('sets');
            $table->unsignedDouble('average_score')->default(0);
            $table->string('winner')->nullable();

            $table->json('throws')->nullable();

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
        Schema::dropIfExists('legs');
    }
}

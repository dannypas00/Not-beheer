<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('iso3');
            $table->string('iso2');
            $table->string('emoji');
            $table->timestamps();
            //id,name,iso3,iso2,numeric_code,phone_code,capital,currency,currency_symbol,tld,native,region,subregion,timezones,latitude,longitude,emoji,emojiU
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::dropIfExists('countries');
    }
}

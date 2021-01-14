<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWyplataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wyplata', function (Blueprint $table) {
            $table->id('numer_dowodu_wplaty');
            $table->date('data');
            $table->text('tresc');
            $table->decimal('kwota_rozchodu', 10, 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wyplata');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWplataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wplata', function (Blueprint $table) {
            $table->id('numer dowodu wplaty');
            $table->date('data');
            $table->text('tresc');
            $table->decimal('kwota przychodu', 10, 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wplata');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignToNotatkiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('notatki', function (Blueprint $table) {
	$table->integer('id_usterki')->unsigned();
	$table->foreign('id_usterki')->references('id_usterki')->on('usterki');            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('notatki', function (Blueprint $table) {
            //
        });
    }
}

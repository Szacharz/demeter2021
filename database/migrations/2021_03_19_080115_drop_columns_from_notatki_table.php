<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropColumnsFromNotatkiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('notatki', function (Blueprint $table) {
    	    $table->renameColumn('id_notatki','do_usuniecia');
	    $table->renameColumn('id_usterki','id_notatki');   //
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

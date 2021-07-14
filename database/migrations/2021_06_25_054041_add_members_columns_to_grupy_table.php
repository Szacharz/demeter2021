<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMembersColumnsToGrupyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('grupy', function (Blueprint $table) {
	$table->string('member1')->nullable();
	$table->string('member2')->nullable();
	$table->string('member3')->nullable();
	$table->string('member4')->nullable();            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('grupy', function (Blueprint $table) {
            //
        });
    }
}

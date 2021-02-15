<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeStatusToNullableInUsterkiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('usterki', function (Blueprint $table) {
        $table->text('status')->nullable()->change();    //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('usterki', function (Blueprint $table) {
        $table->text('status')->nullable(false)->change();    //
        });
    }
}

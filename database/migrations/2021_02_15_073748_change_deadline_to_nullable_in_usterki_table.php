<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeDeadlineToNullableInUsterkiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('usterki', function (Blueprint $table) {
            $table->text('deadline')->nullable()->change();
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
        $table->text('deadline')->nullable(false)->change();    //
        });
    }
}

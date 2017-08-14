<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NamaDipanjanginJadi50 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('penerimas', function (Blueprint $table) {
            $table->string('nama_suami', 50)->change();
            $table->string('nama_istri', 50)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('penerimas', function (Blueprint $table) {
            //
        });
    }
}

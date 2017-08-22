<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddKapasitasOnAtm extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('atms', function (Blueprint $table) {
            $table->integer('kapasitas')->default(250);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('atms', function (Blueprint $table) {
            $table->dropColumn('kapasitas');
        });
    }
}

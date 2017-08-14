<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNullableOnAtm extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('atms', function (Blueprint $table) {
            $table->integer('saldo')->default(0)->change();
            $table->boolean('status_pintu')->default(0)->change();
            $table->boolean('status_beras')->default(0)->change();
            $table->date('last_refill')->nullable()->change();
            $table->date('last_maintenance')->nullable()->change();
            $table->string('refill_by', 30)->nullable()->change();
            $table->string('maintenance_by', 30)->nullable()->change();
            $table->string('nama_petugas', 30)->nullable()->change();
            $table->string('telpon_petugas', 30)->nullable()->change();
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
            //
        });
    }
}

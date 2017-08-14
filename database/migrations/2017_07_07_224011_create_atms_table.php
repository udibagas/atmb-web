<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kecamatan_id');
            $table->integer('kelurahan_id');
            $table->string('kode', 20);
            $table->string('ip_address', 15);
            $table->string('alamat');
            $table->integer('saldo');
            $table->boolean('status_pintu');
            $table->boolean('status_beras');
            $table->date('last_refill');
            $table->date('last_maintenance');
            $table->string('refill_by');
            $table->string('maintenance_by');
            $table->string('nama_petugas');
            $table->string('telpon_petugas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('atms');
    }
}

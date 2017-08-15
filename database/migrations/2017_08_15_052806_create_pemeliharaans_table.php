<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePemeliharaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemeliharaans', function (Blueprint $table) {
            $table->increments('id');
            $table->date('tanggal');
            $table->integer('kecamatan_id');
            $table->integer('kelurahan_id');
            $table->integer('atm_id');
            $table->string('nama_petugas', 30);
            $table->string('telpon_petugas', 20);
            $table->string('keterangan');
            $table->integer('user_id');
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
        Schema::dropIfExists('pemeliharaans');
    }
}

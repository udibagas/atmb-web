<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BenerinTablePenerima extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('penerimas');
        Schema::create('penerimas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_keluarga', 20);
            $table->integer('kecamatan_id');
            $table->integer('kelurahan_id');
            $table->string('nomor_kk', 30)->nullable();
            $table->string('nomor_pkh', 30)->nullable();
            $table->string('nama_istri', 30)->nullable();
            $table->string('tanggal_lahir_istri', 30)->nullable();
            $table->string('nik_istri', 30)->nullable();
            $table->string('nama_suami', 30)->nullable();
            $table->string('tanggal_lahir_suami', 30)->nullable();
            $table->string('nik_suami', 30)->nullable();
            $table->string('alamat')->nullable();
            $table->string('nama_anggota_keluarga')->nullable();
            $table->string('kepesertaan')->nullable();
            $table->string('pin', 128)->nullable();
            $table->string('card_id', 128)->nullable();
            $table->integer('saldo')->default(0);
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('penerimas');
        Schema::create('penerimas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama', 30);
            $table->boolean('jenis_kelamin');
            $table->date('tanggal_lahir');
            $table->string('nomor_ktp');
            $table->string('alamat');
            $table->string('pin');
            $table->string('card_id');
            $table->timestamps();
        });
    }
}

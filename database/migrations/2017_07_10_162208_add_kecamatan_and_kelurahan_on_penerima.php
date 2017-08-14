<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddKecamatanAndKelurahanOnPenerima extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('penerimas', function (Blueprint $table) {
            $table->integer('kelurahan_id');
            $table->integer('kecamatan_id');
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
            $table->dropColumn(['kelurahan_id', 'kecamatan_id']);
        });
    }
}

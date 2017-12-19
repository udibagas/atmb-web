<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNamaCamat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kecamatans', function (Blueprint $table) {
            $table->string('nama_camat', 30)->nullable();
            $table->string('no_hp_camat', 30)->nullable();
        });

        Schema::table('kelurahans', function (Blueprint $table) {
            $table->string('nama_lurah', 30)->nullable();
            $table->string('no_hp_lurah', 30)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kecamatans', function (Blueprint $table) {
            $table->dropColumn(['nama_camat', 'no_hp_camat']);
        });

        Schema::table('kelurahans', function (Blueprint $table) {
            $table->dropColumn(['nama_lurah', 'no_hp_lurah']);
        });
    }
}

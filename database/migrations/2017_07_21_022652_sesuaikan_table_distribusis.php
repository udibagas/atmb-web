<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SesuaikanTableDistribusis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('distribusis', function (Blueprint $table) {
            $table->renameColumn('tanggal_distribusi', 'tanggal');
            $table->integer('kelurahan_id');
            $table->integer('kecamatan_id');
            $table->integer('user_id');
            $table->string('nama_petugas', 30);
            $table->string('telpon_petugas', 20);
            $table->string('keterangan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('distribusis', function (Blueprint $table) {
            $table->renameColumn('tanggal', 'tanggal_distribusi');
            $table->dropColumn([
                'nama_petugas', 'telpon_petugas', 'user_id', 'keterangan',
                'kelurahan_id', 'kecamatan_id'
            ]);
        });
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    // kode:
    // 100 : isi ulang / distribusi (ambil data dari inputan web)
    // 101 : pengambilan (ambil data dari transaksi di ATM)
    // 102 : beras habis (ambil data dari baca sensor)
    // 103 : pintu terbuka (ambil data dari baca sensor)
    // 104 : maintenance/pemeliharaan (ambil data dari inputan web)

    protected $fillable = [
        'pesan', 'kecamatan_id', 'kelurahan_id',
        'atm_id', 'penerima_id', 'kode'
    ];

    public function kecamatan() {
        return $this->belongsTo(Kecamatan::class);
    }

    public function kelurahan() {
        return $this->belongsTo(Kelurahan::class);
    }

    public function atm() {
        return $this->belongsTo(Atm::class);
    }

    public function penerima() {
        return $this->belongsTo(Penerima::class);
    }
}

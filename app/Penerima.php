<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penerima extends Model
{
    protected $fillable = [
        'kode_keluarga', 'nomor_kk', 'nomor_pkh', 'kecamatan_id', 'kelurahan_id',
        'nama_istri', 'nama_suami', 'tanggal_lahir_istri', 'tanggal_lahir_suami',
        'nik_istri', 'nik_suami', 'alamat', 'nama_anggota_keluarga', 'kepesertaan',
        'pin', 'card_id', 'saldo'
    ];

    public function kelurahan() {
        return $this->belongsTo(Kelurahan::class);
    }

    public function kecamatan() {
        return $this->belongsTo(Kecamatan::class);
    }

    public function log() {
        return $this->hasMany(Log::class);
    }

}

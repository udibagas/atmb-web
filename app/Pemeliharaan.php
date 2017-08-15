<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemeliharaan extends Model
{
    protected $fillable = [
            'kecamatan_id', 'kelurahan_id',
            'atm_id', 'tanggal', 'nama_petugas',
            'telpon_petugas', 'keterangan', 'user_id'
        ];

    public function atm() {
        return $this->belongsTo(Atm::class);
    }

    public function kecamatan() {
        return $this->belongsTo(Kecamatan::class);
    }

    public function kelurahan() {
        return $this->belongsTo(Kelurahan::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}

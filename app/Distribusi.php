<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distribusi extends Model
{
    protected $fillable = [
        'atm_id', 'jumlah', 'tanggal', 'nama_petugas', 'telpon_petugas',
        'keterangan', 'user_id', 'kecamatan_id', 'kelurahan_id'
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

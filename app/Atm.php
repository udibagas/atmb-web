<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Atm extends Model
{
    protected $fillable = [
        'kecamatan_id', 'kelurahan_id', 'kode', 'ip_address', 'alamat', 'saldo',
        'status_pintu', 'status_beras', 'last_refill', 'last_maintenance',
        'refill_by', 'maintenance_by', 'nama_petugas', 'telpon_petugas', 'user_id'
    ];

    public function kecamatan() {
        return $this->belongsTo(Kecamatan::class);
    }

    public function kelurahan() {
        return $this->belongsTo(Kelurahan::class);
    }

    public function log() {
        return $this->hasMany(Log::class);
    }

    public function distribusi() {
        return $this->hasMany(Distribusi::class);
    }
}

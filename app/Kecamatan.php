<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $fillable = ['nama', 'kode', 'nama_camat', 'no_hp_camat'];

    public function kelurahan() {
        return $this->hasMany(Kelurahan::class);
    }

    public function atm() {
        return $this->hasMany(Atm::class);
    }

    public function penerima() {
        return $this->hasMany(Penerima::class);
    }

    public function log() {
        return $this->hasMany(Log::class);
    }

    public function distribusi() {
        return $this->hasMany(Distribusi::class);
    }
}

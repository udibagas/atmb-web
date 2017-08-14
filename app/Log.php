<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $fillable = ['pesan', 'kecamatan_id', 'kelurahan_id', 'atm_id', 'penerima_id'];

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

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donasi extends Model
{
    protected $fillable = ['donatur_id', 'jumlah', 'user_id', 'tanggal'];

    public function donatur() {
        return $this->belongsTo(Donatur::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}

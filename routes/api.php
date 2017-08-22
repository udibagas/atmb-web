<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

use App\Atm;
use App\Kelurahan;
use App\Kecamatan;
use App\Penerima;
use App\Log;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/penerima', function(Request $request) {
    $atms = Penerima::when($request->kecamatan_id, function($query) use ($request) {
            return $query->where('kecamatan_id', $request->kecamatan_id);
        })->when($request->kelurahan_id, function($query) use ($request) {
            return $query->where('kelurahan_id', $request->kelurahan_id);
        })->orderBy('penerimas.nama_suami', 'ASC')->get();

    return $atms;
});

Route::get('/atm', function(Request $request) {
    $atms = Atm::when($request->kecamatan_id, function($query) use ($request) {
            return $query->where('kecamatan_id', $request->kecamatan_id);
        })->when($request->kelurahan_id, function($query) use ($request) {
            return $query->where('kelurahan_id', $request->kelurahan_id);
        })->orderBy('atms.kode', 'ASC')->get();

    return $atms;
});

Route::get('/kelurahan', function(Request $request) {
    $kelurahans = Kelurahan::when($request->kecamatan_id, function($query) use ($request) {
            return $query->where('kecamatan_id', $request->kecamatan_id);
        })->orderBy('kelurahans.nama', 'ASC')->get();

    return $kelurahans;
});

Route::get('/kecamatan', function(Request $request) {
    $kecamatans = Kecamatan::orderBy('kecamatans.nama', 'ASC')->get();
    return $kecamatans;
});

Route::get('/log', function(Request $request) {
    $logs = Log::when($request->kecamatan_id, function($query) use ($request) {
            return $query->where('kecamatan_id', $request->kecamatan_id);
        })->when($request->kelurahan_id, function($query) use ($request) {
            return $query->where('kelurahan_id', $request->kelurahan_id);
        })->when($request->atm_id, function($query) use ($request) {
            return $query->where('atm_id', $request->atm_id);
        })->when($request->penerima_id, function($query) use ($request) {
            return $query->where('penerima_id', $request->penerima_id);
        })->when($request->kode, function($query) use ($request) {
            // 100 : isi ulang / distribusi (ambil data dari inputan web)
            // 101 : pengambilan (ambil data dari transaksi di ATM)
            // 102 : beras habis (ambil data dari baca sensor)
            // 103 : pintu terbuka (ambil data dari baca sensor)
            // 104 : maintenance/pemeliharaan (ambil data dari inputan web)
            return $query->where('kode', $request->kode);
        })->orderBy('logs.created_at', 'DESC')->get();

    return $logs;
});

Route::get('/atm/update', function(Request $request) {
    $atm = Atm::find($request->id);
    $atm->update($request->all());
    return $atm;
});

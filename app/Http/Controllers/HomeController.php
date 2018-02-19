<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kecamatan;
use App\Kelurahan;
use App\Atm;
use App\Penerima;
use App\Donatur;
use App\Donasi;
use App\Distribusi;
use App\Pemeliharaan;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home.index', [
            'kecamatan' => Kecamatan::count(),
            'kelurahan' => Kelurahan::count(),
            'atm' => Atm::count(),
            'penerima' => Penerima::count(),
            'donatur' => Donatur::count(),
            'donasi' => Donasi::count(),
            'atms' => Atm::join('kelurahans', 'kelurahans.id', '=', 'atms.kelurahan_id')
                        ->orderBy('kelurahans.nama', 'ASC')
                        ->get()
        ]);
    }
}

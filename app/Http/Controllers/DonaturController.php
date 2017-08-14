<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Donatur;
use App\Http\Requests\DonaturRequest;

class DonaturController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('donatur.index', [
            'donaturs' => Donatur::select('donaturs.*')
                        // ->join('kecamatans', 'kecamatans.id', '=', 'donaturs.kecamatan_id', 'LEFT')
                        // ->join('kelurahans', 'kelurahans.id', '=', 'donaturs.kelurahan_id', 'LEFT')
                        ->when($request->q, function($query) use ($request) {
                            return $query
                                ->where('donaturs.nama', 'LIKE', '%'.$request->q.'%')
                                ->orWhere('donaturs.instansi', 'LIKE', '%'.$request->q.'%')
                                ->orWhere('donaturs.alamat', 'LIKE', '%'.$request->q.'%')
                                ->orWhere('donaturs.telpon', 'LIKE', '%'.$request->q.'%')
                                ->orWhere('donaturs.jenis', 'LIKE', '%'.$request->q.'%');
                                // ->orWhere('kelurahans.nama', 'LIKE', '%'.$request->q.'%')
                                // ->orWhere('kecamatans.nama', 'LIKE', '%'.$request->q.'%');
                        })
                        ->orderBy('donaturs.nama', 'ASC')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('donatur.create', ['donatur' => new Donatur]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DonaturRequest $request)
    {
        Donatur::create($request->all());
        return redirect('/donatur');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Donatur $donatur)
    {
        return view('donatur.show', ['donatur' => $donatur]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Donatur $donatur)
    {
        return view('donatur.edit', ['donatur' => $donatur]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DonaturRequest $request, Donatur $donatur)
    {
        $donatur->update($request->all());
        return redirect('/donatur');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Donatur $donatur)
    {
        $donatur->delete();
        return redirect('/donatur');
    }
}

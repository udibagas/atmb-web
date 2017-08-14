<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Donasi;
use App\Http\Requests\DonasiRequest;

class DonasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pageSize = $request->pageSize ? $request->pageSize : 10;
        $donasi = Donasi::when($request->q, function($query) use ($request) {
                    return $query
                        ->join('donaturs', 'donaturs.id', '=', 'donasis.donatur_id')
                        ->where('donasis.tanggal', '=', $request->q)
                        ->orWhere('donaturs.nama', 'LIKE', '%'.$request->q.'%')
                        ->orWhere('donaturs.instansi', 'LIKE', '%'.$request->q.'%')
                        ->orWhere('donaturs.alamat', 'LIKE', '%'.$request->q.'%')
                        ->orWhere('donaturs.telpon', 'LIKE', '%'.$request->q.'%');
                });


        return view('donasi.index', [
            'total' => $donasi->selectRaw('SUM(jumlah) as total')->first()->total,
            'donasis' => $donasi->select('donasis.*')->orderBy('tanggal', 'DESC')->paginate($pageSize)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('donasi.create', [
            'donasi' => new Donasi(['tanggal' => date('Y-m-d')])
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DonasiRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = auth()->user()->id;
        Donasi::create($data);
        return redirect('/donasi');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Donasi $donasi)
    {
        return view('donasi.show', ['donasi' => $donasi]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Donasi $donasi)
    {
        return view('donasi.edit', ['donasi' => $donasi]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DonasiRequest $request, Donasi $donasi)
    {
        $donasi->update($request->all());
        return redirect('/donasi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Donasi $donasi)
    {
        $donasi->delete();
        return redirect('/donasi');
    }
}

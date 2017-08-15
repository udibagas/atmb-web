<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pemeliharaan;
use App\Http\Requests\PemeliharaanRequest;

class PemeliharaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pageSize = $request->pageSize ? $request->pageSize : 10;
        $pemeliharaan = Pemeliharaan::when($request->q, function($query) use ($request) {
                    return $query
                        ->join('kecamatans', 'kecamatans.id', '=', 'pemeliharaans.kecamatan_id')
                        ->join('kelurahans', 'kelurahans.id', '=', 'pemeliharaans.kelurahan_id')
                        ->join('atms', 'atms.id', '=', 'pemeliharaans.atm_id')
                        ->join('users', 'users.id', '=', 'pemeliharaans.user_id')
                        ->where('pemeliharaans.tanggal', '=', $request->q)
                        ->orWhere('pemeliharaans.nama_petugas', 'LIKE', '%'.$request->q.'%')
                        ->orWhere('pemeliharaans.telpon_petugas', 'LIKE', '%'.$request->q.'%')
                        ->orWhere('kecamatans.nama', 'LIKE', '%'.$request->q.'%')
                        ->orWhere('kelurahans.nama', 'LIKE', '%'.$request->q.'%')
                        ->orWhere('users.name', 'LIKE', '%'.$request->q.'%')
                        ->orWhere('atms.kode', 'LIKE', '%'.$request->q.'%');
                });


        return view('pemeliharaan.index', [
            'pemeliharaans' => $pemeliharaan->select('pemeliharaans.*')->orderBy('tanggal', 'DESC')->paginate($pageSize)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pemeliharaan.create', [
            'pemeliharaan' => new Pemeliharaan(['tanggal' => date('Y-m-d')])
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PemeliharaanRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = auth()->user()->id;
        Pemeliharaan::create($data);
        return redirect('/pemeliharaan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pemeliharaan $pemeliharaan)
    {
        return view('pemeliharaan.show', ['pemeliharaan' => $pemeliharaan]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pemeliharaan $pemeliharaan)
    {
        return view('pemeliharaan.edit', ['pemeliharaan' => $pemeliharaan]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PemeliharaanRequest $request, Pemeliharaan $pemeliharaan)
    {
        $pemeliharaan->update($request->all());
        return redirect('/pemeliharaan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pemeliharaan $pemeliharaan)
    {
        $pemeliharaan->delete();
        return redirect('/pemeliharaan');
    }
}

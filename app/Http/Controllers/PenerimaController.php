<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penerima;
use App\Http\Requests\PenerimaRequest;

class PenerimaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pageSize = $request->pageSize ? $request->pageSize : 10;
        $sort = $request->sort ? $request->sort : 'kode_keluarga';
        $order = $request->order ? $request->order : 'ASC';

        return view('penerima.index', [
            'penerimas' => Penerima::select('penerimas.*')
                        ->join('kecamatans', 'kecamatans.id', '=', 'penerimas.kecamatan_id')
                        ->join('kelurahans', 'kelurahans.id', '=', 'penerimas.kelurahan_id')
                        ->when($request->q, function($query) use ($request) {
                            return $query
                                ->where('kecamatans.nama', 'LIKE', '%'.$request->q.'%')
                                ->orWhere('kelurahans.nama', 'LIKE', '%'.$request->q.'%')
                                ->orWhere('penerimas.kode_keluarga', 'LIKE', '%'.$request->q.'%')
                                ->orWhere('penerimas.alamat', 'LIKE', '%'.$request->q.'%')
                                ->orWhere('penerimas.nomor_kk', 'LIKE', '%'.$request->q.'%')
                                ->orWhere('penerimas.nomor_pkh', 'LIKE', '%'.$request->q.'%')
                                ->orWhere('penerimas.nama_anggota_keluarga', 'LIKE', '%'.$request->q.'%')
                                ->orWhere('penerimas.nik_suami', 'LIKE', '%'.$request->q.'%')
                                ->orWhere('penerimas.nik_istri', 'LIKE', '%'.$request->q.'%')
                                ->orWhere('penerimas.nama_suami', 'LIKE', '%'.$request->q.'%')
                                ->orWhere('penerimas.nama_istri', 'LIKE', '%'.$request->q.'%');
                        })->orderBy($sort, $order)->paginate($pageSize)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('penerima.create', ['penerima' => new Penerima]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PenerimaRequest $request)
    {
        $penerima = Penerima::create($request->all());
        return redirect('/penerima');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Penerima $penerima)
    {
        return view('penerima.show', ['penerima' => $penerima]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Penerima $penerima)
    {
        return view('penerima.edit', ['penerima' => $penerima]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PenerimaRequest $request, Penerima $penerima)
    {
        $penerima->update($request->all());
        return redirect('/penerima');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penerima $penerima)
    {
        $penerima->delete();
        return redirect('/penerima');
    }
}

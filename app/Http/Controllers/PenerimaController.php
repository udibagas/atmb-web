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
        $pageSize = $request->rowCount > 0 ? $request->rowCount : 1000000;
        $request['page'] = $request->current;
        $sort = $request->sort ? key($request->sort) : 'penerimas.kode_keluarga';
        $dir = $request->sort ? $request->sort[$sort] : 'ASC';

        $penerimas = Penerima::selectRaw('
                        penerimas.*,
                        kecamatans.nama AS kecamatan,
                        kelurahans.nama AS kelurahan
                    ')
                    ->join('kecamatans', 'kecamatans.id', '=', 'penerimas.kecamatan_id')
                    ->join('kelurahans', 'kelurahans.id', '=', 'penerimas.kelurahan_id')
                    ->when($request->searchPhrase, function($query) use ($request) {
                        return $query
                            ->where('kecamatans.nama', 'LIKE', '%'.$request->searchPhrase.'%')
                            ->orWhere('kelurahans.nama', 'LIKE', '%'.$request->searchPhrase.'%')
                            ->orWhere('penerimas.kode_keluarga', 'LIKE', '%'.$request->searchPhrase.'%')
                            ->orWhere('penerimas.alamat', 'LIKE', '%'.$request->searchPhrase.'%')
                            ->orWhere('penerimas.nomor_kk', 'LIKE', '%'.$request->searchPhrase.'%')
                            ->orWhere('penerimas.nomor_pkh', 'LIKE', '%'.$request->searchPhrase.'%')
                            ->orWhere('penerimas.nama_anggota_keluarga', 'LIKE', '%'.$request->searchPhrase.'%')
                            ->orWhere('penerimas.nik_suami', 'LIKE', '%'.$request->searchPhrase.'%')
                            ->orWhere('penerimas.nik_istri', 'LIKE', '%'.$request->searchPhrase.'%')
                            ->orWhere('penerimas.nama_suami', 'LIKE', '%'.$request->searchPhrase.'%')
                            ->orWhere('penerimas.nama_istri', 'LIKE', '%'.$request->searchPhrase.'%');
                    })
                    ->when($request->kecamatan_id, function($query) use ($request) {
                        return $query->where('penerimas.kecamatan_id', $request->kecamatan_id);
                    })
                    ->when($request->kelurahan_id, function($query) use ($request) {
                        return $query->where('penerimas.kelurahan_id', $request->kelurahan_id);
                    })
                    ->orderBy($sort, $dir)->paginate($pageSize);

        if ($request->ajax()) {
            return [
                'rowCount' => $penerimas->perPage(),
                'total' => $penerimas->total(),
                'current' => $penerimas->currentPage(),
                'rows' => $penerimas->items(),
            ];
        }

        return view('penerima.index', ['penerimas' => $penerimas]);
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
        return ['success' => $penerima->delete()];
    }
}

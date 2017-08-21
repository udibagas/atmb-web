<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kecamatan;
use App\Http\Requests\KecamatanRequest;

class KecamatanController extends Controller
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
        $sort = $request->sort ? key($request->sort) : 'kecamatans.nama';
        $dir = $request->sort ? $request->sort[$sort] : 'ASC';

        $kecamatans = Kecamatan::selectRaw('
                        kecamatans.*,
                        (SELECT COUNT(id) FROM kelurahans WHERE kecamatan_id = kecamatans.id) AS jml_kelurahan,
                        (SELECT COUNT(id) FROM atms WHERE kecamatan_id = kecamatans.id) AS jml_atm,
                        (SELECT COUNT(id) FROM penerimas WHERE kecamatan_id = kecamatans.id) AS jml_penerima
                    ')
                    ->when($request->searchPhrase, function($query) use ($request) {
                        return $query->where('nama', 'LIKE', '%'.$request->searchPhrase.'%');
                    })->orderBy($sort, $dir)->paginate($pageSize);

        if ($request->ajax()) {
            return [
                'rowCount' => $kecamatans->perPage(),
                'total' => $kecamatans->total(),
                'current' => $kecamatans->currentPage(),
                'rows' => $kecamatans->items(),
            ];
        }

        return view('kecamatan.index', ['kecamatans' => $kecamatans]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kecamatan.create', ['kecamatan' => new Kecamatan]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KecamatanRequest $request)
    {
        Kecamatan::create($request->all());
        return redirect('/kecamatan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Kecamatan $kecamatan)
    {
        return view('kecamatan.show', ['kecamatan' => $kecamatan]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Kecamatan $kecamatan)
    {
        return view('kecamatan.edit', ['kecamatan' => $kecamatan]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(KecamatanRequest $request, Kecamatan $kecamatan)
    {
        $kecamatan->update($request->all());
        return redirect('/kecamatan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kecamatan $kecamatan)
    {
        return ['success' => $kecamatan->delete()];
    }
}

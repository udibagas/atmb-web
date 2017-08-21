<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kelurahan;
use App\Http\Requests\KelurahanRequest;

class KelurahanController extends Controller
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
        $sort = $request->sort ? key($request->sort) : 'kelurahans.nama';
        $dir = $request->sort ? $request->sort[$sort] : 'asc';

        $kelurahans = Kelurahan::selectRaw('
                        kelurahans.*,
                        kecamatans.nama AS kecamatan,
                        (SELECT COUNT(id) FROM atms WHERE kelurahan_id = kelurahans.id) AS jml_atm,
                        (SELECT COUNT(id) FROM penerimas WHERE kelurahan_id = kelurahans.id) AS jml_penerima
                    ')
                    ->join('kecamatans', 'kecamatans.id', '=', 'kelurahans.kecamatan_id', 'LEFT')
                    ->when($request->searchPhrase, function($query) use ($request) {
                        return $query
                            ->where('kelurahans.nama', 'LIKE', '%'.$request->searchPhrase.'%')
                            ->orWhere('kecamatans.nama', 'LIKE', '%'.$request->searchPhrase.'%');
                    })
                    ->orderBy($sort, $dir)->paginate($pageSize);

        if ($request->ajax()) {
            return [
                'rowCount' => $kelurahans->perPage(),
                'total' => $kelurahans->total(),
                'current' => $kelurahans->currentPage(),
                'rows' => $kelurahans->items(),
            ];
        }

        return view('kelurahan.index', ['kelurahans' => $kelurahans]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kelurahan.create', ['kelurahan' => new Kelurahan]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KelurahanRequest $request)
    {
        Kelurahan::create($request->all());
        return redirect('/kelurahan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Kelurahan $kelurahan)
    {
        return view('kelurahan.show', ['kelurahan' => $kelurahan]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Kelurahan $kelurahan)
    {
        return view('kelurahan.edit', ['kelurahan' => $kelurahan]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(KelurahanRequest $request, Kelurahan $kelurahan)
    {
        $kelurahan->update($request->all());
        return redirect('/kelurahan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kelurahan $kelurahan)
    {
        return ['success' => $kelurahan->delete()];
    }
}

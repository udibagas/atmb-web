<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Atm;
use App\Http\Requests\AtmRequest;

class AtmController extends Controller
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
        $sort = $request->sort ? key($request->sort) : 'atms.kode';
        $dir = $request->sort ? $request->sort[$sort] : 'asc';

        $atms = Atm::selectRaw('
                        atms.*,
                        kecamatans.nama AS kecamatan,
                        kelurahans.nama AS kelurahan
                    ')
                    ->join('kecamatans', 'kecamatans.id', '=', 'atms.kecamatan_id', 'LEFT')
                    ->join('kelurahans', 'kelurahans.id', '=', 'atms.kelurahan_id', 'LEFT')
                    ->when($request->searchPhrase, function($query) use ($request) {
                        return $query
                            ->where('atms.ip_address', 'LIKE', '%'.$request->searchPhrase.'%')
                            ->where('atms.kode', 'LIKE', '%'.$request->searchPhrase.'%')
                            ->orWhere('kelurahans.nama', 'LIKE', '%'.$request->searchPhrase.'%')
                            ->orWhere('kecamatans.nama', 'LIKE', '%'.$request->searchPhrase.'%');
                    })->when($request->kecamatan_id, function($query) use ($request) {
                        return $query->where('atms.kecamatan_id', $request->kecamatan_id);
                    })->when($request->kelurahan_id, function($query) use ($request) {
                        return $query->where('atms.kelurahan_id', $request->kelurahan_id);
                    })->orderBy($sort, $dir)->paginate($pageSize);

        if ($request->ajax()) {
            return [
                'rowCount' => $atms->perPage(),
                'total' => $atms->total(),
                'current' => $atms->currentPage(),
                'rows' => $atms->items(),
            ];
        }

        return view('atm.index', [ 'atms' => $atms]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('atm.create', ['atm' => new Atm]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AtmRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = auth()->user()->id;
        $atm = Atm::create($data);
        return redirect('/atm')->with('success', 'Data berhasi disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Atm $atm)
    {
        return view('atm.show', ['atm' => $atm]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Atm $atm)
    {
        return view('atm.edit', ['atm' => $atm]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AtmRequest $request, Atm $atm)
    {
        $atm->update($request->all());
        return redirect('/atm');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Atm $atm)
    {
        return ['success' => $atm->delete()];
    }
}

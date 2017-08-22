<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pemeliharaan;
use App\Atm;
use App\Log;
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
        $pageSize = $request->rowCount > 0 ? $request->rowCount : 1000000;
        $request['page'] = $request->current;
        $sort = $request->sort ? key($request->sort) : 'pemeliharaans.tanggal';
        $dir = $request->sort ? $request->sort[$sort] : 'DESC';

        $pemeliharaans = Pemeliharaan::selectRaw('
                    pemeliharaans.*,
                    kecamatans.nama AS kecamatan,
                    kelurahans.nama AS kelurahan,
                    atms.kode AS atm,
                    users.name AS user
                ')
                ->join('kecamatans', 'kecamatans.id', '=', 'pemeliharaans.kecamatan_id')
                ->join('kelurahans', 'kelurahans.id', '=', 'pemeliharaans.kelurahan_id')
                ->join('atms', 'atms.id', '=', 'pemeliharaans.atm_id')
                ->join('users', 'users.id', '=', 'pemeliharaans.user_id')
                ->when($request->searchPhrase, function($query) use ($request) {
                    return $query
                        ->where('pemeliharaans.tanggal', '=', $request->searchPhrase)
                        ->orWhere('pemeliharaans.nama_petugas', 'LIKE', '%'.$request->searchPhrase.'%')
                        ->orWhere('pemeliharaans.telpon_petugas', 'LIKE', '%'.$request->searchPhrase.'%')
                        ->orWhere('kecamatans.nama', 'LIKE', '%'.$request->searchPhrase.'%')
                        ->orWhere('kelurahans.nama', 'LIKE', '%'.$request->searchPhrase.'%')
                        ->orWhere('users.name', 'LIKE', '%'.$request->searchPhrase.'%')
                        ->orWhere('atms.kode', 'LIKE', '%'.$request->searchPhrase.'%');
                })->orderBy($sort, $dir)->paginate($pageSize);

        if ($request->ajax()) {
            return [
                'rowCount' => $pemeliharaans->perPage(),
                'total' => $pemeliharaans->total(),
                'current' => $pemeliharaans->currentPage(),
                'rows' => $pemeliharaans->items(),
            ];
        }

        return view('pemeliharaan.index', ['pemeliharaans' => $pemeliharaans]);
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
        $pemeliharaan = Pemeliharaan::create($data);

        //  update last_maintenance
        $atm = Atm::find($data['atm_id']);
        $atm->update([
            'last_maintenance' => $pemeliharaan->tanggal,
            'maintenance_by' => $pemeliharaan->nama_petugas
        ]);

        // input to log
        Log::create([
            'kecamatan_id' => $data['kecamatan_id'],
            'kelurahan_id' => $data['kelurahan_id'],
            'atm_id' => $data['atm_id'],
            'kode' => 104,
            'pesan' => 'Pemeliharaan ATM oleh '.$pemeliharaan->nama_petugas.' ('.$pemeliharaan->telpon_petugas.')'
        ]);

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
        return ['success' => $pemeliharaan->delete()];
    }
}

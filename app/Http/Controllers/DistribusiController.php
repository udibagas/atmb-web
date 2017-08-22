<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Distribusi;
use App\Atm;
use App\Log;
use App\Http\Requests\DistribusiRequest;

class DistribusiController extends Controller
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
        $sort = $request->sort ? key($request->sort) : 'distribusis.tanggal';
        $dir = $request->sort ? $request->sort[$sort] : 'DESC';

        $distribusis = Distribusi::selectRaw('
                    distribusis.*,
                    kecamatans.nama AS kecamatan,
                    kelurahans.nama AS kelurahan,
                    atms.kode AS atm,
                    users.name AS user
                ')
                ->join('kecamatans', 'kecamatans.id', '=', 'distribusis.kecamatan_id')
                ->join('kelurahans', 'kelurahans.id', '=', 'distribusis.kelurahan_id')
                ->join('atms', 'atms.id', '=', 'distribusis.atm_id')
                ->join('users', 'users.id', '=', 'distribusis.user_id')
                ->when($request->q, function($query) use ($request) {
                    return $query
                        ->where('distribusis.tanggal', '=', $request->q)
                        ->orWhere('distribusis.nama_petugas', 'LIKE', '%'.$request->q.'%')
                        ->orWhere('distribusis.telpon_petugas', 'LIKE', '%'.$request->q.'%')
                        ->orWhere('kecamatans.nama', 'LIKE', '%'.$request->q.'%')
                        ->orWhere('kelurahans.nama', 'LIKE', '%'.$request->q.'%')
                        ->orWhere('users.name', 'LIKE', '%'.$request->q.'%')
                        ->orWhere('atms.kode', 'LIKE', '%'.$request->q.'%');
                })->orderBy('tanggal', 'DESC')->paginate($pageSize);

        if ($request->ajax()) {
            return [
                'rowCount' => $distribusis->perPage(),
                'total' => $distribusis->total(),
                'current' => $distribusis->currentPage(),
                'rows' => $distribusis->items(),
            ];
        }

        return view('distribusi.index', ['distribusis' => $distribusis]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('distribusi.create', [
            'distribusi' => new Distribusi(['tanggal' => date('Y-m-d')])
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DistribusiRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = auth()->user()->id;
        $distribusi = Distribusi::create($data);

        //  update last_refill & saldo
        $atm = Atm::find($data['atm_id']);
        $atm->update([
            'last_refill' => $distribusi->tanggal,
            'refill_by' => $distribusi->nama_petugas,
            'saldo' => $atm->saldo + $distribusi->jumlah
        ]);

        // input to log
        Log::create([
            'kecamatan_id' => $data['kecamatan_id'],
            'kelurahan_id' => $data['kelurahan_id'],
            'atm_id' => $data['atm_id'],
            'kode' => 100,
            'pesan' => 'Isi ulang ATM sebanyak '.$distribusi->jumlah.' liter oleh '.$distribusi->nama_petugas.' ('.$distribusi->telpon_petugas.')'
        ]);

        return redirect('/distribusi');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Distribusi $distribusi)
    {
        return view('distribusi.show', ['distribusi' => $distribusi]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Distribusi $distribusi)
    {
        return view('distribusi.edit', ['distribusi' => $distribusi]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DistribusiRequest $request, Distribusi $distribusi)
    {
        $distribusi->update($request->all());
        return redirect('/distribusi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Distribusi $distribusi)
    {
        return ['success' => $distribusi->delete()];
    }
}

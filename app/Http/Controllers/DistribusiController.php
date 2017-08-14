<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Distribusi;
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
        $pageSize = $request->pageSize ? $request->pageSize : 10;
        $distribusi = Distribusi::when($request->q, function($query) use ($request) {
                    return $query
                        ->join('kecamatans', 'kecamatans.id', '=', 'distribusis.kecamatan_id')
                        ->join('kelurahans', 'kelurahans.id', '=', 'distribusis.kelurahan_id')
                        ->join('atms', 'atms.id', '=', 'distribusis.atm_id')
                        ->join('users', 'users.id', '=', 'distribusis.user_id')
                        ->where('distribusis.tanggal', '=', $request->q)
                        ->orWhere('distribusis.nama_petugas', 'LIKE', '%'.$request->q.'%')
                        ->orWhere('distribusis.telpon_petugas', 'LIKE', '%'.$request->q.'%')
                        ->orWhere('kecamatans.nama', 'LIKE', '%'.$request->q.'%')
                        ->orWhere('kelurahans.nama', 'LIKE', '%'.$request->q.'%')
                        ->orWhere('users.name', 'LIKE', '%'.$request->q.'%')
                        ->orWhere('atms.kode', 'LIKE', '%'.$request->q.'%');
                });


        return view('distribusi.index', [
            'total' => $distribusi->selectRaw('SUM(jumlah) as total')->first()->total,
            'distribusis' => $distribusi->select('distribusis.*')->orderBy('tanggal', 'DESC')->paginate($pageSize)
        ]);
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
        Distribusi::create($data);
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
        $distribusi->delete();
        return redirect('/distribusi');
    }
}

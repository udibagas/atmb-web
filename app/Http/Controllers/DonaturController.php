<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Donatur;
use App\Http\Requests\DonaturRequest;

class DonaturController extends Controller
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
        $sort = $request->sort ? key($request->sort) : 'donaturs.nama';
        $dir = $request->sort ? $request->sort[$sort] : 'asc';

        $donaturs = Donatur::selectRaw('donaturs.*')
                    // ->join('kecamatans', 'kecamatans.id', '=', 'donaturs.kecamatan_id', 'LEFT')
                    // ->join('kelurahans', 'kelurahans.id', '=', 'donaturs.kelurahan_id', 'LEFT')
                    ->when($request->searchPhrase, function($query) use ($request) {
                        return $query
                            ->where('donaturs.nama', 'LIKE', '%'.$request->searchPhrase.'%')
                            ->orWhere('donaturs.instansi', 'LIKE', '%'.$request->searchPhrase.'%')
                            ->orWhere('donaturs.alamat', 'LIKE', '%'.$request->searchPhrase.'%')
                            ->orWhere('donaturs.telpon', 'LIKE', '%'.$request->searchPhrase.'%')
                            ->orWhere('donaturs.jenis', 'LIKE', '%'.$request->searchPhrase.'%');
                            // ->orWhere('kelurahans.nama', 'LIKE', '%'.$request->searchPhrase.'%')
                            // ->orWhere('kecamatans.nama', 'LIKE', '%'.$request->searchPhrase.'%');
                    })
                    ->orderBy($sort, $dir)->paginate($pageSize);

        if ($request->ajax()) {
            return [
                'rowCount' => $donaturs->perPage(),
                'total' => $donaturs->total(),
                'current' => $donaturs->currentPage(),
                'rows' => $donaturs->items(),
            ];
        }

        return view('donatur.index', ['donaturs' => $donaturs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('donatur.create', ['donatur' => new Donatur]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DonaturRequest $request)
    {
        Donatur::create($request->all());
        return redirect('/donatur');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Donatur $donatur)
    {
        return view('donatur.show', ['donatur' => $donatur]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Donatur $donatur)
    {
        return view('donatur.edit', ['donatur' => $donatur]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DonaturRequest $request, Donatur $donatur)
    {
        $donatur->update($request->all());
        return redirect('/donatur');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Donatur $donatur)
    {
        return ['success' => $donatur->delete()];
    }
}

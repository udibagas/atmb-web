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
        $pageSize = $request->pageSize ? $request->pageSize : 10;
        $sort = $request->sort ? $request->sort : 'nama';
        $order = $request->order ? $request->order : 'ASC';

        return view('kecamatan.index', [
            'kecamatans' => Kecamatan::orderBy($sort, $order)
                        ->when($request->q, function($query) use ($request) {
                            return $query->where('nama', 'LIKE', '%'.$request->q.'%');
                        })->paginate($pageSize)
        ]);
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
        $kecamatan->delete();
        return redirect('/kecamatan');
    }
}

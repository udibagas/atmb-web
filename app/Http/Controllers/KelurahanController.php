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
        $pageSize = $request->pageSize ? $request->pageSize : 10;
        $sort = $request->sort ? $request->sort : 'kelurahans.nama';
        $order = $request->order ? $request->order : 'ASC';

        return view('kelurahan.index', [
            'kelurahans' => Kelurahan::select('kelurahans.*')
                        ->join('kecamatans', 'kecamatans.id', '=', 'kelurahans.kecamatan_id', 'LEFT')
                        ->when($request->q, function($query) use ($request) {
                            return $query
                                ->where('kelurahans.nama', 'LIKE', '%'.$request->q.'%')
                                ->orWhere('kecamatans.nama', 'LIKE', '%'.$request->q.'%');
                        })
                        ->orderBy($sort, $order)->paginate($pageSize)
        ]);
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
        $kelurahan->delete();
        return redirect('/kelurahan');
    }
}

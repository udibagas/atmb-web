<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Donasi;
use App\Http\Requests\DonasiRequest;

class DonasiController extends Controller
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
        $sort = $request->sort ? key($request->sort) : 'donasis.tanggal';
        $dir = $request->sort ? $request->sort[$sort] : 'DESC';

        $donasis = Donasi::selectRaw('
                    donasis.*,
                    donaturs.nama AS donatur
                ')
                ->join('donaturs', 'donaturs.id', '=', 'donasis.donatur_id')
                ->when($request->searchPhrase, function($query) use ($request) {
                    return $query
                        ->where('donasis.tanggal', '=', $request->searchPhrase)
                        ->orWhere('donaturs.nama', 'LIKE', '%'.$request->searchPhrase.'%')
                        ->orWhere('donaturs.instansi', 'LIKE', '%'.$request->searchPhrase.'%')
                        ->orWhere('donaturs.alamat', 'LIKE', '%'.$request->searchPhrase.'%')
                        ->orWhere('donaturs.telpon', 'LIKE', '%'.$request->searchPhrase.'%');
                })->orderBy($sort, $dir)->paginate($pageSize);

        if ($request->ajax()) {
            return [
                'rowCount' => $donasis->perPage(),
                'total' => $donasis->total(),
                'current' => $donasis->currentPage(),
                'rows' => $donasis->items(),
            ];
        }

        return view('donasi.index', ['donasis' => $donasis]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('donasi.create', [
            'donasi' => new Donasi(['tanggal' => date('Y-m-d')])
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DonasiRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = auth()->user()->id;
        Donasi::create($data);
        return redirect('/donasi');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Donasi $donasi)
    {
        return view('donasi.show', ['donasi' => $donasi]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Donasi $donasi)
    {
        return view('donasi.edit', ['donasi' => $donasi]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DonasiRequest $request, Donasi $donasi)
    {
        $donasi->update($request->all());
        return redirect('/donasi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Donasi $donasi)
    {
        return ['success' => $donasi->delete()];
    }
}

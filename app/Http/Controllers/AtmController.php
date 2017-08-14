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
        return view('atm.index', [
            'atms' => Atm::select('atms.*')
                        ->join('kecamatans', 'kecamatans.id', '=', 'atms.kecamatan_id', 'LEFT')
                        ->join('kelurahans', 'kelurahans.id', '=', 'atms.kelurahan_id', 'LEFT')
                        ->when($request->q, function($query) use ($request) {
                            return $query
                                ->where('atms.ip_address', 'LIKE', '%'.$request->q.'%')
                                ->orWhere('kelurahans.nama', 'LIKE', '%'.$request->q.'%')
                                ->orWhere('kecamatans.nama', 'LIKE', '%'.$request->q.'%');
                        })
                        ->orderBy('atms.kecamatan_id', 'ASC')->paginate(10)
        ]);
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
        $atm->delete();
        return redirect('/atm');
    }
}

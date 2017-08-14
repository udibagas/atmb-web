<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Log;
use App\Http\Requests\LogRequest;

class LogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pageSize = $request->pageSize ? $request->pageSize : 10;

        return view('log.index', [
            'logs' => Log::select('logs.*')
                        ->when($request->q, function($query) use ($request) {
                            return $query
                                ->join('kecamatans', 'kecamatans.id', '=', 'logs.kecamatan_id', 'LEFT')
                                ->join('kelurahans', 'kelurahans.id', '=', 'logs.kelurahan_id', 'LEFT')
                                ->join('atms', 'atms.id', '=', 'logs.atm_id', 'LEFT')
                                ->join('penerimas', 'penerimas.id', '=', 'logs.penerima_id', 'LEFT')
                                ->where('pesan', 'LIKE', '%'.$request->q.'%')
                                ->orWhere('kecamatans.nama', 'LIKE', '%'.$request->q.'%')
                                ->orWhere('kelurahans.nama', 'LIKE', '%'.$request->q.'%')
                                ->orWhere('atms.kode', 'LIKE', '%'.$request->q.'%')
                                ->orWhere('penerimas.nama_suami', 'LIKE', '%'.$request->q.'%')
                                ->orWhere('penerimas.nama_istri', 'LIKE', '%'.$request->q.'%');
                        })->orderBy('logs.created_at', 'DESC')->paginate($pageSize)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Log $log)
    {
        $log->delete();
        return redirect('/log');
    }
}

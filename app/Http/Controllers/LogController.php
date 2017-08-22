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
        $pageSize = $request->rowCount > 0 ? $request->rowCount : 1000000;
        $request['page'] = $request->current;
        $sort = $request->sort ? key($request->sort) : 'logs.created_at';
        $dir = $request->sort ? $request->sort[$sort] : 'DESC';

        $logs = Log::selectRaw('
                    logs.*,
                    kecamatans.nama AS kecamatan,
                    kelurahans.nama AS kelurahan,
                    atms.kode AS atm,
                    penerimas.nama_suami AS nama_suami,
                    penerimas.nama_istri AS nama_istri
            ')
            ->join('kecamatans', 'kecamatans.id', '=', 'logs.kecamatan_id', 'LEFT')
            ->join('kelurahans', 'kelurahans.id', '=', 'logs.kelurahan_id', 'LEFT')
            ->join('atms', 'atms.id', '=', 'logs.atm_id', 'LEFT')
            ->join('penerimas', 'penerimas.id', '=', 'logs.penerima_id', 'LEFT')
            ->when($request->q, function($query) use ($request) {
                return $query
                    ->where('pesan', 'LIKE', '%'.$request->q.'%')
                    ->orWhere('kecamatans.nama', 'LIKE', '%'.$request->q.'%')
                    ->orWhere('kelurahans.nama', 'LIKE', '%'.$request->q.'%')
                    ->orWhere('atms.kode', 'LIKE', '%'.$request->q.'%')
                    ->orWhere('penerimas.nama_suami', 'LIKE', '%'.$request->q.'%')
                    ->orWhere('penerimas.nama_istri', 'LIKE', '%'.$request->q.'%');
            })
            ->when($request->kecamatan_id, function($query) use ($request) {
                return $query->where('logs.kecamatan_id', $request->kecamatan_id);
            })
            ->when($request->kelurahan_id, function($query) use ($request) {
                return $query->where('logs.kelurahan_id', $request->kelurahan_id);
            })
            ->when($request->atm_id, function($query) use ($request) {
                return $query->where('logs.atm_id', $request->kelurahan_id);
            })
            ->when($request->penerima_id, function($query) use ($request) {
                return $query->where('logs.penerima_id', $request->penerima_id);
            })
            ->orderBy($sort, $dir)->paginate($pageSize);

        if ($request->ajax()) {
            return [
                'rowCount' => $logs->perPage(),
                'total' => $logs->total(),
                'current' => $logs->currentPage(),
                'rows' => $logs->items(),
            ];
        }

        return view('log.index', ['logs' => $logs]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Log $log)
    {
        return ['success' => $log->delete()];
    }
}

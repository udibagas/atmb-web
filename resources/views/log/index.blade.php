@extends('layouts.app')

@section('content')

<div class="x_panel">
    <div class="x_title">
        <h2>LOG</h2>
        <div class="clearfix"></div>
    </div>

    <div class="x_content">
        <div class="pull-right">
            <form method="get" class="form-inline">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Cari..." value="{{ request('q') }}">
                    <span class="input-group-btn">
                        {!! Form::select('pageSize', [10 => 10, 25 => 25, 50 => 50, 100 => 100, 200 => 200, 500 => 500, 1000 => 1000], request('pageSize'), ['class' => 'form-control']) !!}
                        <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                        <a href="/log" class="btn btn-default"><i class="fa fa-refresh"></i></a>
                    </span>
                </div>
            </form>
        </div>
        <a href="/log/clear" class="btn btn-danger">HAPUS SEMUA LOG</a>
        <hr>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Waktu</th>
                    <th>Kecamatan</th>
                    <th>Kelurahan</th>
                    <th>ATM</th>
                    <th>Penerima</th>
                    <th>Pesan</th>
                    <th class="text-right">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($logs as $k)
                <tr>
                    <td>{{ $loop->index + $logs->firstItem() }}</td>
                    <td>{{ $k->created_at }}</td>
                    <td>
                        @if ($k->kecamatan)
                        <a href="/kecamatan/{{ $k->kecamatan_id }}">{{ $k->kecamatan->nama }}</a>
                        @endif
                    </td>
                    <td>
                        @if ($k->kelurahan)
                        <a href="/kelurahan/{{ $k->kelurahan_id }}">{{ $k->kelurahan->nama }}</a>
                        @endif
                    </td>
                    <td>
                        @if ($k->atm)
                        <a href="/atm/{{ $k->atm_id }}">{{ $k->atm->kode }}</a>
                        @endif
                    </td>
                    <td>
                        @if ($k->penerima)
                        <a href="/penerima/{{ $k->penerima_id }}">
                            {{ $k->penerima->nama_suami }}<br>
                            {{ $k->penerima->nama_istri }}
                        </a>
                        @endif
                    </td>
                    <td>{{ $k->pesan }}</td>
                    <td class="text-right">
                        <a href="#" class="btn btn-sm btn-default" onclick="event.preventDefault(); if(confirm('Anda yakin?')) {document.getElementById('delete-log-{{$k->id}}').submit()}"><i class="fa fa-trash"></i></a>

                        {!! Form::open(['method' => 'DELETE', 'url' => '/log/'.$k->id, 'style' => 'display:none;', 'id' => 'delete-log-'.$k->id]) !!}
    					    {!! Form::hidden('redirect', url()->full()) !!}
    					{!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <hr>
        {!! $logs->appends(request()->all())->links() !!}
    </div>
</div>


@endsection

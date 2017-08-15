@extends('layouts.app')

@section('content')

<div class="x_panel">
    <div class="x_title">
        <h2>PEMELIHARAAN</h2>
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
                        <a href="{{url('pemeliharaan')}}" class="btn btn-default"><i class="fa fa-refresh"></i></a>
                    </span>
                </div>
            </form>
        </div>
        <a href="{{url('pemeliharaan/create')}}" class="btn btn-success"><i class="fa fa-plus"></i> INPUT PEMELIHARAAN</a>
        <hr>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tanggal</th>
                    <th>Kecamatan</th>
                    <th>Kelurahan</th>
                    <th>ATM</th>
                    <th>Nama Petugas</th>
                    <th>Telpon Petugas</th>
                    <th>Keterangan</th>
                    <th>Diinput Oleh</th>
                    <th>Waktu Input</th>
                    <th>Waktu Update</th>
                    <th class="text-right">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pemeliharaans as $k)
                <tr>
                    <td>{{ $loop->index + $pemeliharaans->firstItem() }}</td>
                    <td>{{ $k->tanggal }}</td>
                    <td><a href="{{url('kecamatan/'.$k->kecamatan_id)}}">{{ $k->kecamatan->nama }}</a></td>
                    <td><a href="{{url('kelurahan/'.$k->kelurahan_id)}}">{{ $k->kelurahan->nama }}</a></td>
                    <td><a href="{{url('atm/'.$k->atm_id)}}">{{ $k->atm->kode }}</a></td>
                    <td>{{ $k->nama_petugas }}</td>
                    <td>{{ $k->telpon_petugas }}</td>
                    <td>{{ $k->keterangan }}</td>
                    <td>{{ $k->user->name }}</td>
                    <td>{{ $k->created_at }}</td>
                    <td>{{ $k->updated_at }}</td>
                    <td class="text-right">
                        <div class="btn-group">
                            <a href="{{url('pemeliharaan/'.$k->id.'/edit')}}" class="btn btn-sm btn-default"><i class="fa fa-edit"></i></a>
                            <a href="#" class="btn btn-sm btn-default" onclick="event.preventDefault(); if(confirm('Anda yakin?')) {document.getElementById('delete-pemeliharaan-{{$k->id}}').submit()}"><i class="fa fa-trash"></i></a>
                        </div>

                        {!! Form::open(['method' => 'DELETE', 'url' => url('/pemeliharaan/'.$k->id), 'style' => 'display:none;', 'id' => 'delete-pemeliharaan-'.$k->id]) !!}
    					    {!! Form::hidden('redirect', url()->full()) !!}
    					{!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <hr>
        {!! $pemeliharaans->appends(request()->all())->links() !!}
    </div>
</div>


@endsection

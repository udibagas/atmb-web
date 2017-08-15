@extends('layouts.app')

@section('content')

<div class="x_panel">
    <div class="x_title">
        <h2>KECAMATAN <small>Daftar kecamatan seluruh Kabupaten Purwakarta</small></h2>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <div class="pull-right">
            <form method="get" class="form-inline">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Cari..." value="{{ request('q') }}">
                    <span class="input-group-btn">
                        {!! Form::select('sort', ['nama' => 'Nama', 'kode' => 'Kode'], request('sort'), ['class' => 'form-control']) !!}
                        {!! Form::select('order', ['ASC' => 'A-Z', 'DESC' => 'Z-A'], request('order'), ['class' => 'form-control']) !!}
                        {!! Form::select('pageSize', [10 => 10, 25 => 25, 50 => 50, 100 => 100, 200 => 200, 500 => 500, 1000 => 1000], request('pageSize'), ['class' => 'form-control']) !!}
                        <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                        <a href="{{url('kelurahan')}}" class="btn btn-default"><i class="fa fa-refresh"></i></a>
                    </span>
                </div>
            </form>
        </div>
        <a href="{{url('kecamatan/create')}}" class="btn btn-success"><i class="fa fa-plus"></i> TAMBAH KECAMATAN</a>
        <hr>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Kode</th>
                    <th>Jumlah Kelurahan/Desa</th>
                    <th>Jumlah ATM</th>
                    <th>Jumlah Penerima</th>
                    <th class="text-right">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($kecamatans as $k)
                <tr>
                    <td>{{ $loop->index + $kecamatans->firstItem() }}</td>
                    <td><a href="{{url('kecamatan/'.$k->id)}}">{{ $k->nama }}</a></td>
                    <td>{{ $k->kode }}</td>
                    <td><a href="{{url('kelurahan?q='.$k->nama)}}">{{ $k->kelurahan->count() }}</a></td>
                    <td><a href="{{url('atm?q='.$k->nama)}}">{{ $k->atm->count() }}</a></td>
                    <td><a href="{{url('penerima?q='.$k->nama)}}">{{ number_format($k->penerima->count()) }}</a></td>
                    <td class="text-right">
                        <div class="btn-group">
                            <a href="{{url('kecamatan/'.$k->id.'/edit')}}" class="btn btn-sm btn-default"><i class="fa fa-edit"></i></a>
                            <a href="#" class="btn btn-sm btn-default" onclick="event.preventDefault(); if(confirm('Anda yakin?')) {document.getElementById('delete-kecamatan-{{$k->id}}').submit()}"><i class="fa fa-trash"></i></a>
                        </div>

                        {!! Form::open(['method' => 'DELETE', 'url' => url('/kecamatan/'.$k->id), 'style' => 'display:none;', 'id' => 'delete-kecamatan-'.$k->id]) !!}
    					    {!! Form::hidden('redirect', url()->full()) !!}
    					{!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <hr>
        {!! $kecamatans->appends(['q' => request('q')])->links() !!}
    </div>
</div>
@endsection

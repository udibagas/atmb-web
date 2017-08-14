@extends('layouts.app')

@section('content')

<div class="x_panel">
    <div class="x_title">
        <h2>PENERIMA <small>Daftar penerima seluruh Kabupaten Purwakarta</small></h2>
        <div class="clearfix"></div>
    </div>

    <div class="x_content">
        <div class="pull-right">
            <form method="get" class="form-inline">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Cari..." value="{{ request('q') }}">
                    <span class="input-group-btn">
                        <!-- {!! Form::select('sort', ['penerimas.kode_keluarga' => 'Kode Keluarga'], request('sort'), ['class' => 'form-control']) !!} -->
                        <!-- {!! Form::select('order', ['ASC' => 'A-Z', 'DESC' => 'Z-A'], request('order'), ['class' => 'form-control']) !!} -->
                        {!! Form::select('pageSize', [10 => 10, 25 => 25, 50 => 50, 100 => 100, 200 => 200, 500 => 500, 1000 => 1000], request('pageSize'), ['class' => 'form-control']) !!}
                        <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                        <a href="/penerima" class="btn btn-default" title="Refresh"><i class="fa fa-refresh"></i></a>
                        <a href="#" class="btn btn-default" title="Download Excel"><i class="fa fa-file-excel-o"></i></a>
                    </span>
                </div>
            </form>
        </div>
        <a href="/penerima/create" class="btn btn-success"><i class="fa fa-plus"></i> TAMBAH PENERIMA</a>
        <hr>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Kode Keluarga</th>
                    <th>Kelurahan<br>Kecamatan</th>
                    <th>Nomor KK/PKH</th>
                    <th style="width:200px;">Nama Istri/Suami</th>
                    <th>Tgl Lahir Istri/Suami</th>
                    <th>NIK Istri/Suami</th>
                    <th>Alamat</th>
                    <th style="width:200px;">Nama Anggota Keluarga</th>
                    <th>Kepesertaan</th>
                    <th>Saldo (Liter)</th>
                    <th class="text-right" style="width:90px;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($penerimas as $k)
                <tr>
                    <td>{{ number_format($loop->index + $penerimas->firstItem()) }}</td>
                    <td><a href="/penerima/{{ $k->id }}">{{ strtoupper($k->kode_keluarga) }}</a></td>
                    <td>
                        <a href="/kelurahan/{{ $k->id }}">{{ $k->kelurahan->nama }}</a><br>
                        <a href="/kecamatan/{{ $k->id }}">{{ $k->kecamatan->nama }}</a>
                    </td>
                    <td>{{ $k->nomor_kk }}<br>{{ $k->nomor_pkh }}</td>
                    <td>{{ $k->nama_istri }}<br>{{ $k->nama_suami }}</td>
                    <td>{{ $k->tanggal_lahir_istri }}<br>{{ $k->tanggal_lahir_suami }}</td>
                    <td>{{ $k->nik_istri }}<br>{{ $k->nik_suami }}</td>
                    <td>{{ $k->alamat }}</td>
                    <td>{{ $k->nama_anggota_keluarga }}</td>
                    <td>{{ $k->kepesertaan }}</td>
                    <td>{{ $k->saldo }}</td>
                    <td class="text-right">
                        <div class="btn-group">
                            <a href="/penerima/{{$k->id}}/edit" class="btn btn-sm btn-default"><i class="fa fa-edit"></i></a>
                            <a href="#" class="btn btn-sm btn-default" onclick="event.preventDefault(); if(confirm('Anda yakin?')) {document.getElementById('delete-penerima-{{$k->id}}').submit()}"><i class="fa fa-trash"></i></a>
                        </div>

                        {!! Form::open(['method' => 'DELETE', 'url' => '/penerima/'.$k->id, 'style' => 'display:none;', 'id' => 'delete-penerima-'.$k->id]) !!}
    					    {!! Form::hidden('redirect', url()->full()) !!}
    					{!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <hr>
        {!! $penerimas->appends(request()->all())->links() !!}
    </div>
</div>


@endsection

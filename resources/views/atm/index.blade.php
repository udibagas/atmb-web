@extends('layouts.app')

@section('content')

<div class="x_panel">
    <div class="x_title">
        <h2>ATM BERAS <small>Daftar ATM Beras seluruh Kabupaten Purwakarta</small></h2>
        <div class="clearfix"></div>
    </div>

    <div class="x_content">
        <form method="get" class="form-inline pull-right">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Cari..." value="{{ request('q') }}">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="submit">Cari</button>
                    <a href="/atm" class="btn btn-default"><i class="fa fa-refresh"></i></a>
                </span>
            </div>
        </form>
        <a href="/atm/create" class="btn btn-success"><i class="fa fa-plus"></i> TAMBAH ATM BERAS</a>
        <hr>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Kode</th>
                    <th>IP Address</th>
                    <th>Kecamatan</th>
                    <th>Kelurahan</th>
                    <th>Alamat</th>
                    <th>Petugas</th>
                    <th>Saldo (Liter)</th>
                    <th>Terakhir Isi Ulang</th>
                    <th>Terakhir Maintenance</th>
                    <th>Status Beras</th>
                    <th>Status Pintu</th>
                    <th class="text-right">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($atms as $k)
                <tr>
                    <td>{{ $loop->index + $atms->firstItem() }}</td>
                    <td><a href="/atm/{{ $k->id }}">{{ $k->kode }}</a></td>
                    <td>{{ $k->ip_address }}</td>
                    <td><a href="/kecamatan/{{ $k->kecamatan_id }}">{{ $k->kecamatan->nama }}</a></td>
                    <td><a href="/kelurahan/{{ $k->kelurahan_id }}">{{ $k->kelurahan->nama }}</a></td>
                    <td>{{ $k->alamat }}</td>
                    <td>{{ $k->nama_petugas }}<br>{{ $k->telpon_petugas }}</td>
                    <td>{{ $k->saldo }}</td>
                    <td>{{ $k->last_refill }}<br>{{ $k->refill_by }}</td>
                    <td>{{ $k->last_maintenance }}<br>{{ $k->maintenance_by }}</td>
                    <td>
                        {!! $k->status_beras ? '<span class="label label-success">ISI</span>' : '<span class="label label-danger">HABIS</span>' !!}
                    </td>
                    <td>
                        {!! $k->status_pintu ? '<span class="label label-success">TERTUTUP</span>' : '<span class="label label-danger">TERBUKA</span>' !!}
                    </td>
                    <td class="text-right">
                        <div class="btn-group">
                            <a href="/atm/{{$k->id}}/edit" class="btn btn-sm btn-default"><i class="fa fa-edit"></i></a>
                            <a href="#" class="btn btn-sm btn-default" onclick="event.preventDefault(); if(confirm('Anda yakin?')) {document.getElementById('delete-atm-{{$k->id}}').submit()}"><i class="fa fa-trash"></i></a>
                        </div>

                        {!! Form::open(['method' => 'DELETE', 'url' => '/atm/'.$k->id, 'style' => 'display:none;', 'id' => 'delete-atm-'.$k->id]) !!}
    					    {!! Form::hidden('redirect', url()->full()) !!}
    					{!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <hr>
        {!! $atms->appends(['q' => request('q')])->links() !!}
    </div>
</div>


@endsection

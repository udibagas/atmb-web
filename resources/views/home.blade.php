@extends('layouts.app')

@section('content')
<!-- top tiles -->
<div class="row tile_count">
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top">Total Kecamatan</span>
        <div class="count">{{ $kecamatan }}</div>
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top">Total Kelurahan</span>
        <div class="count">{{ $kelurahan }}</div>
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top">Total ATM</span>
        <div class="count">{{ $atm }}</div>
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top">Total Penerima</span>
        <div class="count">{{ number_format($penerima) }}</div>
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top">Total Donatur</span>
        <div class="count">{{ $donatur }}</div>
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top">Total Donasi</span>
        <div class="count">{{ $donasi }}</div>
    </div>
</div>
<!-- /top tiles -->

<div class="row">
    <div class="col-md-6">
        <div class="x_panel">
            <div class="x_title">
                <h2>DONASI <small>Daftar donasi terakhir</small></h2>
                <div class="clearfix"></div>
            </div>

            <div class="x_content">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Nama Donatur</th>
                            <th>Instansi</th>
                            <th>Alamat</th>
                            <th>Telpon</th>
                            <th>Jumlah (Liter)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($donasis as $k)
                        <tr>
                            <td>{{ $k->tanggal }}</td>
                            <td><a href="{{url('donatur/'.$k->donatur_id)}}">{{ $k->donatur->nama }}</a></td>
                            <td>{{ $k->donatur->instansi }}</td>
                            <td>{{ $k->donatur->alamat }}</td>
                            <td>{{ $k->donatur->telpon }}</td>
                            <td>{{ number_format($k->jumlah) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="x_panel">
            <div class="x_title">
                <h2>DISTRIBUSI <small>Daftar distribusi terakhir</small></h2>
                <div class="clearfix"></div>
            </div>

            <div class="x_content">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Kecamatan</th>
                            <th>Kelurahan</th>
                            <th>ATM</th>
                            <th>Jumlah (Liter)</th>
                            <th>Nama Petugas</th>
                            <th>Telpon Petugas</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($distribusis as $k)
                        <tr>
                            <td>{{ $k->tanggal }}</td>
                            <td><a href="{{url('kecamatan/'.$k->kecamatan_id)}}">{{ $k->kecamatan->nama }}</a></td>
                            <td><a href="{{url('kelurahan/'.$k->kelurahan_id)}}">{{ $k->kelurahan->nama }}</a></td>
                            <td><a href="{{url('atm/'.$k->atm_id)}}">{{ $k->atm->kode }}</a></td>
                            <td>{{ number_format($k->jumlah) }}</td>
                            <td>{{ $k->nama_petugas }}</td>
                            <td>{{ $k->telpon_petugas }}</td>
                            <td>{{ $k->keterangan }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

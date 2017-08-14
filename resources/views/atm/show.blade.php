@extends('layouts.app')

@section('content')

<div class="x_panel">
    <div class="x_title">
        <h2>DETAIL ATM</h2>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td style="width:150px;">Kode</td>
                    <td>{{ $atm->kode }}</td>
                </tr>
                <tr>
                    <td>IP Address</td>
                    <td>{{ $atm->ip_address }}</td>
                </tr>
                <tr>
                    <td>Kecamatan</td>
                    <td>{{ $atm->kecamatan->nama }}</td>
                </tr>
                <tr>
                    <td>Kelurahan</td>
                    <td>{{ $atm->kelurahan->nama }}</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>{{ $atm->alamat }}</td>
                </tr>
                <tr>
                    <td>Petugas</td>
                    <td>{{ $atm->nama_petugas }} ({{ $atm->telpon_petugas }})</td>
                </tr>
                <tr>
                    <td>Saldo</td>
                    <td>{{ $atm->saldo }}</td>
                </tr>
                <tr>
                    <td>Terakhir Isi Ulang</td>
                    <td>{{ $atm->last_refill }}</td>
                </tr>
                <tr>
                    <td>Terakhir Maintenance</td>
                    <td>{{ $atm->last_maintenance }}</td>
                </tr>
                <tr>
                    <td>Status Pintu</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Status Beras</td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        @include('atm._distribusi')
    </div>
    <div class="col-md-6">
        @include('atm._log')
    </div>
</div>

@endsection

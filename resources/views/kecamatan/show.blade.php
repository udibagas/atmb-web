@extends('layouts.app')

@section('content')

<div class="x_panel">
    <div class="x_title">
        <h2>DETAIL KECAMATAN</h2>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td style="width:150px;">Kode</td>
                    <td>{{ $kecamatan->kode }}</td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>{{ $kecamatan->nama }}</td>
                </tr>
                <tr>
                    <td>Jumlah Kelurahan</td>
                    <td>{{ $kecamatan->kelurahan->count() }}</td>
                </tr>
                <tr>
                    <td>Jumlah ATM</td>
                    <td>{{ $kecamatan->atm->count() }}</td>
                </tr>
                <tr>
                    <td>Jumlah Penerima</td>
                    <td>{{ number_format($kecamatan->penerima->count()) }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        @include('kecamatan._kelurahan')
    </div>
    <div class="col-md-8">
        @include('kecamatan._atm')
    </div>
</div>

@include('kecamatan._penerima')

<div class="row">
    <div class="col-md-6">
        @include('kecamatan._distribusi')
    </div>
    <div class="col-md-6">
        @include('kecamatan._log')
    </div>
</div>



@endsection

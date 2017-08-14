@extends('layouts.app')

@section('content')

<div class="x_panel">
    <div class="x_title">
        <h2>DETAIL KELURAHAN</h2>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td style="width:150px;">Kode</td>
                    <td>{{ $kelurahan->kode }}</td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>{{ $kelurahan->nama }}</td>
                </tr>
                <tr>
                    <td>Kecamatan</td>
                    <td>{{ $kelurahan->kecamatan->nama }}</td>
                </tr>
                <tr>
                    <td>Jumlah ATM</td>
                    <td>{{ $kelurahan->atm->count() }}</td>
                </tr>
                <tr>
                    <td>Jumlah Penerima</td>
                    <td>{{ number_format($kelurahan->penerima->count()) }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@include('kelurahan._atm')

<div class="row">
    <div class="col-md-6">
        @include('kelurahan._distribusi')
    </div>
    <div class="col-md-6">
        @include('kelurahan._log')
    </div>
</div>

@include('kelurahan._penerima')

@endsection

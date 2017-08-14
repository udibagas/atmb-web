@extends('layouts.app')

@section('content')

<div class="x_panel">
    <div class="x_title">
        <h2>DETAIL PENERIMA</h2>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td style="width:150px;">Nama Suami</td>
                    <td>{{ $penerima->nama_suami }}</td>
                    <td style="width:150px;">Kecamatan</td>
                    <td>{{ $penerima->kecamatan->nama }}</td>
                    <td style="width:150px;">Kode Keluarga</td>
                    <td>{{ $penerima->kode_keluarga }}</td>

                </tr>
                <tr>
                    <td>Nama Istri</td>
                    <td>{{ $penerima->nama_istri }}</td>
                    <td>Kelurahan</td>
                    <td>{{ $penerima->kelurahan->nama }}</td>
                    <td>Nomor KK</td>
                    <td>{{ $penerima->nomor_kk }}</td>

                </tr>
                <tr
                    <td>Nama Anggota Keluarga</td>
                    <td>{{ $penerima->nama_anggota_keluarga }}</td>

                    <td>Alamat</td>
                    <td>{{ $penerima->alamat }}</td>
                    <td>Nomor PKH</td>
                    <td>{{ $penerima->nomor_pkh }}</td>
                </tr>
                <tr>
                    <td>Kepesertaan</td>
                    <td>{{ $penerima->kepesertaan }}</td>
                    <td>NIK Istri</td>
                    <td>{{ $penerima->nik_istri }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@include('penerima._log')

@endsection

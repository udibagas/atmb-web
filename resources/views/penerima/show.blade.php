@extends('layouts.app')

@section('content')

<div class="x_panel">
    <div class="x_title">
        <h2>DETAIL PENERIMA</h2>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <div class="" role="tabpanel" data-example-id="togglable-tabs">
            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                <li role="presentation" class="active">
                    <a href="#tab_content1" id="detail-tab" role="tab" data-toggle="tab" aria-expanded="true">
                        DETAIL PENERIMA
                    </a>
                </li>
                <li role="presentation" class="">
                    <a href="#tab_content7" role="tab" id="log-tab" data-toggle="tab" aria-expanded="false">
                        LOG
                    </a>
                </li>
            </ul>

            <div id="myTabContent" class="tab-content">
                <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="detail-tab">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td style="width:150px;">Nama Suami</td>
                                <td>{{ $penerima->nama_suami }}</td>
                            </tr>
                            <tr>
                                <td>Nama Istri</td>
                                <td>{{ $penerima->nama_istri }}</td>
                            </tr>
                            <tr>
                                <td>Tanggal Lahir Suami</td>
                                <td>{{ $penerima->tanggal_lahir_suami }}</td>
                            </tr>
                            <tr>
                                <td>Tanggal Lahir Istri</td>
                                <td>{{ $penerima->tanggal_lahir_istri }}</td>
                            </tr>
                            <tr>
                                <td>Nama Anggota Keluarga</td>
                                <td>{{ $penerima->nama_anggota_keluarga }}</td>
                            </tr>
                            <tr>
                                <td>Kecamatan</td>
                                <td>{{ $penerima->kecamatan->nama }}</td>
                            </tr>
                            <tr>
                                <td>Kelurahan</td>
                                <td>{{ $penerima->kelurahan->nama }}</td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>{{ $penerima->alamat }}</td>
                            </tr>
                            <tr>
                                <td>Kode Keluarga</td>
                                <td>{{ $penerima->kode_keluarga }}</td>
                            </tr>
                            <tr>
                                <td>Nomor KK</td>
                                <td>{{ $penerima->nomor_kk }}</td>
                            </tr>
                            <tr>
                                <td>Nomor PKH</td>
                                <td>{{ $penerima->nomor_pkh }}</td>
                            </tr>
                            <tr>
                                <td>NIK Istri</td>
                                <td>{{ $penerima->nik_istri }}</td>
                            </tr>
                            <tr>
                                <td>NIK Suami</td>
                                <td>{{ $penerima->nik_suami }}</td>
                            </tr>
                            <tr>
                                <td>Kepesertaan</td>
                                <td>{{ $penerima->kepesertaan }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="tab_content7" aria-labelledby="log-tab">
                    @include('penerima._log')
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

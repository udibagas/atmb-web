@extends('layouts.app')

@section('content')

<div class="x_panel">
    <div class="x_title">
        <h2>DETAIL ATM</h2>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <div class="" role="tabpanel" data-example-id="togglable-tabs">
            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                <li role="presentation" class="active">
                    <a href="#tab_content1" id="detail-tab" role="tab" data-toggle="tab" aria-expanded="true">
                        DETAIL ATM
                    </a>
                </li>
                <li role="presentation" class="">
                    <a href="#tab_content5" role="tab" id="distribusi-tab" data-toggle="tab" aria-expanded="false">
                        DISTRIBUSI
                    </a>
                </li>
                <li role="presentation" class="">
                    <a href="#tab_content6" role="tab" id="pemeliharaan-tab" data-toggle="tab" aria-expanded="false">
                        PEMELIHARAAN
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
                                <td>Kapasitas</td>
                                <td>{{ $atm->kapasitas }} Liter</td>
                            </tr>
                            <tr>
                                <td>Saldo</td>
                                <td>{{ $atm->saldo }} Liter</td>
                            </tr>
                            <tr>
                                <td>Terakhir Isi Ulang</td>
                                <td>{{ $atm->last_refill }} oleh {{ $atm->refill_by }}</td>
                            </tr>
                            <tr>
                                <td>Terakhir Maintenance</td>
                                <td>{{ $atm->last_maintenance }} oleh {{ $atm->maintenance_by }}</td>
                            </tr>
                            <tr>
                                <td>Status Pintu</td>
                                <td>{{ $atm->status_pintu }}</td>
                            </tr>
                            <tr>
                                <td>Status Beras</td>
                                <td>{{ $atm->status_beras}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="tab_content5" aria-labelledby="distribusi-tab">
                    @include('atm._distribusi')
                </div>
                <div role="tabpanel" class="tab-pane fade" id="tab_content6" aria-labelledby="pemeliharaan-tab">
                    @include('atm._pemeliharaan')
                </div>
                <div role="tabpanel" class="tab-pane fade" id="tab_content7" aria-labelledby="log-tab">
                    @include('atm._log')
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

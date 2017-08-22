@extends('layouts.app')

@section('content')

<div class="x_panel">
    <div class="x_title">
        <h2>DETAIL KECAMATAN</h2>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">

        <div class="" role="tabpanel" data-example-id="togglable-tabs">
            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                <li role="presentation" class="active">
                    <a href="#tab_content1" id="detail-tab" role="tab" data-toggle="tab" aria-expanded="true">
                        DETAIL KECAMATAN
                    </a>
                </li>
                <li role="presentation" class="">
                    <a href="#tab_content2" role="tab" id="kelurahan-tab" data-toggle="tab" aria-expanded="false">
                        KELURAHAN/DESA
                    </a>
                </li>
                <li role="presentation" class="">
                    <a href="#tab_content3" role="tab" id="atm-tab" data-toggle="tab" aria-expanded="false">
                        ATM
                    </a>
                </li>
                <li role="presentation" class="">
                    <a href="#tab_content4" role="tab" id="penerima-tab" data-toggle="tab" aria-expanded="false">
                        PENERIMA
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
                <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="kelurahan-tab">
                    @include('kecamatan._kelurahan')
                </div>
                <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="atm-tab">
                    @include('kecamatan._atm')
                </div>
                <div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="penerima-tab">
                    @include('kecamatan._penerima')
                </div>
                <div role="tabpanel" class="tab-pane fade" id="tab_content5" aria-labelledby="distribusi-tab">
                    @include('kecamatan._distribusi')
                </div>
                <div role="tabpanel" class="tab-pane fade" id="tab_content6" aria-labelledby="pemeliharaan-tab">
                    @include('kecamatan._pemeliharaan')
                </div>
                <div role="tabpanel" class="tab-pane fade" id="tab_content7" aria-labelledby="log-tab">
                    @include('kecamatan._log')
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

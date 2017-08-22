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

<div class="x_panel">
    <div class="x_content">
        <div class="" role="tabpanel" data-example-id="togglable-tabs">
            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                <li role="presentation" class="active">
                    <a href="#tab_content1" id="kecamatan-tab" role="tab" data-toggle="tab" aria-expanded="true">
                        KECAMATAN
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
                    <a href="#tab_content41" role="tab" id="donatur-tab" data-toggle="tab" aria-expanded="false">
                        DONATUR
                    </a>
                </li>
                <li role="presentation" class="">
                    <a href="#tab_content51" role="tab" id="donasi-tab" data-toggle="tab" aria-expanded="false">
                        DONASI
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
                <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="kecamatan-tab">
                    @include('home._kecamatan')
                </div>
                <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="kelurahan-tab">
                    @include('home._kelurahan')
                </div>
                <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="atm-tab">
                    @include('home._atm')
                </div>
                <div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="penerima-tab">
                    @include('home._penerima')
                </div>
                <div role="tabpanel" class="tab-pane fade" id="tab_content41" aria-labelledby="donatur-tab">
                    @include('home._donatur')
                </div>
                <div role="tabpanel" class="tab-pane fade" id="tab_content51" aria-labelledby="donasi-tab">
                    @include('home._donasi')
                </div>
                <div role="tabpanel" class="tab-pane fade" id="tab_content5" aria-labelledby="distribusi-tab">
                    @include('home._distribusi')
                </div>
                <div role="tabpanel" class="tab-pane fade" id="tab_content6" aria-labelledby="pemeliharaan-tab">
                    @include('home._pemeliharaan')
                </div>
                <div role="tabpanel" class="tab-pane fade" id="tab_content7" aria-labelledby="log-tab">
                    @include('home._log')
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

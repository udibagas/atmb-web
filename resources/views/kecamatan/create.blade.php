@extends('layouts.app')

@section('content')

<div class="x_panel">
    <div class="x_title">
        <h2>Tambah Kecamatan</h2>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        @include('kecamatan._form', ['method' => 'POST', 'url' => '/kecamatan'])
    </div>
</div>

@endsection

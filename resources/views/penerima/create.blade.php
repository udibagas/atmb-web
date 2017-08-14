@extends('layouts.app')

@section('content')

<div class="x_panel">
    <div class="x_title">
        <h2>Tambah Penerima</h2>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        @include('penerima._form', ['method' => 'POST', 'url' => '/penerima'])
    </div>
</div>

@endsection

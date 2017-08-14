@extends('layouts.app')

@section('content')

<div class="x_panel">
    <div class="x_title">
        <h2>Tambah Kelurahan/Desa</h2>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        @include('kelurahan._form', ['method' => 'POST', 'url' => '/kelurahan'])
    </div>
</div>

@endsection

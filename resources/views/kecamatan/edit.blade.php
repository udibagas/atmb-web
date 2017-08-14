@extends('layouts.app')

@section('content')

<div class="x_panel">
    <div class="x_title">
        <h2>Edit Kecamatan</h2>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        @include('kecamatan._form', ['method' => 'PUT', 'url' => '/kecamatan/'.$kecamatan->id])
    </div>
</div>

@endsection

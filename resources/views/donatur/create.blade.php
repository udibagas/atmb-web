@extends('layouts.app')

@section('content')

<div class="x_panel">
    <div class="x_title">
        <h2>Tambah Donatur</h2>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        @include('donatur._form', ['method' => 'POST', 'url' => '/donatur'])
    </div>
</div>

@endsection

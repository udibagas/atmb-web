@extends('layouts.app')

@section('content')

<div class="x_panel">
    <div class="x_title">
        <h2>Tambah ATM</h2>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        @include('atm._form', ['method' => 'POST', 'url' => '/atm'])
    </div>
</div>

@endsection

@extends('layouts.app')

@section('content')

<div class="x_panel">
    <div class="x_title">
        <h2>Edit ATM</h2>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        @include('atm._form', ['method' => 'PUT', 'url' => '/atm/'.$atm->id])
    </div>
</div>

@endsection

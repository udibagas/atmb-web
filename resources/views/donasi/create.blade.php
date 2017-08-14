@extends('layouts.app')

@section('content')

<div class="x_panel">
    <div class="x_title">
        <h2>Input Donasi</h2>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        @include('donasi._form', ['method' => 'POST', 'url' => '/donasi'])
    </div>
</div>

@endsection

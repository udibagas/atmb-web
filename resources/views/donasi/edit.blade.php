@extends('layouts.app')

@section('content')

<div class="x_panel">
    <div class="x_title">
        <h2>Edit Donasi</h2>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        @include('donasi._form', ['method' => 'PUT', 'url' => '/donasi/'.$donasi->id])
    </div>
</div>

@endsection

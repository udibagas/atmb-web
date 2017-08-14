@extends('layouts.app')

@section('content')

<div class="x_panel">
    <div class="x_title">
        <h2>Edit Donatur</h2>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        @include('donatur._form', ['method' => 'PUT', 'url' => '/donatur/'.$donatur->id])
    </div>
</div>

@endsection

@extends('layouts.app')

@section('content')

<div class="x_panel">
    <div class="x_title">
        <h2>Edit Pemeliharaan</h2>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        @include('pemeliharaan._form', ['method' => 'PUT', 'url' => url('/pemeliharaan/'.$pemeliharaan->id)])
    </div>
</div>

@endsection

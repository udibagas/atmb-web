@extends('layouts.app')

@section('content')

<div class="x_panel">
    <div class="x_title">
        <h2>Edit Kelurahan/Desa</h2>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        @include('kelurahan._form', ['method' => 'PUT', 'url' => url('kelurahan/'.$kelurahan->id)])
    </div>
</div>

@endsection

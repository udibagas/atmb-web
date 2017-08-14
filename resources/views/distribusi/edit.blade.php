@extends('layouts.app')

@section('content')

<div class="x_panel">
    <div class="x_title">
        <h2>Edit Distribusi</h2>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        @include('distribusi._form', ['method' => 'PUT', 'url' => '/distribusi/'.$distribusi->id])
    </div>
</div>

@endsection

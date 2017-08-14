@extends('layouts.app')

@section('content')

<div class="x_panel">
    <div class="x_title">
        <h2>Input Distribusi</h2>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        @include('distribusi._form', ['method' => 'POST', 'url' => '/distribusi'])
    </div>
</div>

@endsection

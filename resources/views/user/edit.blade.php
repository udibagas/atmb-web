@extends('layouts.app')

@section('content')

<div class="x_panel">
    <div class="x_title">
        <h2>Edit User</h2>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        @include('user._form', ['method' => 'PUT', 'url' => url('user/'.$user->id)])
    </div>
</div>

@endsection

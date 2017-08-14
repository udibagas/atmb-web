@extends('layouts.app')

@section('content')

<div class="x_panel">
    <div class="x_title">
        <h2>DONASI</h2>
        <div class="clearfix"></div>
    </div>

    <div class="x_content">
        <div class="pull-right">
            <form method="get" class="form-inline">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Cari..." value="{{ request('q') }}">
                    <span class="input-group-btn">
                        {!! Form::select('pageSize', [10 => 10, 25 => 25, 50 => 50, 100 => 100, 200 => 200, 500 => 500, 1000 => 1000], request('pageSize'), ['class' => 'form-control']) !!}
                        <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                        <a href="/donasi" class="btn btn-default"><i class="fa fa-refresh"></i></a>
                    </span>
                </div>
            </form>
        </div>
        <a href="/donasi/create" class="btn btn-success"><i class="fa fa-plus"></i> INPUT DONASI</a>
        <hr>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tanggal</th>
                    <th>Nama Donatur</th>
                    <th>Instansi</th>
                    <th>Alamat</th>
                    <th>Telpon</th>
                    <th>Jumlah (Liter)</th>
                    <th>Diinput Oleh</th>
                    <th>Waktu Input</th>
                    <th>Waktu Update</th>
                    <th class="text-right">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($donasis as $k)
                <tr>
                    <td>{{ $loop->index + $donasis->firstItem() }}</td>
                    <td>{{ $k->tanggal }}</td>
                    <td><a href="/donatur/{{ $k->donatur_id }}">{{ $k->donatur->nama }}</a></td>
                    <td>{{ $k->donatur->instansi }}</td>
                    <td>{{ $k->donatur->alamat }}</td>
                    <td>{{ $k->donatur->telpon }}</td>
                    <td>{{ number_format($k->jumlah) }}</td>
                    <td>{{ $k->user->name }}</td>
                    <td>{{ $k->created_at }}</td>
                    <td>{{ $k->updated_at }}</td>
                    <td class="text-right">
                        <div class="btn-group">
                            <a href="/donasi/{{$k->id}}/edit" class="btn btn-sm btn-default"><i class="fa fa-edit"></i></a>
                            <a href="#" class="btn btn-sm btn-default" onclick="event.preventDefault(); if(confirm('Anda yakin?')) {document.getElementById('delete-donasi-{{$k->id}}').submit()}"><i class="fa fa-trash"></i></a>
                        </div>

                        {!! Form::open(['method' => 'DELETE', 'url' => '/donasi/'.$k->id, 'style' => 'display:none;', 'id' => 'delete-donasi-'.$k->id]) !!}
    					    {!! Form::hidden('redirect', url()->full()) !!}
    					{!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="row">
            <div class="col-md-2 col-md-push-10">
                <div class="alert alert-danger text-center">
                    <h2>TOTAL : {{ $total }} LITER</h2>
                </div>
            </div>
        </div>

        <hr>
        {!! $donasis->appends(request()->all())->links() !!}
    </div>
</div>


@endsection

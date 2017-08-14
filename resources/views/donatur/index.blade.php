@extends('layouts.app')

@section('content')

<div class="x_panel">
    <div class="x_title">
        <h2>DONATUR <small>Daftar donatur seluruh Kabupaten Purwakarta</small></h2>
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
                        <a href="/donatur" class="btn btn-default" title="Refresh"><i class="fa fa-refresh"></i></a>
                        <a href="#" class="btn btn-default" title="Download Excel"><i class="fa fa-file-excel-o"></i></a>
                    </span>
                </div>
            </form>
        </div>
        <a href="/donatur/create" class="btn btn-success"><i class="fa fa-plus"></i> TAMBAH DONATUR</a>
        <hr>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Instansi</th>
                    <th>Alamat</th>
                    <th>Telpon</th>
                    <th>Jenis</th>
                    <th class="text-right">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($donaturs as $k)
                <tr>
                    <td>{{ number_format($loop->index + $donaturs->firstItem()) }}</td>
                    <td><a href="/donatur/{{ $k->id }}">{{ $k->nama }}</a></td>
                    <td>{{ $k->instansi }}</td>
                    <td>{{ $k->alamat }}</td>
                    <td>{{ $k->telpon }}</td>
                    <td>{{ $k->jenis }}</td>
                    <td class="text-right">
                        <div class="btn-group">
                            <a href="/donatur/{{$k->id}}/edit" class="btn btn-sm btn-default"><i class="fa fa-edit"></i></a>
                            <a href="#" class="btn btn-sm btn-default" onclick="event.preventDefault(); if(confirm('Anda yakin?')) {document.getElementById('delete-donatur-{{$k->id}}').submit()}"><i class="fa fa-trash"></i></a>
                        </div>

                        {!! Form::open(['method' => 'DELETE', 'url' => '/donatur/'.$k->id, 'style' => 'display:none;', 'id' => 'delete-donatur-'.$k->id]) !!}
    					    {!! Form::hidden('redirect', url()->full()) !!}
    					{!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <hr>
        {!! $donaturs->appends(request()->all())->links() !!}
    </div>
</div>


@endsection

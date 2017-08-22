@extends('layouts.app')

@section('content')

<div class="x_panel">
    <div class="x_content">
        <h2>DISTRIBUSI <small>Distribusi beras ke ATM</small></h2>
        <table class="table table-striped table-hover" id="bootgrid">
            <thead>
                <tr>
                    <th data-column-id="id" data-identifier="true" data-type="numeric">ID</th>
                    <th data-column-id="tanggal">Tanggal</th>
                    <th data-column-id="kecamatan" data-formatter="kecamatan">Kecamatan</th>
                    <th data-column-id="kelurahan" data-formatter="kelurahan">Kelurahan</th>
                    <th data-column-id="atm">ATM</th>
                    <th data-column-id="jumlah">Jumlah (Liter)</th>
                    <th data-column-id="nama_petugas">Nama Petugas</th>
                    <th data-column-id="telpon_petugas">Telpon Petugas</th>
                    <th data-column-id="keterangan">Keterangan</th>
                    <th data-column-id="user">Diinput Oleh</th>
                    <th data-column-id="created_at">Waktu Input</th>
                    <th data-column-id="updated_at">Waktu Update</th>
                    <th data-column-id="commands"
                        data-formatter="commands"
                        data-sortable="false"
                        data-align="right"
                        data-header-align="right">Action</th>
                </tr>
            </thead>
        </table>

        <!-- <div class="row">
            <div class="col-md-2 col-md-push-10">
                <div class="alert alert-danger text-center">
                    <h2>TOTAL : 0 LITER</h2>
                </div>
            </div>
        </div> -->

    </div>
</div>

@endsection

@push('scripts')

<script type="text/javascript">

    var btn = '<a href="{{url('distribusi/create')}}" class="btn btn-default"><i class="fa fa-plus"></i> INPUT DISTRIBUSI</a>';

    var grid = $('#bootgrid').bootgrid({
        ajax: true, url: '{{url("distribusi")}}',
        ajaxSettings: {method: 'GET', cache: false},
        searchSettings: { delay: 100, characters: 3 },
        templates: {
            header: "<div id=\"@{{ctx.id}}\" class=\"@{{css.header}}\"><div class=\"row\"><div class=\"col-sm-12 actionBar\"><p style=\"display:inline-block;margin-right:20px;\">"+btn+"</p><p class=\"@{{css.search}}\"></p><p class=\"@{{css.actions}}\"></p></div></div></div>"
        },
        formatters: {
            "commands": function(column, row) {
                return "<a class=\"btn btn-xs btn-default\" href=\"{{url('distribusi')}}/" + row.id + "/edit\"><i class=\"fa fa-edit\"></i></a> " +
                    "<button class=\"btn btn-xs btn-default c-delete\" data-id=\"" + row.id + "\"><i class=\"fa fa-trash\"></i></button>";
            },
            "atm": function(column, row) {
                return '<a href="{{url('/atm/')}}/'+row.atm_id+'">'+row.atm+'</a>';
            },
            "kecamatan": function(column, row) {
                return '<a href="{{url('/kecamatan/')}}/'+row.kecamatan_id+'">'+row.kecamatan+'</a>';
            },
            "kelurahan": function(column, row) {
                return '<a href="{{url('/kelurahan/')}}/'+row.kelurahan_id+'">'+row.kelurahan+'</a>';
            },
        }
    }).on("loaded.rs.jquery.bootgrid", function() {
        grid.find(".c-delete").on("click", function(e) {
            deleteData($(this).data("id"));
        });
    });

    var deleteData = function(id) {
        if (confirm('Anda yakin akan menghapus data ini?')) {
            $.ajax({
                type: 'POST',
                data: {'_method' : 'DELETE'},
                url: "{{url('distribusi')}}/" + id,
                success: function(r) {
                    console.log(r);
                    $('#bootgrid').bootgrid('reload');
                }
            });
        }
    };

</script>

@endpush

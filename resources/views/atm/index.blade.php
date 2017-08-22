@extends('layouts.app')

@section('content')

<div class="x_panel">
    <div class="x_content">
        <h2>ATM BERAS <small>Daftar ATM Beras seluruh Kabupaten Purwakarta</small></h2>
        <table class="table table-striped table-hover" id="bootgrid">
            <thead>
                <tr>
                    <th data-column-id="id" data-identifier="true" data-type="numeric">ID</th>
                    <th data-column-id="kode" data-formatter="kode">Kode</th>
                    <th data-column-id="ip_address">IP Address</th>
                    <th data-column-id="kecamatan" data-formatter="kecamatan">Kecamatan</th>
                    <th data-column-id="kelurahan" data-formatter="kelurahan">Kelurahan</th>
                    <th data-column-id="alamat">Alamat</th>
                    <th data-column-id="nama_petugas">Petugas</th>
                    <th data-column-id="saldo">Saldo (Liter)</th>
                    <th data-column-id="kapasitas">Kapasitas (Liter)</th>
                    <th data-column-id="last_refill">Terakhir Isi Ulang</th>
                    <th data-column-id="last_maintenance">Terakhir Maintenance</th>
                    <th data-column-id="status_beras">Status Beras</th>
                    <th data-column-id="status_pintu">Status Pintu</th>
                    <th data-column-id="commands"
                        data-formatter="commands"
                        data-sortable="false"
                        data-align="right"
                        data-header-align="right">Action</th>
                </tr>
            </thead>
        </table>
    </div>
</div>


@endsection

@push('scripts')

<script type="text/javascript">

    var btn = '<a href="{{url('atm/create')}}" class="btn btn-default"><i class="fa fa-plus"></i> TAMBAH ATM</a>';

    var grid = $('#bootgrid').bootgrid({
        ajax: true, url: '{{url("atm")}}',
        ajaxSettings: {method: 'GET', cache: false},
        searchSettings: { delay: 100, characters: 3 },
        templates: {
            header: "<div id=\"@{{ctx.id}}\" class=\"@{{css.header}}\"><div class=\"row\"><div class=\"col-sm-12 actionBar\"><p style=\"display:inline-block;margin-right:20px;\">"+btn+"</p><p class=\"@{{css.search}}\"></p><p class=\"@{{css.actions}}\"></p></div></div></div>"
        },
        formatters: {
            "commands": function(column, row) {
                return "<a class=\"btn btn-xs btn-default\" href=\"{{url('atm')}}/" + row.id + "/edit\"><i class=\"fa fa-edit\"></i></a> " +
                    "<button class=\"btn btn-xs btn-default c-delete\" data-id=\"" + row.id + "\"><i class=\"fa fa-trash\"></i></button>";
            },
            "kode": function(column, row) {
                return '<a href="{{url('/atm/')}}/'+row.id+'">'+row.kode+'</a>';
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
                url: "{{url('atm')}}/" + id,
                success: function(r) {
                    console.log(r);
                    $('#bootgrid').bootgrid('reload');
                }
            });
        }
    };

</script>

@endpush

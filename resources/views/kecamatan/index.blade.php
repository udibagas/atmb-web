@extends('layouts.app')

@section('content')

<div class="x_panel">
    <div class="x_content">
        <h2>KECAMATAN <small>Daftar kecamatan seluruh Kabupaten Purwakarta</small></h2>
        <table class="table table-striped table-hover" id="bootgrid">
            <thead>
                <tr>
                    <th data-column-id="id" data-identifier="true" data-type="numeric">ID</th>
                    <th data-column-id="nama" data-formatter="nama">Nama</th>
                    <th data-column-id="kode">Kode</th>
                    <th data-column-id="jml_kelurahan" data-sortable="false">Jumlah Kelurahan/Desa</th>
                    <th data-column-id="jml_atm" data-sortable="false">Jumlah ATM</th>
                    <th data-column-id="jml_penerima" data-sortable="false">Jumlah Penerima</th>
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

    var btn = '<a href="{{url('kecamatan/create')}}" class="btn btn-default"><i class="fa fa-plus"></i> TAMBAH KECAMATAN</a>';

    var grid = $('#bootgrid').bootgrid({
        ajax: true, url: '{{url('kecamatan')}}',
        ajaxSettings: {method: 'GET', cache: false},
        searchSettings: { delay: 100, characters: 3 },
        templates: {
            header: "<div id=\"@{{ctx.id}}\" class=\"@{{css.header}}\"><div class=\"row\"><div class=\"col-sm-12 actionBar\"><p style=\"display:inline-block;margin-right:20px;\">"+btn+"</p><p class=\"@{{css.search}}\"></p><p class=\"@{{css.actions}}\"></p></div></div></div>"
        },
        formatters: {
            "commands": function(column, row) {
                return "<a class=\"btn btn-xs btn-default\" href=\"{{url('kecamatan')}}/" + row.id + "/edit\"><i class=\"fa fa-edit\"></i></a> " +
                    "<button class=\"btn btn-xs btn-default c-delete\" data-id=\"" + row.id + "\"><i class=\"fa fa-trash\"></i></button>";
            },
            "nama": function(column, row) {
                return '<a href="{{url('/kecamatan/')}}/'+row.id+'">'+row.nama+'</a>';
            }

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
                url: '{{url("kecamatan")}}/' + id,
                success: function(r) {
                    console.log(r);
                    $('#bootgrid').bootgrid('reload');
                }
            });
        }
    };

</script>

@endpush

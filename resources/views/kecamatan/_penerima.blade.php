<div class="x_panel">
    <div class="x_content">
        <h2>PENERIMA <small>Daftar penerima kecamatan {{$kecamatan->nama}}</small></h2>
        <table class="table table-striped table-hover" id="bootgrid">
            <thead>
                <tr>
                    <th data-column-id="id" data-identifier="true" data-type="numeric">ID</th>
                    <th data-column-id="kode_keluarga" data-formatter="kode_keluarga">Kode Keluarga</th>
                    <th data-column-id="kelurahan">Kelurahan</th>
                    <th data-column-id="nomor_kk">No. KK</th>
                    <th data-column-id="nomor_pkh">No. PKH</th>
                    <th data-column-id="nama_suami">Suami</th>
                    <th data-column-id="nama_istri">Istri</th>
                    <th data-column-id="tanggal_lahir_suami">Tgl Lahir Suami</th>
                    <th data-column-id="tanggal_lahir_istri">Tgl Lahir Istri</th>
                    <th data-column-id="nik_suami">NIK Suami</th>
                    <th data-column-id="nik_istri">NIK Istri</th>
                    <th data-column-id="alamat">Alamat</th>
                    <th data-column-id="nama_anggota_keluarga">Anggota Keluarga</th>
                    <th data-column-id="kepesertaan">Kepesertaan</th>
                    <th data-column-id="saldo">Saldo (Liter)</th>
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

@push('scripts')

<script type="text/javascript">

    var btn = '<a href="{{url('penerima/create')}}" class="btn btn-default"><i class="fa fa-plus"></i> TAMBAH PENERIMA</a>';

    var grid = $('#bootgrid').bootgrid({
        ajax: true, url: '{{url("penerima?kecamatan_id=".$kecamatan->id)}}',
        ajaxSettings: {method: 'GET', cache: false},
        searchSettings: { delay: 100, characters: 3 },
        templates: {
            header: "<div id=\"@{{ctx.id}}\" class=\"@{{css.header}}\"><div class=\"row\"><div class=\"col-sm-12 actionBar\"><p style=\"display:inline-block;margin-right:20px;\">"+btn+"</p><p class=\"@{{css.search}}\"></p><p class=\"@{{css.actions}}\"></p></div></div></div>"
        },
        formatters: {
            "commands": function(column, row) {
                return "<a class=\"btn btn-xs btn-default\" href=\"{{url('penerima')}}/" + row.id + "/edit\"><i class=\"fa fa-edit\"></i></a> " +
                    "<button class=\"btn btn-xs btn-default c-delete\" data-id=\"" + row.id + "\"><i class=\"fa fa-trash\"></i></button>";
            },
            "kode_keluarga": function(column, row) {
                return '<a href="{{url('/penerima/')}}/'+row.id+'">'+row.kode_keluarga.toUpperCase()+'</a>';
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
                url: '{{url("penerima")}}/' + id,
                success: function(r) {
                    console.log(r);
                    $('#bootgrid').bootgrid('reload');
                }
            });
        }
    };

</script>

@endpush

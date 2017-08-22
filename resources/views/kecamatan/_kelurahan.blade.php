<div class="x_panel">
    <div class="x_content">
        <h2>KELURAHAN/DESA <small>Daftar kelurahan/desa di kecamatan {{$kecamatan->nama}}</small></h2>
        <table class="table table-striped table-hover" id="bootgrid-kelurahan">
            <thead>
                <tr>
                    <th data-column-id="id" data-identifier="true" data-type="numeric">ID</th>
                    <th data-column-id="nama" data-formatter="nama">Nama Kelurahan</th>
                    <th data-column-id="kode">Kode</th>
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

@push('scripts')

<script type="text/javascript">

    var grid = $('#bootgrid-kelurahan').bootgrid({
        ajax: true, url: '{{url("kelurahan?kecamatan_id=".$kecamatan->id)}}',
        ajaxSettings: {method: 'GET', cache: false},
        searchSettings: { delay: 100, characters: 3 },
        formatters: {
            "nama": function(column, row) {
                return '<a href="{{url('/kelurahan/')}}/'+row.id+'">'+row.nama+'</a>';
            },
            "kecamatan": function(column, row) {
                return '<a href="{{url('/kecamatan/')}}/'+row.kecamatan_id+'">'+row.kecamatan+'</a>';
            }

        }
    });

</script>

@endpush

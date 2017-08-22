<div class="x_panel">
    <div class="x_content">
        <h2>KECAMATAN <small>Daftar kecamatan seluruh Kabupaten Purwakarta</small></h2>
        <table class="table table-striped table-hover" id="bootgrid-kecamatan">
            <thead>
                <tr>
                    <th data-column-id="id" data-identifier="true" data-type="numeric">ID</th>
                    <th data-column-id="nama" data-formatter="nama">Nama</th>
                    <th data-column-id="kode">Kode</th>
                    <th data-column-id="jml_kelurahan" data-sortable="false">Jumlah Kelurahan/Desa</th>
                    <th data-column-id="jml_atm" data-sortable="false">Jumlah ATM</th>
                    <th data-column-id="jml_penerima" data-sortable="false">Jumlah Penerima</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

@push('scripts')

<script type="text/javascript">

    var grid = $('#bootgrid-kecamatan').bootgrid({
        ajax: true, url: '{{url('kecamatan')}}',
        ajaxSettings: {method: 'GET', cache: false},
        searchSettings: { delay: 100, characters: 3 },
        formatters: {
            "nama": function(column, row) {
                return '<a href="{{url('/kecamatan/')}}/'+row.id+'">'+row.nama+'</a>';
            }
        }
    });

</script>

@endpush

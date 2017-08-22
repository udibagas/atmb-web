<div class="x_panel">
    <div class="x_content">
        <h2>LOG</h2>
        <table class="table table-striped table-hover" id="bootgrid-log">
            <thead>
                <tr>
                    <th data-column-id="created_at">Waktu</th>
                    <th data-column-id="kecamatan">Kecamatan</th>
                    <th data-column-id="kelurahan">Kelurahan</th>
                    <th data-column-id="atm">ATM</th>
                    <th data-formatter="penerima">Penerima</th>
                    <th data-column-id="kode" data-formatter="kode">Kode</th>
                    <th data-column-id="pesan">Pesan</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

@push('scripts')

<script type="text/javascript">

    var grid = $('#bootgrid-log').bootgrid({
        ajax: true, url: '{{url("log")}}',
        ajaxSettings: {method: 'GET', cache: false},
        searchSettings: { delay: 100, characters: 3 },
        formatters: {
            "penerima": function(column, row) {
                return row.nama_suami+' / '+row.nama_istri;
            },
            "kode": function(column, row) {
                kode = [];
                kode[100] = 'Isi Ulang';
                kode[101] = 'Pengambilan';
                kode[102] = 'Beras Habis';
                kode[103] = 'Pintu Terbuka';
                kode[104] = 'Pemeliharaan';

                return row.kode+': '+ kode[row.kode];
            }
        }
    });

</script>

@endpush

<div class="x_panel">
    <div class="x_content">
        <h2>ATM BERAS <small>Daftar ATM Beras di kecamatan {{$kecamatan->nama}}</small></h2>
        <table class="table table-striped table-hover" id="bootgrid-atm">
            <thead>
                <tr>
                    <th data-column-id="kode" data-formatter="kode">Kode</th>
                    <th data-column-id="ip_address">IP Address</th>
                    <th data-column-id="kelurahan" data-formatter="kelurahan">Kelurahan</th>
                    <th data-column-id="alamat">Alamat</th>
                    <th data-column-id="nama_petugas">Petugas</th>
                    <th data-column-id="saldo">Saldo (Liter)</th>
                    <th data-column-id="kapasitas">Kapasitas (Liter)</th>
                    <th data-column-id="last_refill">Terakhir Isi Ulang</th>
                    <th data-column-id="last_maintenance">Terakhir Maintenance</th>
                    <th data-column-id="status_beras">Status Beras</th>
                    <th data-column-id="status_pintu">Status Pintu</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

@push('scripts')

<script type="text/javascript">

    var grid = $('#bootgrid-atm').bootgrid({
        ajax: true, url: '{{url("atm?kecamatan_id=".$kecamatan->id)}}',
        ajaxSettings: {method: 'GET', cache: false},
        searchSettings: { delay: 100, characters: 3 },
        formatters: {
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
    });

</script>

@endpush

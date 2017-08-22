<div class="x_panel">
    <div class="x_content">
        <h2>PEMELIHARAAN</h2>
        <table class="table table-striped table-hover" id="bootgrid">
            <thead>
                <tr>
                    <th data-column-id="tanggal">Tanggal</th>
                    <th data-column-id="kelurahan">Kelurahan</th>
                    <th data-column-id="atm">ATM</th>
                    <th data-column-id="nama_petugas">Nama Petugas</th>
                    <th data-column-id="telpon_petugas">Telpon Petugas</th>
                    <th data-column-id="keterangan">Keterangan</th>
                    <th data-column-id="user">Diinput Oleh</th>
                    <th data-column-id="created_at">Waktu Input</th>
                    <th data-column-id="updated_at">Waktu Update</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

@push('scripts')

<script type="text/javascript">

    var grid = $('#bootgrid').bootgrid({
        ajax: true, url: '{{url("pemeliharaan?kecamatan_id=".$kecamatan->id)}}',
        ajaxSettings: {method: 'GET', cache: false},
        searchSettings: { delay: 100, characters: 3 },
    });

</script>

@endpush

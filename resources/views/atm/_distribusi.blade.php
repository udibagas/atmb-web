<div class="x_panel">
    <div class="x_content">
        <h2>DISTRIBUSI <small>Distribusi beras ke ATM di atm {{$atm->kode}}</small></h2>
        <table class="table table-striped table-hover" id="bootgrid-distribusi">
            <thead>
                <tr>
                    <th data-column-id="tanggal">Tanggal</th>
                    <th data-column-id="jumlah">Jumlah (Liter)</th>
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

    var grid = $('#bootgrid-distribusi').bootgrid({
        ajax: true, url: '{{url("distribusi?atm_id=".$atm->id)}}',
        ajaxSettings: {method: 'GET', cache: false},
        searchSettings: { delay: 100, characters: 3 },
    })

</script>

@endpush

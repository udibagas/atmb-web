<div class="x_panel">
    <div class="x_content">
        <h2>DONASI</h2>
        <table class="table table-striped table-hover" id="bootgrid-donasi">
            <thead>
                <tr>
                    <th data-column-id="id" data-identifier="true" data-type="numeric">ID</th>
                    <th data-column-id="tanggal">Tanggal</th>
                    <th data-column-id="donatur">Nama Donatur</th>
                    <th data-column-id="instansi">Instansi</th>
                    <th data-column-id="alamat">Alamat</th>
                    <th data-column-id="telpon">Telpon</th>
                    <th data-column-id="jumlah">Jumlah (Liter)</th>
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

    var grid = $('#bootgrid-donasi').bootgrid({
        ajax: true, url: '{{url("donasi")}}',
        ajaxSettings: {method: 'GET', cache: false},
        searchSettings: { delay: 100, characters: 3 },
    });

</script>

@endpush

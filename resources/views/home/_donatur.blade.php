<div class="x_panel">
    <div class="x_content">
        <h2>DONATUR <small>Daftar donatur seluruh Kabupaten Purwakarta</small></h2>
        <table class="table table-striped table-hover" id="bootgrid-donatur">
            <thead>
                <tr>
                    <th data-column-id="id" data-identifier="true" data-type="numeric">ID</th>
                    <th data-column-id="nama">Nama</th>
                    <th data-column-id="instansi">Instansi</th>
                    <th data-column-id="alamat">Alamat</th>
                    <th data-column-id="telpon">Telpon</th>
                    <th data-column-id="jenis">Jenis</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

@push('scripts')

<script type="text/javascript">

    var grid = $('#bootgrid-donatur').bootgrid({
        ajax: true, url: '{{url("donatur")}}',
        ajaxSettings: {method: 'GET', cache: false},
        searchSettings: { delay: 100, characters: 3 },
    });

</script>

@endpush

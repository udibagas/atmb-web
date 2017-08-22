<div class="x_panel">
    <div class="x_content">
        <h2>PENERIMA <small>Daftar penerima kecamatan {{$kecamatan->nama}}</small></h2>
        <table class="table table-striped table-hover" id="bootgrid-penerima">
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

    var grid = $('#bootgrid-penerima').bootgrid({
        ajax: true, url: '{{url("penerima?kecamatan_id=".$kecamatan->id)}}',
        ajaxSettings: {method: 'GET', cache: false},
        searchSettings: { delay: 100, characters: 3 },
        formatters: {
            "kode_keluarga": function(column, row) {
                return '<a href="{{url('/penerima/')}}/'+row.id+'">'+row.kode_keluarga.toUpperCase()+'</a>';
            }
        }
    });

</script>

@endpush

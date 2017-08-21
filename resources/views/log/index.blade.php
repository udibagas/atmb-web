@extends('layouts.app')

@section('content')

<div class="x_panel">
    <div class="x_content">
        <h2>LOG</h2>
        <table class="table table-striped table-hover" id="bootgrid">
            <thead>
                <tr>
                    <th data-column-id="created_at">Waktu</th>
                    <th data-column-id="kecamatan">Kecamatan</th>
                    <th data-column-id="kelurahan">Kelurahan</th>
                    <th data-column-id="atm">ATM</th>
                    <th data-formatter="penerima">Penerima</th>
                    <th data-column-id="pesan">Pesan</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

@endsection

@push('scripts')

<script type="text/javascript">

    var grid = $('#bootgrid').bootgrid({
        ajax: true, url: '{{url("log")}}',
        ajaxSettings: {method: 'GET', cache: false},
        searchSettings: { delay: 100, characters: 3 },
        formatters: {
            "penerima": function(column, row) {
                return row.nama_suami+' / '+row.nama_istri;
            },

        }
    });

</script>

@endpush

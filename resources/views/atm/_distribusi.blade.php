<div class="x_panel">
    <div class="x_title">
        <h2>DISTRIBUSI</h2>
        <div class="clearfix"></div>
    </div>

    <div class="x_content">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Jumlah (Liter)</th>
                    <th>Nama Petugas</th>
                    <th>Telpon Petugas</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @foreach($atm->distribusi as $k)
                <tr>
                    <td>{{ $k->tanggal }}</td>
                    <td>{{ number_format($k->jumlah) }}</td>
                    <td>{{ $k->nama_petugas }}</td>
                    <td>{{ $k->telpon_petugas }}</td>
                    <td>{{ $k->keterangan }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

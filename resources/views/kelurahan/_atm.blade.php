<div class="x_panel">
    <div class="x_title">
        <h2>ATM BERAS <small>Daftar ATM Beras di kelurahan {{ $kelurahan->nama }}</small></h2>
        <div class="clearfix"></div>
    </div>

    <div class="x_content">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Kode</th>
                    <th>IP Address</th>
                    <th>Alamat</th>
                    <th>Petugas</th>
                    <th>Saldo (Liter)</th>
                    <th>Terakhir Isi Ulang</th>
                    <th>Terakhir Maintenance</th>
                    <th>Status Beras</th>
                    <th>Status Pintu</th>
                </tr>
            </thead>
            <tbody>
                @foreach($kelurahan->atm as $k)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><a href="/atm/{{ $k->id }}">{{ $k->kode }}</a></td>
                    <td>{{ $k->ip_address }}</td>
                    <td>{{ $k->alamat }}</td>
                    <td>{{ $k->nama_petugas }}<br>{{ $k->telpon_petugas }}</td>
                    <td>{{ $k->saldo }}</td>
                    <td>{{ $k->last_refill }}<br>{{ $k->refill_by }}</td>
                    <td>{{ $k->last_maintenance }}<br>{{ $k->maintenance_by }}</td>
                    <td>
                        {!! $k->status_beras ? '<span class="label label-success">ISI</span>' : '<span class="label label-danger">HABIS</span>' !!}
                    </td>
                    <td>
                        {!! $k->status_pintu ? '<span class="label label-success">TERTUTUP</span>' : '<span class="label label-danger">TERBUKA</span>' !!}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

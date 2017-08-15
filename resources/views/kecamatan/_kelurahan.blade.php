<div class="x_panel">
    <div class="x_title">
        <h2>KELURAHAN/DESA <small>Daftar kelurahan/desa di kecamatan {{ $kecamatan->nama }}</small></h2>
        <div class="clearfix"></div>
    </div>

    <div class="x_content">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Kelurahan</th>
                    <th>Kode</th>
                    <th>Jumlah ATM</th>
                    <th>Jumlah Penerima</th>
                </tr>
            </thead>
            <tbody>
                @foreach($kecamatan->kelurahan as $k)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><a href="{{url('kelurahan/'.$k->id)}}">{{ $k->nama }}</a></td>
                    <td>{{ $k->kode }}</td>
                    <td>{{ $k->atm->count() }}</td>
                    <td>{{ number_format($k->penerima->count()) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

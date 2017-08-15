<div class="x_panel">
    <div class="x_title">
        <h2>PENERIMA <small>Daftar penerima di kelurahan {{ $kelurahan->nama }}</small></h2>
        <div class="clearfix"></div>
    </div>

    <div class="x_content">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Kode Keluarga</th>
                    <th>Nomor KK/PKH</th>
                    <th style="width:200px;">Nama Istri/Suami</th>
                    <th>Tgl Lahir Istri/Suami</th>
                    <th>NIK Istri/Suami</th>
                    <th>Alamat</th>
                    <th style="width:200px;">Nama Anggota Keluarga</th>
                    <th>Kepesertaan</th>
                    <th>Saldo (Liter)</th>
                </tr>
            </thead>
            <tbody>
                @foreach($kelurahan->penerima as $k)
                <tr>
                    <td>{{ number_format($loop->iteration) }}</td>
                    <td><a href="{{url('penerima/'.$k->id)}}">{{ strtoupper($k->kode_keluarga) }}</a></td>
                    <td>{{ $k->nomor_kk }}<br>{{ $k->nomor_pkh }}</td>
                    <td>{{ $k->nama_istri }}<br>{{ $k->nama_suami }}</td>
                    <td>{{ $k->tanggal_lahir_istri }}<br>{{ $k->tanggal_lahir_suami }}</td>
                    <td>{{ $k->nik_istri }}<br>{{ $k->nik_suami }}</td>
                    <td>{{ $k->alamat }}</td>
                    <td>{{ $k->nama_anggota_keluarga }}</td>
                    <td>{{ $k->kepesertaan }}</td>
                    <td>{{ $k->saldo }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

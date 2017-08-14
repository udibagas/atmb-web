<div class="x_panel">
    <div class="x_title">
        <h2>LOG</h2>
        <div class="clearfix"></div>
    </div>

    <div class="x_content">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Waktu</th>
                    <th>Kelurahan</th>
                    <th>ATM</th>
                    <th>Penerima</th>
                    <th>Pesan</th>
                </tr>
            </thead>
            <tbody>
                @foreach($kecamatan->log as $k)
                <tr>
                    <td>{{ $k->created_at }}</td>
                    <td>
                        @if ($k->kelurahan)
                        <a href="/kelurahan/{{ $k->kelurahan_id }}">{{ $k->kelurahan->nama }}</a>
                        @endif
                    </td>
                    <td>
                        @if ($k->atm)
                        <a href="/atm/{{ $k->atm_id }}">{{ $k->atm->kode }}</a>
                        @endif
                    </td>
                    <td>
                        @if ($k->penerima)
                        <a href="/penerima/{{ $k->penerima_id }}">
                            {{ $k->penerima->nama_suami }}<br>
                            {{ $k->penerima->nama_istri }}
                        </a>
                        @endif
                    </td>
                    <td>{{ $k->pesan }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

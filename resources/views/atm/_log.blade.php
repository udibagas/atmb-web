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
                    <th>Penerima</th>
                    <th>Pesan</th>
                </tr>
            </thead>
            <tbody>
                @foreach($atm->log as $k)
                <tr>
                    <td>{{ $k->created_at }}</td>
                    <td>
                        @if ($k->penerima)
                        <a href="{{url('penerima/'.$k->penerima_id)}}">
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

<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <!-- <h3>Navigasi</h3> -->
        <ul class="nav side-menu">
            <li><a href="/"><i class="fa fa-home"></i> Home</a> </li>
            <li><a><i class="fa fa-exchange"></i> Kegiatan <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{url('donasi')}}">Donasi</a></li>
                    <li><a href="{{url('distribusi')}}">Distribusi</a></li>
                    <li><a href="{{url('maintenance')}}">Perawatan</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-database"></i> Master Data <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{url('kecamatan')}}">Kecamatan</a></li>
                    <li><a href="{{url('kelurahan')}}">Kelurahan</a></li>
                    <li><a href="{{url('atm')}}">ATM</a></li>
                    <li><a href="{{url('penerima')}}">Penerima</a></li>
                    <li><a href="{{url('donatur')}}">Donatur</a></li>
                    <li><a href="{{url('user')}}">User</a></li>
                </ul>
            </li>
            <li><a href="{{url('log')}}"><i class="fa fa-list"></i> Log</a></li>
        </ul>
    </div>
</div>

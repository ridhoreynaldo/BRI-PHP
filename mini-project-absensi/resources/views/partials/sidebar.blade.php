<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('dashboard')}}" class="brand-link">
        <img src="{{asset('template')}}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                @if (auth()->user()->role_id === 1)
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Data
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    
                    <ul class="nav nav-treeview">
                    <li class="nav-item">
                            <a href="{{route('data-asisten.index')}}" class="nav-link">
                                <i class="far fa-edit nav-icon"></i>
                                <p>Data Asisten</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('data-materi.index')}}" class="nav-link">
                                <i class="far fa-edit nav-icon"></i>
                                <p>Data Materi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('data-kelas.index')}}" class="nav-link">
                                <i class="far fa-edit nav-icon"></i>
                                <p>Data Kelas</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif

                @if (auth() -> user()->role_id === 1 || auth()->user()->role_id === 2 || auth()->user()->role_id === 3)
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Jadwal
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('presensi')}}" class="nav-link">
                                <i class="far fa-clock nav-icon"></i>
                                <p>Presensi</p>
                            </a>
                            </li>
                                <li class="nav-item">
                            <a href="{{route('riwayat')}}" class="nav-link">
                                <i class="far fa-copy nav-icon"></i>
                                <p>Riwayat</p>
                            </a>
                            </li>
                    </ul>
                </li>
                @endif

            </ul>
        </nav>
    <!-- /.sidebar-menu -->
    </div>

<!-- /.sidebar -->
</aside>

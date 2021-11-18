<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link {{ $page == 'Dashboard' ? 'active' : ''}}" aria-current="page"
                            href="/admin/dashboard">
                            <span data-feather="home"></span>
                            Dashboard
                        </a>
                    </li>
                    @can('root')
                    <li class="nav-item">
                        <a class="nav-link {{ $page == 'Data Identitas' ? 'active' : ''}}" href="/identitas">
                            <span data-feather="file"></span>
                            Identitas
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/unit-kerja">
                            <span data-feather="file"></span>
                            Unit Kerja
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/kelurahan">
                            <span data-feather="file"></span>
                            Kelurahan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/kecamatan">
                            <span data-feather="file"></span>
                            Kecamatan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/jabatan">
                            <span data-feather="file"></span>
                            Jabatan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/riwayat-jabatan">
                            <span data-feather="file"></span>
                            Riwayat Jabatan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/pangkat">
                            <span data-feather="file"></span>
                            Pangkat
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/riwayat-pangkat">
                            <span data-feather="file"></span>
                            Riwayat Pangkat
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/diklat">
                            <span data-feather="file"></span>
                            Diklat
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/pendidikan">
                            <span data-feather="file"></span>
                            Pendidikan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/tanda-jasa">
                            <span data-feather="file"></span>
                            Tanda Jasa
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/keluarga">
                            <span data-feather="file"></span>
                            Keluarga
                        </a>
                    </li>
                    @endcan
                    @can('unit-kerja')
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/unit-kerja/pengajuan">
                            <span data-feather="file"></span>
                            Pengajuan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/unit-kerja/dokumen-sk">
                            <span data-feather="file"></span>
                            Dokumen
                        </a>
                    </li>
                    @endcan
                </ul>
                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                    <span>Halo {{ explode(' ', trim(auth()->user()->nama))[0]; }}!</span>
                </h6>
            </div>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            {{-- <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Dashboard</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group me-2">
                        <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                        <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                    </div>
                    <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                        <span data-feather="calendar"></span>
                        This week
                    </button>
                </div>
            </div> --}}
<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <nav class="pcoded-navbar">
            <div class="sidebar_toggle">
                <a href="#">
                    <i class="icon-close icons"></i>
                </a>
            </div>
            <div class="pcoded-inner-navbar main-menu">
                <div class="">
                    <div class="main-menu-content">
                        <ul>
                            <li class="more-details">
                                <a href="user-profile.html">
                                    <i class="ti-user"></i>
                                    Profil
                                </a>
                            </li>
                            <li class="more-details">
                                <form action="/logout" method="post">
                                    @csrf
                                    <button type="submit" class="btn-logout li-btn-logout"><i
                                            class="ti-layout-sidebar-left"></i> Logout</button>
                                </form>
                            </li>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="pcoded-navigation-label" data-i18n="nav.category.navigation">
                    Beranda
                </div>
                <ul class="pcoded-item pcoded-left-item">
                    <li class="{{ $page == 'Dashboard' ? 'active' : ''}}">
                        <a href="/admin/dashboard" class="waves-effect waves-dark">
                            <span class="pcoded-micon">
                                <i class="ti-home"></i>
                                <b>D</b>
                            </span>
                            <span class="pcoded-mtext" data-i18n="nav.dash.main">
                                Dashboard
                            </span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                </ul>

                @can('unit-kerja')
                <div class="pcoded-navigation-label" data-i18n="nav.category.forms">
                    Data Umum
                </div>
                <ul class="pcoded-item pcoded-left-item">
                    <li class="pcoded-hasmenu">
                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                            <span class="pcoded-micon">
                                <i class="ti-layout-grid2-alt"></i>
                            </span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.main">
                                Verifikasi Data
                            </span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                        <ul class="pcoded-submenu">
                            <li class="">
                                <a href="/admin/unit-kerja/pegawai/umum/identitas" class="waves-effect waves-dark">
                                    <span class="pcoded-micon">
                                        <i class="ti-angle-right"></i>
                                    </span>
                                    <span class="pcoded-mtext"
                                        data-i18n="nav.basic-components.breadcrumbs">Identitas</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="">
                                <a href="/admin/unit-kerja/pegawai/umum/pangkat" class="waves-effect waves-dark">
                                    <span class="pcoded-micon">
                                        <i class="ti-angle-right"></i>
                                    </span>
                                    <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">
                                        Pangkat
                                    </span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="">
                                <a href="/admin/unit-kerja/pegawai/umum/pendidikan" class="waves-effect waves-dark">
                                    <span class="pcoded-micon">
                                        <i class="ti-angle-right"></i>
                                    </span>
                                    <span class="pcoded-mtext"
                                        data-i18n="nav.basic-components.breadcrumbs">Pendidikan</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="">
                                <a href="/admin/unit-kerja/pegawai/umum/jabatan" class="waves-effect waves-dark">
                                    <span class="pcoded-micon">
                                        <i class="ti-angle-right"></i>
                                    </span>
                                    <span class="pcoded-mtext"
                                        data-i18n="nav.basic-components.breadcrumbs">Jabatan</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="">
                                <a href="/admin/unit-kerja/pegawai/umum/diklat" class="waves-effect waves-dark">
                                    <span class="pcoded-micon">
                                        <i class="ti-angle-right"></i>
                                    </span>
                                    <span class="pcoded-mtext"
                                        data-i18n="nav.basic-components.breadcrumbs">Diklat</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <div class="pcoded-navigation-label" data-i18n="nav.category.forms">
                    Data Khusus
                </div>
                <ul class="pcoded-item pcoded-left-item">
                    <li class="pcoded-hasmenu">
                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                            <span class="pcoded-micon">
                                <i class="ti-layout-grid2-alt"></i>
                            </span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.main">
                                Verifikasi Data
                            </span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                        <ul class="pcoded-submenu">
                            <li class="">
                                <a href="/admin/unit-kerja/pegawai/khusus/ibel+tubel" class="waves-effect waves-dark">
                                    <span class="pcoded-micon">
                                        <i class="ti-angle-right"></i>
                                    </span>
                                    <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">
                                        IBEL/TUBEL
                                    </span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="">
                                <a href="/admin/unit-kerja/pegawai/khusus/drh" class="waves-effect waves-dark">
                                    <span class="pcoded-micon">
                                        <i class="ti-angle-right"></i>
                                    </span>
                                    <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">DRH</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                @endcan

                @can('bkppd')
                <div class="pcoded-navigation-label" data-i18n="nav.category.forms">
                    Menu Data Umum
                </div>
                <ul class="pcoded-item pcoded-left-item">
                    <li class="pcoded-hasmenu">
                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                            <span class="pcoded-micon">
                                <i class="ti-layout-grid2-alt"></i>
                            </span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.main">
                                Verifikasi Data
                            </span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                        <ul class="pcoded-submenu">
                            <li class="">
                                <a href="accordion.html" class="waves-effect waves-dark">
                                    <span class="pcoded-micon">
                                        <i class="ti-angle-right"></i>
                                    </span>
                                    <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">
                                        Pangkat
                                    </span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="">
                                <a href="breadcrumb.html" class="waves-effect waves-dark">
                                    <span class="pcoded-micon">
                                        <i class="ti-angle-right"></i>
                                    </span>
                                    <span class="pcoded-mtext"
                                        data-i18n="nav.basic-components.breadcrumbs">Jabatan</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <div class="pcoded-navigation-label" data-i18n="nav.category.forms">
                    Menu Data Khusus
                </div>
                <ul class="pcoded-item pcoded-left-item">
                    <li class="pcoded-hasmenu">
                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                            <span class="pcoded-micon">
                                <i class="ti-layout-grid2-alt"></i>
                            </span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.main">
                                Verifikasi Data
                            </span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                        <ul class="pcoded-submenu">
                            <li class="">
                                <a href="accordion.html" class="waves-effect waves-dark">
                                    <span class="pcoded-micon">
                                        <i class="ti-angle-right"></i>
                                    </span>
                                    <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">
                                        IBEL/TUBEL
                                    </span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="">
                                <a href="breadcrumb.html" class="waves-effect waves-dark">
                                    <span class="pcoded-micon">
                                        <i class="ti-angle-right"></i>
                                    </span>
                                    <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">DRH</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                @endcan

            </div>
        </nav>
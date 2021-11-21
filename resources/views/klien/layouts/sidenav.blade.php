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
                                <a href="#">
                                    <i class="ti-layout-sidebar-left"></i>
                                    Logout
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="pcoded-navigation-label" data-i18n="nav.category.navigation">
                    Home
                </div>
                <ul class="pcoded-item pcoded-left-item">
                    @if ($page == 'Klien | Dashboard')
                        <li class="active">
                        @else
                        <li class="">
                    @endif

                    <a href="/klien/dashboard" class="waves-effect waves-dark">
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
                    @if ($page == 'Klien | Data Umum')
                        <li class="active">
                        @else
                        <li class="">
                    @endif
                    <a href="/klien/dataumum" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="fa fa-table"></i>
                            <b>D</b>
                        </span>
                        <span class="pcoded-mtext" data-i18n="nav.dash.main">
                            Data Umum
                        </span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                    </li>
                    @if ($page == 'Klien | Data Khusus')
                        <li class="active">
                        @else
                        <li class="">
                    @endif
                    <a href="/klien/datakhusus" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="fa fa-th-large"></i>
                            <b>D</b>
                        </span>
                        <span class="pcoded-mtext" data-i18n="nav.dash.main">
                            Data Khusus
                        </span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                    </li>

                </ul>
                <div class="pcoded-navigation-label" data-i18n="nav.category.forms">
                    Services
                </div>
                <ul class="pcoded-item pcoded-left-item">
                    <li class="pcoded-hasmenu">
                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                            <span class="pcoded-micon">
                                <i class="ti-layout-grid2-alt"></i>
                            </span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.main">
                                Layanan
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
                                        Accordion
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
                                        data-i18n="nav.basic-components.breadcrumbs">Breadcrumbs</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="">
                                <a href="button.html" class="waves-effect waves-dark">
                                    <span class="pcoded-micon">
                                        <i class="fa fa-cogs"></i>
                                    </span>
                                    <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">
                                        Button
                                    </span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="">
                                <a href="tabs.html" class="waves-effect waves-dark">
                                    <span class="pcoded-micon">
                                        <i class="ti-angle-right"></i>
                                    </span>
                                    <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">
                                        Tabs
                                    </span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="">
                                <a href="color.html" class="waves-effect waves-dark">
                                    <span class="pcoded-micon">
                                        <i class="ti-angle-right"></i>
                                    </span>
                                    <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">
                                        Color
                                    </span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="">
                                <a href="label-badge.html" class="waves-effect waves-dark">
                                    <span class="pcoded-micon">
                                        <i class="ti-angle-right"></i>
                                    </span>
                                    <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">
                                        Label Badge
                                    </span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="">
                                <a href="tooltip.html" class="waves-effect waves-dark">
                                    <span class="pcoded-micon">
                                        <i class="ti-angle-right"></i>
                                    </span>
                                    <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">
                                        Tooltip
                                    </span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="">
                                <a href="typography.html" class="waves-effect waves-dark">
                                    <span class="pcoded-micon">
                                        <i class="ti-angle-right"></i>
                                    </span>
                                    <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">
                                        Typography
                                    </span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="">
                                <a href="notification.html" class="waves-effect waves-dark">
                                    <span class="pcoded-micon">
                                        <i class="ti-angle-right"></i>
                                    </span>
                                    <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">
                                        Notification
                                    </span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="">
                                <a href="icon-themify.html" class="waves-effect waves-dark">
                                    <span class="pcoded-micon">
                                        <i class="ti-angle-right"></i>
                                    </span>
                                    <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">
                                        Themify
                                    </span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>


        @yield('content')


        @include('klien.layouts.footer')

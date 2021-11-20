@extends('klien.layouts.main')
@section('content')
    <div class="pcoded-content">
        <!-- Page-header start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <div class="page-header-title">
                            <h1 class="m-b-10" style="color:white">Data Umum (FIP)</h1>
                            <!-- <p class="m-b-0" style="font-size: 20px">Selamat datang di Sistem Informasi Pegawai</p> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page-header end -->
        <div class="pcoded-inner-content">
            <!-- Main-body start -->
            <div class="main-body">
                <div class="page-wrapper">
                    <!-- Page-body start -->
                    <div class="page-body">
                        <div class="row">
                            <!-- task, page, download counter  start -->
                            <div class="col-sm-3">
                                <a href="">
                                    <div class="card">
                                        <div class="card-block">
                                            <div class="row align-items-center">
                                                <div class="col-8">
                                                    <h4 class="text-c-black">Data</h4>
                                                    <h6 class="text-muted m-b-0">Identitas</h6>
                                                </div>
                                                <div class="col-4 text-right">
                                                    <i class="fa fa-id-badge f-38"></i>
                                                </div>
                                            </div>
                                        </div>
                                </a>
                                <div class="card-footer bg-c-green">
                                    <div class="row align-items-center">
                                        <div class="col-9">
                                            <p class="text-white m-b-0">Selesai</p>
                                        </div>
                                        <div class="col-3 text-right">
                                            <i class="fa fa-check-circle-o"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <a href="">
                                <div class="card">
                                    <div class="card-block">
                                        <div class="row align-items-center">
                                            <div class="col-8">
                                                <h4 class="text-c-black">Riwayat</h4>
                                                <h6 class="text-muted m-b-0">Pangkat/Golongan</h6>
                                            </div>
                                            <div class="col-4 text-right">
                                                <i class="fa fa-id-badge f-38"></i>
                                            </div>
                                        </div>
                                    </div>
                            </a>
                            <div class="card-footer bg-c-green">
                                <div class="row align-items-center">
                                    <div class="col-9">
                                        <p class="text-black m-b-0">Selesai</p>
                                    </div>
                                    <div class="col-3 text-right">
                                        <i class="fa fa-check-circle-o"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <a href="">
                            <div class="card">
                                <div class="card-block">
                                    <div class="row align-items-center">
                                        <div class="col-8">
                                            <h4 class="text-c-black">Riwayat</h4>
                                            <h6 class="text-muted m-b-0">Pendidikan</h6>
                                        </div>
                                        <div class="col-4 text-right">
                                            <i class="fa fa-id-badge f-38"></i>
                                        </div>
                                    </div>
                                </div>
                        </a>
                        <div class="card-footer bg-c-yellow">
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <p class="text-black m-b-0">Belum Selesai</p>
                                </div>
                                <div class="col-3 text-right">
                                    <i class="fa fa-check-circle-o"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- task, page, download counter  end -->
                <!-- Page-body end -->
            </div>
            <div id="styleSelector"></div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
@endsection

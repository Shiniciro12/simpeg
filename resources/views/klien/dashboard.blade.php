@extends('klien.layouts.main')
@section('content')
    <div class="pcoded-content">
        <!-- Page-header start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <div class="page-header-title">
                            <h1 class="m-b-10" style="color:white">Dashboard</h1>
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
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Profil</h5>
                                        <span class="text-muted">
                                            Identitas diri
                                        </span>
                                        <div class="card-header-right">
                                            <ul class="list-unstyled card-option">
                                                <li>
                                                    <i class="fa fa fa-wrench open-card-option"></i>
                                                </li>
                                                <li>
                                                    <i class="fa fa-window-maximize full-card"></i>
                                                </li>
                                                <li>
                                                    <i class="fa fa-minus minimize-card"></i>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-block">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="card">
                                                    <div class="card-body text-center">
                                                        <?php
                                                        if(file_exists('images/'.auth()->user()->foto)){
                                                        ?>
                                                        <img src="/images/{{ auth()->user()->foto }}"
                                                            class="rounded" width="100%" alt=""><?php
                                                        }
                                                        else{
                                                            ?>
                                                        <img src="/images/defaultpp.jpg" class="rounded-circle" alt="">
                                                        <?php
                                                        }
                                                        ?>


                                                    </div>
                                                    <button class="btn btn-warning"><i class="fa fa-camera"></i> Ganti
                                                        Gambar</button>
                                                </div>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <table class="table">
                                                            <tr>
                                                                <th>Nama</th>
                                                                <td>: {{ auth()->user()->gelar_depan }}
                                                                    {{ auth()->user()->nama }}
                                                                    {{ auth()->user()->gelar_belakang }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Tempat Lahir</th>
                                                                <td>: {{ auth()->user()->tempat_lahir }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Tanggal Lahir</th>
                                                                <td>: {{ auth()->user()->tgl_lahir }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Status Kawin</th>
                                                                <td>: {{ auth()->user()->status_kawin }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Jenis Kelamin</th>
                                                                <td>:
                                                                    @if (auth()->user()->jenis_kelamin == 'L')
                                                                        Laki-laki
                                                                    @else
                                                                        Perempuan
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        </table>
                                                        <center><a href="/klien/dataumum/identitas/edit"
                                                                class="btn btn-primary"><i class="fa fa-sticky-note"></i>
                                                                Lengkapi Data
                                                                Identitas</a></center>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- task, page, download counter  start -->
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

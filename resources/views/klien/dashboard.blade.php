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
                                                        if(file_exists('unggah/identitas/foto/'.auth()->user()->foto)){
                                                        ?>
                                                        <img src="/unggah/identitas/foto/{{ auth()->user()->foto }}"
                                                            class="rounded" width="100%" alt=""><?php
                                                        }
                                                        else{
                                                            ?>
                                                        <img src="/images/defaultpp.jpg" class="rounded-circle" alt="">
                                                        <?php
                                                        }
                                                        ?>
                                                    </div>
                                                    <button class="btn btn-warning" data-toggle="modal"
                                                        data-target="#ganti_foto"><i class="fa fa-camera"></i> Ganti
                                                        Gambar</button>
                                                </div>

                                                <!-- Modal -->
                                                <div class="modal fade" id="ganti_foto" tabindex="-1" role="dialog"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Ganti
                                                                    Gambar</h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="/klien/dataumum/identitas/ganti-gambar"
                                                                    class="form-material" method="POST"
                                                                    enctype="multipart/form-data">
                                                                    @csrf
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-12 col-form-label">Upload
                                                                            File </label>
                                                                        <div class="col-sm-12">
                                                                            <input type="file"
                                                                                class="form-control @error('foto_profil') is-invalid @enderror"
                                                                                value="{{ old('foto_profil') }}"
                                                                                id="foto_profil"
                                                                                aria-describedby="foto_profil" accept=".jpg"
                                                                                name="foto_profil">
                                                                            @error('foto_profil')
                                                                                <div id="foto_profil" class="text-danger">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                            <small style="color: royalblue">Foto Menggunakan
                                                                                Baju
                                                                                Dinas Dengan Latar
                                                                                Belakang Merah Ukuran 3x4</small> <br>
                                                                            <small>*Format: .jpg dibawah
                                                                                1MB</small>
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Tutup</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary">Simpan</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
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

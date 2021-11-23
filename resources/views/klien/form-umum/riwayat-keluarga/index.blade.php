@extends('klien.layouts.main')
@section('content')
    <div class="pcoded-content">
        <!-- Page-header start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <div class="page-header-title">
                            <h1 class="m-b-10" style="color:white">{{ $page }}</h1>
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

                        @if (session()->has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        {{-- Table taro sini --}}

                        <div class="card">
                            <div class="card-header">
                                <h5>Riwayat Keluarga</h5>
                                <a href="/klien/dataumum/keluarga/add" class="btn btn-primary p-2 shadow"><i
                                        class="fa fa-plus"></i> Tambah</a>
                                <div class="card-header-right">
                                    <ul class="list-unstyled card-option">
                                        <li><i class="fa fa fa-wrench open-card-option"></i></li>
                                        <li><i class="fa fa-window-maximize full-card"></i></li>
                                        <li><i class="fa fa-minus minimize-card"></i></li>
                                        <li><i class="fa fa-refresh reload-card"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-block table-border-style">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                {{-- <th scope="col">Nama Pegawai</th> --}}
                                                <th scope="col">NIK</th>
                                                <th scope="col">Nama</th>
                                                <th scope="col">Tempat Lahir</th>
                                                <th scope="col">Tanggal Lahir</th>
                                                <th scope="col">Jenis Kelamin</th>
                                                <th scope="col">Status Keluarga</th>
                                                <th scope="col">Ket</th>
                                                <th scope="col">Status Kawin</th>
                                                <th scope="col">Tanggal Kawin</th>
                                                <th scope="col">Status Tunjangan</th>
                                                <th scope="col">Pendidikan</th>
                                                <th scope="col">Pekerjaan</th>
                                                <th scope="col">Alamat</th>
                                                <th scope="col">Desa/Kelurahan</th>
                                                <th scope="col">Kecamatan</th>
                                                <th scope="col">Kabupaten/Kota</th>
                                                <th scope="col">Provinsi</th>
                                                <th scope="col">Hp</th>
                                                <th scope="col">Telepon</th>
                                                <th scope="col">Kode Pos</th>
                                                <th scope="col" class="text-center">Dokumen</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            @foreach ($rows as $row)
                                                <tr>
                                                    <th scope="row">{{ $i++ }}</th>
                                                    <td scope="row">{{ $row['nama_peg'] }}</td>
                                                    <td scope="row">{{ $row['nik'] }}</td>
                                                    <td scope="row">{{ $row['nama'] }}</td>
                                                    <td scope="row">{{ $row['tempat_lahir'] }}</td>
                                                    <td scope="row">{{ $row['tgl_lahir'] }}</td>
                                                    <td scope="row">{{ $row['jenis_kelamin'] }}</td>
                                                    <td scope="row">{{ $row['status_keluarga'] }}</td>
                                                    <td scope="row">{{ $row['ket'] }}</td>
                                                    <td scope="row">{{ $row['status_kawin'] }}</td>
                                                    <td scope="row">{{ $row['tgl_kawin'] }}</td>
                                                    <td scope="row">{{ $row['status_tunjangan'] }}</td>
                                                    <td scope="row">{{ $row['pendidikan'] }}</td>
                                                    <td scope="row">{{ $row['pekerjaan'] }}</td>
                                                    <td scope="row">{{ $row['alamat'] }}</td>
                                                    <td scope="row">{{ $row['desa_kelurahan'] }}</td>
                                                    <td scope="row">{{ $row['kecamatan'] }}</td>
                                                    <td scope="row">{{ $row['kabupaten_kota'] }}</td>
                                                    <td scope="row">{{ $row['provinsi'] }}</td>
                                                    <td scope="row">{{ $row['hp'] }}</td>
                                                    <td scope="row">{{ $row['telepon'] }}</td>
                                                    <td scope="row">{{ $row['kode_pos'] }}</td>
                                                    <td class="text-center" scope="row">
                                                        <a href="{{ $row['dokumen'] }}"><i
                                                                class="fa fa-file-pdf-o"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-center">
                                        {{ $rows->links() }}
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

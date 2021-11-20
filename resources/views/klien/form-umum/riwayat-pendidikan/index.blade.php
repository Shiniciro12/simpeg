@extends('klien.layouts.main')
@section('content')
    <div class="pcoded-content">
        <!-- Page-header start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <div class="page-header-title">
                            <h1 class="m-b-10" style="color:white">Riwayat Pendidikan</h1>
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
                        {{-- Table taro sini --}}
                        <div class="card">
                            <div class="card-header">
                                <h5>Riwayat Pendidikan</h5>
                                <a href="/klien/dataumum/riwayat-pendidikan/add" class="btn btn-primary p-2 shadow"><i
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
                                        <th scope="col">Nama Lengkap</th>
                                        <th scope="col">Tingkat Pendidikan</th>
                                        <th scope="col">Jurusan</th>
                                        <th scope="col">Nama Lembaga Pendidikan</th>
                                        <th scope="col">Tempat</th>
                                        <th scope="col">Nama Kepsek/Rektor</th>
                                        <th scope="col">No Ijazah</th>
                                        <th scope="col">Tanggal Ijazah</th>
                                        <th scope="col">File Ijasah</th>
                                        <th scope="col">Transkrip Ijazah</th>
                                    </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i = 1; ?>
                                    @foreach ($rows as $row)
                                    <tr>
                                        <th scope="row">{{ $i++}}</th>
                                        <td scope="row">{{ $row["nama_peg"] }}</td>
                                        <td scope="row">{{ $row["tingkat_pendidikan"] }}</td>
                                        <td scope="row">{{ $row["jurusan"] }}</td>
                                        <td scope="row">{{ $row["nama_lembaga_pendidikan"] }}</td>
                                        <td scope="row">{{ $row["tempat"] }}</td>
                                        <td scope="row">{{ $row["nama_kepsek_rektor"] }}</td>
                                        <td scope="row">{{ $row["no_sttb"] }}</td>
                                        <td scope="row">{{ $row["tgl_sttb"] }}</td>
                                        <td scope="row"><a href="/unggah/sttb/{{ $row["sttb"] }}" ><i class="fa fa-file-pdf-o"></i></a></td>
                                        <td scope="row"><a href="/unggah/transkrip/{{ $row["transkrip"] }}" ><i
                                            class="fa fa-file-pdf-o"></i></a></td>
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

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
                            <h5>Riwayat Jabatan</h5>
                            <a href="/klien/dataumum/riwayat-jabatan/add" class="btn btn-primary p-2 shadow"><i
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
                                            <th scope="col">Nama Jabatan</th>
                                            <th scope="col">Pejabat</th>
                                            <th scope="col">No. SK</th>
                                            <th scope="col">Tanggal SK</th>
                                            <th scope="col">TMT Jabatan</th>
                                            <th scope="col" class="text-center">SK Jabatan</th>
                                            <th scope="col">PAK</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        @foreach ($rows as $row)
                                        <tr>
                                            <th scope="row">{{ $i++ }}</th>
                                            <td scope="row">{{ $row['nama_jabatan'] }}</td>
                                            <td scope="row">{{ $row['pejabat'] }}</td>
                                            <td scope="row" style="text-align: center">{{ $row['no_sk'] }}</td>
                                            <td scope="row" style="text-align: center">{{ $row['tgl_sk'] }}</td>
                                            <td scope="row">{{ $row['tmt_jabatan'] }}</td>
                                            <td scope="row" class="text-center"><a href="{{ $row['sk_jabatan'] }}"><i
                                                        class="fa fa-file-pdf-o"></i></a></td>
                                            <td scope="row">
                                                @if($row['pak'] != '')
                                                <a href="{{ $row['pak'] }}"><i class="fa fa-file-pdf-o"></i></a>
                                                @endif
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
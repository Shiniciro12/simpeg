@extends('klien.layouts.main')
@section('content')
    <div class="pcoded-content">
        <!-- Page-header start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <div class="page-header-title">
                            <h1 class="m-b-10" style="color:white">Riwayat Pangkat</h1>
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
                                <h5>Riwayat Pangkat</h5>
                                <a href="/klien/dataumum/riwayat-pangkat/add" class="btn btn-primary p-2 shadow"><i
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
                                                <th scope="col">No</th>
                                                <th scope="col">Pangkat</th>
                                                <th scope="col">Identitas</th>
                                                <th scope="col">Pejabat</th>
                                                <th scope="col">Nomor SK</th>
                                                <th scope="col">Tanggal SK</th>
                                                <th scope="col">TMT Pangkat</th>
                                                <th scope="col" class="text-center">SK Pangkat</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            @foreach ($rows as $row)
                                                <tr>

                                                    <th scope="row">{{ $i++ }}</th>
                                                    <td scope="row">{{ $row['pangkat'] }}</td>
                                                    <td scope="row">{{ $row['nama'] }}</td>
                                                    <td scope="row">{{ $row['pejabat'] }}</td>
                                                    <td scope="row">{{ $row['no_sk'] }}</td>
                                                    <td scope="row">{{ $row['tgl_sk'] }}</td>
                                                    <td scope="row">{{ $row['tmt_pangkat'] }}</td>
                                                    <td class="text-center" scope="row">
                                                        <a download=".{{ $row[' tgl_sk'] }}.{{ $row['no_sk'] }}"
                                                            href="{{ $row->sk_pangkat }}"><i
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

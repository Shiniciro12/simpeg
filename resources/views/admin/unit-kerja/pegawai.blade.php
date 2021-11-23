@extends('admin.layouts.main')
@include('admin.layouts.navbar')
@include('admin.layouts.sidebar')
@section('content')
<div class="container">
    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{session('success')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="row">
        <div class="col-md-12 mx-auto">
            <div class="text-center my-3">
                <div class="h4">Daftar Pegawai OPD</div>
                <span class="h5">{{ $opd['nama_unit'] }}</span>
            </div>
            <br>
            <div class="col-md-12">
                <form action="" method="get">
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" placeholder="Cari..." name="search">
                        <button class="btn btn-outline-secondary" type="submit" id="search">Cari</button>
                    </div>
                </form>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">NIP</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Data Umum</th>
                            <th scope="col">Data Khusus</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($rowsPegawai as $rowPegawai)
                        <tr>
                            <th scope="row">{{ $i++ }}</th>
                            <td>{{ $rowPegawai['nip'] }}</td>
                            <td>{{ $rowPegawai['nama'] }}</td>
                            <td>
                                <div class="dropdown">
                                    <a class="btn btn-info btn-sm dropdown-toggle" href="#" role="button"
                                        id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                        Data
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <li><a class="dropdown-item"
                                                href="/admin/unit-kerja/berkas/umum/{{ $rowPegawai['verifikasi_id'] }}/{{ $rowPegawai['docx_id'] }}/pangkat">Pangkat</a>
                                        </li>
                                        <li><a class="dropdown-item" href="#">Jabatan</a></li>
                                        <li><a class="dropdown-item" href="#">Profil</a></li>
                                    </ul>
                                </div>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <a class="btn btn-info btn-sm dropdown-toggle" href="#" role="button"
                                        id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                        Data
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <li><a class="dropdown-item"
                                                href="/admin/unit-kerja/berkas/khusus/{{ $rowPegawai['verifikasi_id'] }}/{{ $rowPegawai['docx_id'] }}/drh">DRH</a>
                                        </li>
                                        <li><a class="dropdown-item" href="#">SKP</a></li>
                                        <li><a class="dropdown-item" href="#">SK Tidak Melakukan Pelanggaran Hukum</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </form>
            </div>
        </div>
        <br>
        <div class="d-flex justify-content-center">
            {{$rowsPegawai->links()}}
        </div>

        @endsection
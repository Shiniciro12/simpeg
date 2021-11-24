@extends('admin.layouts.main')
@include('admin.layouts.navbar')
@include('admin.layouts.sidenav')
@section('content')
<div class="pcoded-content">
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
                                <th scope="col">Dokumen</th>
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
                                    @if($data == 'umum')
                                    <a class="btn btn-primary btn-sm"
                                        href="/admin/unit-kerja/berkas/umum/{{ $rowPegawai['verifikasi_id'] }}/{{ $rowPegawai['docx_id'] }}/{{ $dokumen }}">
                                        {{ strtoupper($dokumen) }}</a>
                                    @else
                                    <a class="btn btn-primary btn-sm"
                                        href="/admin/unit-kerja/berkas/khusus/{{ $rowPegawai['verifikasi_id'] }}/{{ $rowPegawai['docx_id'] }}/{{ $dokumen }}">
                                        {{ strtoupper($dokumen) }}</a>
                                    @endif
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
        </div>
    </div>
</div>
@endsection
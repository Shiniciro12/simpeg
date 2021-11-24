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
                    <h3>Data dokumen diklat</h3>
                </div>
                <br>
                <div class="col-md-12">
                    <div class="table-responsive shadow px-2">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">NIP</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Sertifikat</th>
                                    <th scope="col">Verifikasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach ($rows as $row)
                                <tr>
                                    <th scope="row">{{ $i++ }}</th>
                                    <td>{{ $row['nip'] }}</td>
                                    <td>{{ $row['nama'] }}</td>
                                    <td><a class="btn btn-primary btn-sm" href="{{ $row['sertifikat'] }}">Lihat
                                            Dokumen</a></td>
                                    <td>
                                        @if (auth()->user()->role_id == '3' && $row['unit_verif_by'] == '')
                                        <form action="/admin/unit-kerja/berkas/verifikasi" method="post">
                                            @csrf
                                            <input type="hidden" name="verifikasi_id" value="{{ $verifikasi_id }}">
                                            <input type="hidden" name="data" value="umum">
                                            <input type="hidden" name="dokumen" value="diklat">
                                            <button class="btn btn-primary btn-sm" type="submit">Verifikasi</button>
                                        </form>
                                        @else
                                        <div class="badge bg-success p-2">
                                            Terverifikasi
                                        </div>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </form>
                    </div>
                </div>
            </div>
            <br>
            <div class="d-flex justify-content-center">
                {{$rows->links()}}
            </div>
        </div>
    </div>
</div>
@endsection
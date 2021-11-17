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
                <h3>Data Identitas</h3>
                <a href="/identitas/create" class="btn btn-success shadow"><i class="bi bi-plus"></i></a>
            </div>
            <br>
            <div class="col-md-12">
                <form action="" method="get">
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" placeholder="Cari..." name="search">
                        <button class="btn btn-outline-secondary" type="submit" id="search">Cari</button>
                    </div>
                </form>
                <div class="table-responsive shadow px-2">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">NIP</th>
                                <th scope="col">Data Umum</th>
                                <th scope="col">Data Khusus</th>
                                <th scope="col">Waktu Verifikasi</th>
                                <th scope="col">Jenis Layanan</th>
                                <th scope="col">Ket</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach ($rows as $row)
                            <tr>
                                <th scope="row">{{ $i++ }}</th>
                                <td>{{ $row['nip'] }}</td>
                                <td>{{ $row['nama'] }}</td>
                                <td><button class="btn btn-sm btn-info text-dark">Cek</button></td>
                                <td><button class="btn btn-sm btn-info text-dark">Cek</button></td>
                                <td>{{ $row['unit_verif_at'] }}</td>
                                <td>{{ $row['nama_layanan'] }}</td>
                                <td>
                                    @if ($row['status'] == '2')
                                    <div class="btn btn-sm btn-success">
                                        <i class="bi bi-check-square"></i>
                                    </div>
                                    @elseif ($row['status'] == '1')
                                    <div class="btn btn-sm btn-warning">
                                        <i class="bi bi-check-square"></i>
                                    </div>
                                    @else
                                    <button class="btn btn-sm btn-danger">Verifikasi</button>
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

        @endsection
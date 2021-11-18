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
                <h3>Data Dokumen SK</h3>
                <button class="btn btn-success shadow" data-bs-toggle="modal" data-bs-target="#layananModal"><i
                        class="bi bi-plus"></i></button>
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
                                <th scope="col">NIP</th>
                                <th scope="col">Nama</th>
                                <th scope="col">SK</th>
                                <th scope="col">Waktu Verifikasi</th>
                                <th scope="col">Jenis Layanan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach ($rows as $row)
                            <tr>
                                <th scope="row">{{ $i++ }}</th>
                                <td>{{ $row['nip'] }}</td>
                                <td>{{ $row['nama'] }}</td>
                                <td><a href="">SK</a></td>
                                <td>{{ $row['bkppd_verif_at'] ? date('Y-m-d H:m:s', $row['unit_verif_at']) : '' }}</td>
                                <td>{{ $row['nama_layanan'] }}</td>
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
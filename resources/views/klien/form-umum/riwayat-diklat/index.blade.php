@extends('admin.layouts.main')
@include('admin.layouts.header-klien')
@section('content')

<body>
    <div class="container-fluid">
        <div class="row">
            @include('admin.layouts.sidenav')
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="container">
                    @if(session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{session('success')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <div class="col-md-11 mt-2 mx-auto">
                        <div class="text-center my-4">
                            <h2>Data Diklat</h2>
                            <a href="/klien/dataumum/diklat/add" class="btn btn-success p-2 shadow"><i class="bi bi-plus"></i></a>
                        </div>
                        <form action="" method="get">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Cari..." name="search">
                                <button class="btn btn-outline-secondary" type="submit" id="search">Cari</button>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table class="table table-hover table-striped shadow">
                                <thead class="table-primary">
                                    <tr>

                                        <th scope="col">#</th>
                                        <th scope="col">Nama Lengkap</th>
                                        <th scope="col">Jenis Diklat</th>
                                        <th scope="col">Nama Diklat</th>
                                        <th scope="col">Tempat Diklat</th>
                                        <th scope="col">Penyelenggara</th>
                                        <th scope="col">Angka</th>
                                        <th scope="col">Tanggal Mulai</th>
                                        <th scope="col">Tanggal Selesai</th>
                                        <th scope="col">Jam</th>
                                        <th scope="col">No STTP</th>
                                        <th scope="col">Tanggal STTP</th>
                                        <th scope="col" class="text-center">Sertifikat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach ($rows as $row)
                                    <tr>

                                        <th scope="row">{{ $i++}}</th>
                                        <th scope="row">{{ $row['nama_peg']}}</th>
                                        <td scope="row">{{ $row["status"] }}</td>
                                        <td scope="row">{{ $row["nama"] }}</td>
                                        <td scope="row">{{ $row["tempat"] }}</td>
                                        <td scope="row">{{ $row["penyelenggara"] }}</td>
                                        <td scope="row">{{ $row["angka"] }}</td>
                                        <td scope="row">{{ $row["tgl_mulai"] }}</td>
                                        <td scope="row">{{ $row["tgl_selesai"] }}</td>
                                        <td scope="row">{{ $row["jam"] }}</td>
                                        <td scope="row">{{ $row["no_sttp"] }}</td>
                                        <td scope="row">{{ $row["tgl_sttp"] }}</td>
                                        <td scope="row" class="text-center"><a href="{{ $row['sertifikat'] }}" class="btn btn-primary"><i class="bi bi-file-earmark-pdf"></i></a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
        </div>
        <br>
        <div class="d-flex justify-content-center">
            {{$rows->links()}}
        </div>
        </main>
    </div>
    </div>
</body>


@endsection
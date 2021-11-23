@extends('admin.layouts.main')
@include('admin.layouts.header-klien')
@section('content')
<div class="container-fluid">
    <div class="row">
        @include('admin.layouts.sidenav')
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 mt-2">
                        <div class="text-center my-4">
                            <h2>Data Tanda jasa</h2>
                            <a href="/klien/dataumum/tandajasa/add" class="btn btn-success p-2 shadow"><i
                                    class="bi bi-plus"></i></a>
                        </div>
                        <br>
                        <form action="" method="get">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Cari..." name="search">
                                <button class="btn btn-outline-secondary" type="submit" id="search">Cari</button>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover shadow">
                                <thead class="table-primary">
                                    <tr>

                                        <th scope="col">#</th>
                                        <th scope="col">Nama Pegawai</th>
                                        <th scope="col">Nama Tanda Jasa</th>
                                        <th scope="col">Nomor SK</th>
                                        <th scope="col">Tanggal SK</th>
                                        <th scope="col">Tahun</th>
                                        <th scope="col">Asal Perolehan</th>
                                        <th scope="col" class="text-center">Sertifikat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $m = 1; ?>
                                    @foreach ($rows as $row)
                                    <tr>
                                        <th scope="row">{{ $m++}}</th>
                                        <td scope="row">{{ $row["nama_peg"] }}</td>
                                        <td scope="row">{{ $row["nama"] }}</td>
                                        <td scope="row">{{ $row["no_sk"] }}</td>
                                        <td scope="row">{{ $row["tgl_sk"] }}</td>
                                        <td scope="row">{{ $row["tahun"] }}</td>
                                        <td scope="row">{{ $row["asal_perolehan"] }}</td>
                                        <td scope="row" class="text-center"><a href="{{ $row['sertifikat'] }}"
                                                class="btn btn-primary"><i class="bi bi-file-earmark-pdf"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection
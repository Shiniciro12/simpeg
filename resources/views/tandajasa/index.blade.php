@extends('home.layouts.main')
@include('home.layouts.navbar')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-2">
            <form action="" method="get">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari..." name="search">
                    <button class="btn btn-outline-secondary" type="submit" id="search">Cari</button>
                  </div>
            </form>
            <div class="table-responsive">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Pegawai</th>
                    <th scope="col">Nama Tanda Jasa</th>
                    <th scope="col">Nomor SK</th>
                    <th scope="col">Tanggal SK</th>
                    <th scope="col">Tahun</th>
                    <th scope="col">Asal Perolehan</th>
                    <th scope="col">Sertifikat</th>
                    <th scope="col"><a href="/tandajasa/add" class="btn btn-success">Tambah+</a></th>
                  </tr>
                </thead>
                <tbody>
                    <?php $m = 1; ?>
                    @foreach ($rows as $row)
                  <tr>
                    <th scope="row">{{ $m++}}</th>
                    <td scope="row">{{ $row["nama_identitas"] }}</td>
                    <td scope="row">{{ $row["nama"] }}</td>
                    <td scope="row">{{ $row["no_sk"] }}</td>
                    <td scope="row">{{ $row["tgl_sk"] }}</td>
                    <td scope="row">{{ $row["tahun"] }}</td>
                    <td scope="row">{{ $row["asal_perolehan"] }}</td>
                    <td scope="row"><a href="{{ $row['sertifikat'] }}">pdf</a></td>
                    <td scope="row">
                    <a href="/tandajasa/update/{{ $row["tanda_jasa_id"] }}" class="btn btn-warning">Ubah</a>
                        <form action="/tandajasa/delete" method="post" class="d-inline">
                          @csrf
                            <input type="hidden" name="tanda_jasa_id" value="{{ $row["tanda_jasa_id"] }}">
                            <input type="hidden" name="sertifikat" value="{{ $row["sertifikat"] }}">
                            <button type="submit" class="btn btn-danger"
                              onclick="return confirm('Data ini akan dihapus. Lanjutkan?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>
        </div>
    </div>
</div>

@endsection

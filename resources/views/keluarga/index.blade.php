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

    <div class="col-md-12 mt-2">
      <div class="text-center my-4">
        <h2>Data Keluarga</h2>
        <a href="/keluarga/add" class="btn btn-success p-2 shadow"><i class="bi bi-plus"></i></a>
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
              <th scope="col"></th>
              <th scope="col">#</th>
              <th scope="col">Nama Pegawai</th>
              <th scope="col">NIK</th>
              <th scope="col">Nama</th>
              <th scope="col">Tempat Lahir</th>
              <th scope="col">Tanggal Lahir</th>
              <th scope="col">Jenis Kelamin</th>
              <th scope="col">Status Keluarga</th>
              <th scope="col">Status Kawin</th>
              <th scope="col">Tanggal Kawin</th>
              <th scope="col">Status Tunjangan</th>
              <th scope="col">Pendidikan</th>
              <th scope="col">Pekerjaan</th>
              <th scope="col">Alamat</th>
              <th scope="col">Desa/Kelurahan</th>
              <th scope="col">Kecamatan</th>
              <th scope="col">Kabupaten/Kota</th>
              <th scope="col">Provinsi</th>
              <th scope="col">Hp</th>
              <th scope="col">Telepon</th>
              <th scope="col">Kode Pos</th>
              <th scope="col">Dokumen</th>
            </tr>
          </thead>
          <tbody>
            <?php $k = 1; ?>
            @foreach ($rows as $row)
            <tr>
              <td scope="row">
                <a href="/keluarga/update/{{ $row["keluarga_id"] }}" class="btn btn-warning p-2 shadow"><i
                    class="bi bi-pencil-square"></i></a>
                <form action="/keluarga/delete" method="post" class="d-inline">
                  @csrf
                  <input type="hidden" name="keluarga_id" value="{{ $row["keluarga_id"] }}">
                  <input type="hidden" name="dokumen" value="{{ $row["dokumen"] }}">
                  <button type="submit" class="btn btn-danger p-2 shadow"
                    onclick="return confirm('Data ini akan dihapus. Lanjutkan?')"><i
                      class="bi bi-trash-fill"></i></button>
                </form>
              </td>
              <th scope="row">{{ $k++}}</th>
              <td scope="row">{{ $row["nama_peg"] }}</td>
              <td scope="row">{{ $row["nik"] }}</td>
              <td scope="row">{{ $row["nama"] }}</td>
              <td scope="row">{{ $row["tempat_lahir"] }}</td>
              <td scope="row">{{ $row["tgl_lahir"] }}</td>
              <td scope="row">{{ $row["jenis_kelamin"] }}</td>
              <td scope="row">{{ $row["status_keluarga"] }}</td>
              <td scope="row">{{ $row["status_kawin"] }}</td>
              <td scope="row">{{ $row["tgl_kawin"] }}</td>
              <td scope="row">{{ $row["status_tunjangan"] }}</td>
              <td scope="row">{{ $row["pendidikan"] }}</td>
              <td scope="row">{{ $row["pekerjaan"] }}</td>
              <td scope="row">{{ $row["alamat"] }}</td>
              <td scope="row">{{ $row["desa_kelurahan"] }}</td>
              <td scope="row">{{ $row["kecamatan"] }}</td>
              <td scope="row">{{ $row["kabupaten_kota"] }}</td>
              <td scope="row">{{ $row["provinsi"] }}</td>
              <td scope="row">{{ $row["hp"] }}</td>
              <td scope="row">{{ $row["telepon"] }}</td>
              <td scope="row">{{ $row["kode_pos"] }}</td>
              <td scope="row"><a href="{{ $row['dokumen'] }}">pdf</a></td>
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

@endsection
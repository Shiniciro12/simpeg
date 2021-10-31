@extends('home.layouts.main')
@include('home.layouts.navbar')
@section('content')
<div class="container">
  @if(session()->has('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{session('success')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif
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
            <th scope="col">Sertifikat</th>
            <th>
              <div class="row">
                <div class="col-md-4">
                  <a href="/diklat/add" class="btn btn-sm btn-success">Tambah+</a>
                </div>
            </th>
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
            <td scope="row"><a href="upload/sertifikat-diklat/{{ $row['sertifikat'] }}">pdf</a></td>
            <td scope="row">
              <div class="btn-group-vertical">
                <a href="/diklat/update/{{ $row["diklat_id"] }}" class="btn btn-warning">Ubah</a>
                <form action="/diklat/delete" method="post" class="d-inline">
                  @csrf
                  <input type="hidden" name="diklat_id" value="{{ $row["diklat_id"] }}">
                  <input type="hidden" name="sertifikat" value="{{ $row["sertifikat"] }}">
                  <button type="submit" class="btn btn-danger" onclick="return confirm('Data ini akan dihapus. Lanjutkan?')">Hapus</button>
                </form>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>

<div class="d-flex justify-content-center">
  {{$rows->links()}}
</div>

@endsection
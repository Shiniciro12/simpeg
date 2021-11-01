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
            <th scope="col">Tingkat Pendidikan</th>
            <th scope="col">Jurusan</th>
            <th scope="col">Nama Lembaga Pendidikan</th>
            <th scope="col">Tempat</th>
            <th scope="col">Nama Kepsek/Rektor</th>
            <th scope="col">No STTB</th>
            <th scope="col">Tanggal STTB</th>
            <th scope="col">STTB</th>
            <th>
              <div class="row">
                <div class="col-md-4">
                  <a href="/pendidikan/add" class="btn btn-sm btn-success">Tambah+</a>
                </div>
            </th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1; ?>
          @foreach ($rows as $row)
          <tr>
            <th scope="row">{{ $i++}}</th>
            <td scope="row">{{ $row["nama_peg"] }}</td>
            <td scope="row">{{ $row["tingkat_pendidikan"] }}</td>
            <td scope="row">{{ $row["jurusan"] }}</td>
            <td scope="row">{{ $row["nama_lembaga_pendidikan"] }}</td>
            <td scope="row">{{ $row["tempat"] }}</td>
            <td scope="row">{{ $row["nama_kepsek_rektor"] }}</td>
            <td scope="row">{{ $row["no_sttb"] }}</td>
            <td scope="row">{{ $row["tgl_sttb"] }}</td>
            <td scope="row"><a href="upload/sttb/{{ $row["sttb"] }}">pdf</a></td>
            <td scope="row">
              <div class="btn-group-vertical">
                <a href="/pendidikan/update/{{ $row["pendidikan_id"] }}" class="btn btn-warning">Ubah</a>
                <form action="/pendidikan/delete" method="post" class="d-inline">
                  @csrf
                  <input type="hidden" name="pendidikan_id" value="{{ $row["pendidikan_id"] }}">
                  <input type="hidden" name="sttb" value="{{ $row["sttb"] }}">
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
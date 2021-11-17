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
  <div class="col-md-11 mt-2 mx-auto">
    <div class="text-center my-4">
      <h2>Data Pendidikan</h2>
      <a href="/pendidikan/add" class="btn btn-success p-2 shadow"><i class="bi bi-plus"></i></a>
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
            <th></th>
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
          </tr>
        </thead>
        <tbody>
          <?php $i = 1; ?>
          @foreach ($rows as $row)
          <tr>
            <td scope="row">
              <div class="btn-group-vertical">
                <a href="/pendidikan/update/{{ $row[" pendidikan_id"] }}" class="btn btn-warning p-2 shadow"><i
                    class="bi bi-pencil-square"></i></a>
                <form action="/pendidikan/delete" method="post" class="d-inline">
                  @csrf
                  <input type="hidden" name="pendidikan_id" value="{{ $row[" pendidikan_id"] }}">
                  <input type="hidden" name="sttb" value="{{ $row[" sttb"] }}">
                  <button type="submit" class="btn btn-danger p-2 shadow"
                    onclick="return confirm('Data ini akan dihapus. Lanjutkan?')"><i
                      class="bi bi-trash-fill"></i></button>
                </form>
              </div>
            </td>
            <th scope="row">{{ $i++}}</th>
            <td scope="row">{{ $row["nama_peg"] }}</td>
            <td scope="row">{{ $row["tingkat_pendidikan"] }}</td>
            <td scope="row">{{ $row["jurusan"] }}</td>
            <td scope="row">{{ $row["nama_lembaga_pendidikan"] }}</td>
            <td scope="row">{{ $row["tempat"] }}</td>
            <td scope="row">{{ $row["nama_kepsek_rektor"] }}</td>
            <td scope="row">{{ $row["no_sttb"] }}</td>
            <td scope="row">{{ $row["tgl_sttb"] }}</td>
            <td scope="row"><a href="unggah/sttb/{{ $row[" sttb"] }}" class="btn btn-primary"><i
                  class="bi bi-file-earmark-pdf"></i></a></td>

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
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
    <div class="col-md-11 mt-2 mx-auto">
      <div class="text-center my-4">
        <h2>Data Riwayat Jabatan</h2>
        <a href="/riwayat-jabatan/add" class="btn btn-success p-2 shadow"><i class="bi bi-plus"></i></a>
      </div>
      <br>
      <form action="" method="get">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Cari..." name="search">
          <button class="btn btn-outline-secondary" type="submit" id="search">Cari</button>
        </div>
      </form>
      <div class="table-responsive">
        <table class="table table-hover table-striped">
          <thead class="table-primary">
            <tr>
              <th scope="col"> </th>
              <th scope="col">#</th>
              <th scope="col">Nama Jabatan</th>
              <th scope="col">Pegawai</th>
              <th scope="col">Pejabat</th>
              <th scope="col">No SK</th>
              <th scope="col">Tanggal SK</th>
              <th scope="col">TMT</th>
              <th scope="col" class="text-center">SK Jabatan</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            @foreach ($rows as $row)
            <tr>
              <td scope="row" style="text-align: center;">
                <a href="/riwayat-jabatan/update/{{ $row[" riwayat_jabatan_id"] }}"
                  class="btn btn-warning p-2 shadow""><i class=" bi bi-pencil-square"></i></a>
                <form action=" /riwayat-jabatan/delete" method="POST" class="d-inline">
                  @csrf
                  <input type="hidden" value="{{$row['riwayat_jabatan_id']}}" name="riwayat_jabatan_id">
                  <button class="btn btn-danger p-2 shadow"
                    onclick="return confirm('Apakah anda ingin menghapus data ini?')"><i
                      class="bi bi-trash-fill"></i></button>
                </form>
              </td>
              <th scope="row">{{ $i++}}</th>
              <td scope="row">{{ $row["nama_jabatan"] }}</td>
              <td scope="row">{{ $row["nama"] }}</td>
              <td scope="row">{{ $row["pejabat"] }}</td>
              <td scope="row" style="text-align: center">{{ $row["no_sk"] }}</td>
              <td scope="row" style="text-align: center">{{ $row["tgl_sk"] }}</td>
              <td scope="row">{{ $row["tmt_jabatan"] }}</td>
              <td scope="row" class="text-center"><a href="/upload/sk-jabatan/{{ $row[" sk_jabatan"] }}"
                  class="btn btn-primary"><i class="bi bi-file-earmark-pdf"></i></a></td>
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
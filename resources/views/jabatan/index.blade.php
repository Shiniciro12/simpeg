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

  <div class="row">
    <div class="col-md-11 mt-2 mx-auto">
      <div class="text-center my-4">
        <h2>Data Jabatan</h2>
        <a href="/jabatan/add" class="btn btn-success p-2 shadow"><i class="bi bi-plus"></i></a>
      </div>
      <br>
      <form action="" method="get">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Cari..." name="search">
          <button class="btn btn-outline-secondary" type="submit" id="search">Cari</button>
        </div>
      </form>
      <div class="table-responsive">
        <table class="table table-hover table-striped shadow">
          <thead>
            <tr class="table-primary">
              <th scope="col" class="text-center"></th>
              <th scope="col">#</th>
              <th scope="col">Jabatan</th>
              <th scope="col">Eselon</th>
              <th scope="col">Kelas</th>
              <th scope="col">Unit Kerja</th>
              <th scope="col">Jenis Jabatan</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            @foreach ($rows as $row)
            <tr>
              <th scope="row">{{ $i++}}</th>
              <td scope="row">{{ $row["nama_jabatan"] }}</td>
              <td scope="row">{{ $row["eselon"] }}</td>
              <td scope="row">{{ $row["kelas"]}}</td>
              <td scope="row">{{ $row["nama_unit"] }}</td>
              <td scope="row">{{ $row["jenis_jabatan"] }}</td>
              <td scope="row" style="text-align: center;">
                <a href="/jabatan/update/{{ $row['jabatan_id'] }}" class="btn btn-warning p-2 shadow"><i class="bi bi-pencil-square"></i></a>
                <form action="/jabatan/delete" class="d-inline" method="POST">
                  @csrf
                  <input type="hidden" value="{{$row['jabatan_id']}}" name="jabatan_id">
                  <button class="btn btn-danger p-2 shadow" onclick="return confirm('Apakah anda ingin menghapus data ini?')"><i class="bi bi-trash-fill"></i></button>
                </form>
              </td>
              <th scope="row">{{ $i++}}</th>
              <td scope="row">{{ $row["nama_jabatan"] }}</td>
              <td scope="row" class="text-center">{{ $row["eselon"] }}</td>
              <td scope="row" class="text-center">{{ $row["kelas"] }}</td>
              <td scope="row">{{ $row["nama_unit"] }}</td>
              <td scope="row" class="text-center">{{ $row["jenis_jabatan"] }}</td>
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
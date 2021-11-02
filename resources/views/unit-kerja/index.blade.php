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
        <h2>Data Unit Kerja</h2>
        <a href="/unit-kerja/add" class="btn btn-success p-2 shadow"><i class="bi bi-plus"></i></a>
      </div>
      <br>
      <div class="col-md-12 mt-2">
        <form action="" method="get">
          <div class="input-group mb-2">
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
                <th scope="col">Nama</th>
                <th scope="col">Alamat</th>
                <th scope="col">Lokasi</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              @foreach ($rows as $row)
              <tr>
                <td scope="row">
                  <a href="/unit-kerja/update/{{ $row["unit_kerja_id"] }}" class="btn btn-warning p-2 shadow"><i class="bi bi-pencil-square"></i></a>
                  <form action="/unit-kerja/delete" method="post" class="d-inline">
                    @csrf
                    <input type="hidden" name="unit_kerja_id" value="{{ $row["unit_kerja_id"] }}">
                    <button type="submit" class="btn btn-danger p-2 shadow" onclick="return confirm('Data ini akan dihapus. Lanjutkan?')"><i class="bi bi-trash-fill"></i></button>
                  </form>
                </td>
                <th scope="row">{{ $i++}}</th>
                <td scope="row">{{ $row["nama_unit"] }}</td>
                <td scope="row">{{ $row["alamat"] }}</td>
                <td scope="row">Lokasi</td>

              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<br>
<div class="d-flex justify-content-center">
  {{$rows->links()}}
</div>

@endsection
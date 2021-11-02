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
        <h2>Data Kelurahan</h2>
        <a href="/kelurahan/add" class="btn btn-success p-2 shadow"><i class="bi bi-plus"></i></a>
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
          <table class="table table-striped table-hover shadow">
            <thead class="table-primary">
              <tr>
                <th scope="col"></th>
                <th scope="col">#</th>
                <th scope="col">Nama Kelurahan</th>
                <th scope="col">Kode Pos</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              @foreach ($rows as $row)
              <tr>
                <td scope="row">
                  <a href="/kelurahan/update/{{ $row["kelurahan_id"] }}" class="btn btn-warning p-2 shadow"><i class="bi bi-pencil-square"></i></a>
                  <form action="/kelurahan/delete" method="post" class="d-inline">
                    @csrf
                    <input type="hidden" name="kelurahan_id" value="{{ $row["kelurahan_id"] }}">
                    <button type="submit" class="btn btn-danger p-2 shadow" onclick="return confirm('Data ini akan dihapus. Lanjutkan?')"><i class="bi bi-trash-fill"></i></button>
                  </form>
                </td>
                <th scope="row">{{ $i++}}</th>
                <td scope="row">{{ $row["nama_kelurahan"] }}</td>
                <td scope="row">{{ $row["kode_pos"] }}</td>

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
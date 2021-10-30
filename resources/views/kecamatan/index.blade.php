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
    <div class="col-md-4">
      <a href="/kecamatan/add" class="btn btn-success">Tambah</a>
    </div>
    <div class="col-md-12 mt-2">
      <form action="" method="get">
        <div class="input-group mb-2">
          <input type="text" class="form-control" placeholder="Cari..." name="search">
          <button class="btn btn-outline-secondary" type="submit" id="search">Cari</button>
        </div>
      </form>
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nama Kecamatan</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            @foreach ($rows as $row)
            <tr>
              <th scope="row">{{ $i++}}</th>
              <td scope="row">{{ $row["nama_kecamatan"] }}</td>
              <td scope="row">
                <a href="/kecamatan/update/{{ $row["kecamatan_id"] }}" class="btn btn-warning">Ubah</a>
                <form action="/kecamatan/delete" method="post" class="d-inline">
                  @csrf
                  <input type="hidden" name="kecamatan_id" value="{{ $row["kecamatan_id"] }}">
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

<div class="d-flex justify-content-center">
  {{$rows->links()}}
</div>

@endsection
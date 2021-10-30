@extends('home.layouts.main')
@include('home.layouts.navbar')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-4">
      <a href="/unit-kerja/add" class="btn btn-success">Tambah</a>
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
              <th scope="col">Nama</th>
              <th scope="col">Alamat</th>
              <th scope="col">Lokasi</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            @foreach ($rows as $row)
            <tr>
              <th scope="row">{{ $i++}}</th>
              <td scope="row">{{ $row["nama_unit"] }}</td>
              <td scope="row">{{ $row["alamat"] }}</td>
              <td scope="row">Lokasi</td>
              <td scope="row">
                <a href="/unit-kerja/update/{{ $row["unit_kerja_id"] }}" class="btn btn-warning">Ubah</a>
                <form action="/unit-kerja/delete" method="post" class="d-inline">
                  @csrf
                  <input type="hidden" name="unit_kerja_id" value="{{ $row["unit_kerja_id"] }}">
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
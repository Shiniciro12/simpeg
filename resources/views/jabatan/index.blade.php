@extends('home.layouts.main')
@include('home.layouts.navbar')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12 mt-2">
      <h3>Data Jabatan</h3>
      <br>
      <form action="" method="get">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Cari..." name="search">
          <button class="btn btn-outline-secondary" type="submit" id="search">Cari</button>
        </div>
      </form>
      <div class="table-responsive">
        <table class="table table-hover table-bordered">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Jabatan</th>
              <th scope="col">Eselon/Kelas</th>
              <th scope="col">Unit Kerja</th>
              <th scope="col">Jenis Jabatan</th>
              <th scope="col">
                <center><a href="/jabatan/add" class="btn btn-success btn-sm">Tambah +</a></center>
              </th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            @foreach ($rows as $row)
            <tr>
              <th scope="row">{{ $i++}}</th>
              <td scope="row">{{ $row["nama_jabatan"] }}</td>
              <td scope="row">{{ $row["eselon"] }}/{{ $row["kelas"]}}</td>
              <td scope="row">{{ $row["nama_unit"] }}</td>
              <td scope="row">{{ $row["jenis_jabatan"] }}</td>
              <td scope="row" style="text-align: center;">
                <a href="/jabatan/update/{{ $row["jabatan_id"] }}" class="btn btn-warning btn-sm" style="width: 60px;">Ubah</a>
                <form action="/jabatan/delete" method="POST">
                  @csrf
                  <input type="hidden" value="{{$row['jabatan_id']}}" name="jabatan_id">
                  <button class="btn btn-danger btn-sm" style="width: 60px;" onclick="return confirm('Apakah anda ingin menghapus data ini?')">Hapus</button>
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
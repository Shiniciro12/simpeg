@extends('home.layouts.main')
@include('home.layouts.navbar')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12 mt-2">
      <h3>Data Riwayat Jabatan</h3>
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
              <th scope="col">Nama Jabatan</th>
              <th scope="col">Pegawai</th>
              <th scope="col">Pejabat</th>
              <th scope="col">No SK</th>
              <th scope="col">Tanggal SK</th>
              <th scope="col">TMT</th>
              <th scope="col">SK Jabatan</th>
              <th scope="col">
                <center><a href="/riwayat-jabatan/add" class="btn btn-success btn-sm">Tambah+</a></center>
              </th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            @foreach ($rows as $row)
            <tr>
              <th scope="row">{{ $i++}}</th>
              <td scope="row">{{ $row["nama_jabatan"] }}</td>
              <td scope="row">{{ $row["nama"] }}</td>
              <td scope="row">{{ $row["pejabat"] }}</td>
              <td scope="row" style="text-align: center">{{ $row["no_sk"] }}</td>
              <td scope="row" style="text-align: center">{{ $row["tgl_sk"] }}</td>
              <td scope="row">{{ $row["tmt_jabatan"] }}</td>
              <td scope="row"><a href="/upload/sk-jabatan/{{ $row["sk_jabatan"] }}.pdf">SK.pdf</a></td>
              <td scope="row" style="text-align: center;">
                <a href="/riwayat-jabatan/update/{{ $row["riwayat_jabatan_id"] }}" class="btn btn-warning btn-sm" style="width: 60px;">Ubah</a>
                <form action="/riwayat-jabatan/delete" method="POST">
                  @csrf
                  <input type="hidden" value="{{$row['riwayat_jabatan_id']}}" name="riwayat_jabatan_id">
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
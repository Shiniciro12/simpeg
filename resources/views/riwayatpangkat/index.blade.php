@extends('home.layouts.main')
@include('home.layouts.navbar')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-4">
      <a href="/riwayatpangkat/add" class="btn btn-success">Tambah</a>
    </div>
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
              <th scope="col">Pangkat</th>
              <th scope="col">Identitas</th>
              <th scope="col">Pejabat</th>
              <th scope="col">Nomor SK</th>
              <th scope="col">Tanggal SK</th>
              <th scope="col">TMT Pangkat</th>
              <th scope="col">SK Pangkat</th>
              <th scope="col">Aksi</th>

            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            @foreach ($rows as $row)
            <tr>
              <th scope="row">{{ $i++}}</th>
              <td scope="row">{{ $row["pangkat"] }}</td>
              <td scope="row">{{ $row["nama"] }}</td>
              <td scope="row">{{ $row["pejabat"] }}</td>

              <td scope="row">{{ $row["no_sk"] }}</td>
              <td scope="row">{{ $row["tgl_sk"] }}</td>
              <td scope="row">{{ $row["tmt_pangkat"] }}</td>
              <td scope="row">{{ explode('/', $row['sk_pangkat'])[2] }}</td>

              <td scope="row">
                <a href="/riwayatpangkat/update/{{ $row->riwayat_pangkat_id }}" class="btn btn-success">Ubah</a>
                <form action="/riwayatpangkat/delete" method="post">
                  @csrf
                  <input type="hidden" value="{{ $row->riwayat_pangkat_id }}" name="riwayat_pangkat_id">
                  <input type="submit" class="btn btn-danger btn-sm"
                    onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" value="Hapus">
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
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
              <th scope="col">No</th>
              <th scope="col">Pangkat</th>
              <th scope="col">Identitas</th>
              <th scope="col">Pejabat</th>
              <th scope="col">Nomor SK</th>
              <th scope="col">Tanggal SK</th>
              <th scope="col">TMT Pangkat</th>
              <th scope="col">SK Pangkat</th>
              <th scope="col"> <a href="/riwayatpangkat/add" class="btn btn-success btn-sm">Tambah+</a></th>

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
              <td scope="row"><a download=".{{ $row[" tgl_sk"] }}.{{ $row["no_sk"] }}" href="{{ $row->sk_pangkat }}">{{
                  explode('/',
                  $row->sk_pangkat)[2]
                  }}</a></td>

              <td scope="row">
                <a href="/riwayatpangkat/update/{{ $row->riwayat_pangkat_id }}" class="btn btn-warning btn-sm">Ubah</a>
                <form action="/riwayatpangkat/delete" method="post">
                  @csrf
                  <input type="hidden" value="{{ $row->riwayat_pangkat_id }}" name="riwayat_pangkat_id">
                  <input type="hidden" value="{{ $row->sk_pangkat }}" name="sk_pangkat">
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
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
        <h2>Data Riwayat Pangkat</h2>
        <a href="/riwayatpangkat/add" class="btn btn-success p-2 shadow"><i class="bi bi-plus"></i></a>
      </div>
      <br>
      <div class="col-md-12 mt-2">
        <form action="" method="get">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Cari..." name="search">
            <button class="btn btn-outline-secondary" type="submit" id="search">Cari</button>
          </div>
        </form>
        <div class="table-responsive">
          <table class="table table-striped table-hover shadow">
            <thead class="table-primary">
              <tr>
                <th scope="col"></th>
                <th scope="col">No</th>
                <th scope="col">Pangkat</th>
                <th scope="col">Identitas</th>
                <th scope="col">Pejabat</th>
                <th scope="col">Nomor SK</th>
                <th scope="col">Tanggal SK</th>
                <th scope="col">TMT Pangkat</th>
                <th scope="col" class="text-center">SK Pangkat</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              @foreach ($rows as $row)
              <tr>
                <td scope="row">
                  <a href="/riwayatpangkat/update/{{ $row->riwayat_pangkat_id }}" class="btn btn-warning p-2 shadow"><i class="bi bi-pencil-square"></i></a>
                  <form action="/riwayatpangkat/delete" method="post" class="d-inline">
                    @csrf
                    <input type="hidden" value="{{ $row->riwayat_pangkat_id }}" name="riwayat_pangkat_id">
                    <input type="hidden" value="{{ $row->sk_pangkat }}" name="sk_pangkat">
                    <button type="submit" class="btn btn-danger p-2 shadow" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><i class="bi bi-trash-fill"></i></button>
                  </form>
                </td>
                <th scope="row">{{ $i++}}</th>
                <td scope="row">{{ $row["pangkat"] }}</td>
                <td scope="row">{{ $row["nama"] }}</td>
                <td scope="row">{{ $row["pejabat"] }}</td>

                <td scope="row">{{ $row["no_sk"] }}</td>
                <td scope="row">{{ $row["tgl_sk"] }}</td>
                <td scope="row">{{ $row["tmt_pangkat"] }}</td>
                <td class="text-center" scope="row"><a href="{{ $row->sk_pangkat }}" class="btn btn-primary shadow"><i class="bi bi-file-earmark-pdf"></i></a></td>
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
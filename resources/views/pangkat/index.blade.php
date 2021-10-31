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
              <th scope="col">Golongan</th>

              <th><a href="/pangkat/add" class="btn btn-success btn-sm">Tambah+</a></th>

            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            @foreach ($rows as $row)
            <tr>
              <th scope="row">{{ $i++}}</th>
              <td scope="row">{{ $row["pangkat"] }}</td>
              <td scope="row">{{ $row["golongan"] }}</td>

              <td scope="row">
              
                <a href="/pangkat/update/{{ $row[" pangkat_id"] }}" class="btn btn-warning btn-sm">Ubah</a>


                <form action="/pangkat/delete" method="post">
                  @csrf
                  <input type="hidden" value="{{ $row->pangkat_id }}" name="pangkat_id">
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
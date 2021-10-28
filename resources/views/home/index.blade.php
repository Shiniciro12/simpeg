@extends('home.layouts.main')
@include('home.layouts.navbar')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form action="" method="get">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari..." name="search">
                    <button class="btn btn-outline-secondary" type="submit" id="search">Cari</button>
                  </div>
            </form>
            <table class="table table-responsive">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">NIP</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Gelar (Depan)</th>
                    <th scope="col">Gelar (Belakang)</th>
                    <th scope="col">Tempat Lahir</th>
                    <th scope="col">Tanggal Lahir</th>
                    <th scope="col">Agama</th>
                  </tr>
                </thead>
                <tbody>
                    <?php $i = 0; ?>
                    @foreach ($rows->skip(1) as $row)
                  <tr>
                    <th scope="row">{{ $i++}}</th>
                    <td>{{ $row["nip"] }}</td>
                    <td>{{ $row["nama"] }}</td>
                    <td>{{ $row["gelar_depan"] }}</td>
                    <td>{{ $row["gelar_belakang"] }}</td>
                    <td>{{ $row["tempat_lahir"] }}</td>
                    <td>{{ $row["tgl_lahir"] }}</td>
                    <td>{{ $row["agama"] }}</td>
                </tr>
                @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>

<div class="d-flex justify-content-center">
    {{$rows->links()}}
</div>

@endsection

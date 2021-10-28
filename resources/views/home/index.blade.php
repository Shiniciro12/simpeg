@extends('home.layouts.main')
@include('home.layouts.navbar')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
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
                  <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                  </tr>
                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection

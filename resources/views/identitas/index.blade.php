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
    <div class="col-md-12 mt-2 mx-auto">
      <div class="text-center my-4">
        <h2>Data Identitas</h2>
        <a href="/identitas/add" class="btn btn-success p-2 shadow"><i class="bi bi-plus"></i></a>
      </div>
      <br>
      <div class="col-md-12 mt-2">
        <form action="" method="get">
          <div class="input-group mb-2">
            <input type="text" class="form-control" placeholder="Cari..." name="search">
            <button class="btn btn-outline-secondary" type="submit" id="search">Cari</button>
          </div>
        </form>
        <div class="table-responsive shadow">
          <table class="table table-hover table-striped">
            <thead>
              <tr class="table-primary">
                <th scope="col"></th>
                <th scope="col">#</th>
                <th scope="col">NIP</th>
                <th scope="col">Nama</th>
                <th scope="col">Gelar Depan</th>
                <th scope="col">Gelar Belakang</th>
                <th scope="col">Tempat Lahir</th>
                <th scope="col">Tanggal Lahir</th>
                <th scope="col">Agama</th>
                <th scope="col">Status Kepegawaian</th>
                <th scope="col">Jenis Kepegawaian</th>
                <th scope="col">Kedudukan Kepegawaian</th>
                <th scope="col">Bantuan Bepetarum PNS</th>
                <th scope="col">Tahun Bepetarum PNS</th>
                <th scope="col">Status Kawin</th>
                <th scope="col">RT/RW</th>
                <th scope="col">HP</th>
                <th scope="col">Telepon</th>
                <th scope="col">Kode Pos</th>
                <th scope="col">Kelurahan</th>
                <th scope="col">Kecamatan</th>
                <th scope="col">Gol. Darah</th>
                <th scope="col">Foto</th>
                <th scope="col">No. Karpeg</th>
                <th scope="col">No. Taspen</th>
                <th scope="col">NPWP</th>
                <th scope="col">BPJS</th>
                <th scope="col">No Karis/Karsu</th>
                <th scope="col">NIK</th>
                <th scope="col">Pangkat</th>
                <th scope="col">Golongan</th>
                <th scope="col">Jabatan</th>
                <th scope="col">Unit</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              @foreach ($rows as $row)
              <tr>
                <td scope="row" style="text-align: center;">
                  <a href="/identitas/update/{{ $row["identitas_id"] }}" class="btn btn-warning p-2 shadow"><i class="bi bi-pencil-square"></i></a>
                  <form action="/identitas/delete" method="post" class="d-inline">
                    @csrf
                    <input type="hidden" name="identitas_id" value="{{ $row["identitas_id"] }}">
                    <input type="hidden" name="foto" value="{{ $row["foto"] }}">
                    <button type="submit" class="btn btn-danger p-2 shadow" onclick="return confirm('Data ini akan dihapus. Lanjutkan?')"><i class="bi bi-trash-fill"></i></button>
                  </form>
                </td>
                <th scope="row">{{ $i++}}</th>
                <td scope="row">{{ $row["nip"] }}</td>
                <td scope="row">{{ $row["nama"] }}</td>
                <td scope="row">{{ $row["gelar_depan"] }}</td>
                <td scope="row">{{ $row["gelar_belakang"] }}</td>
                <td scope="row">{{ $row["tempat_lahir"] }}</td>
                <td scope="row">{{ $row["tgl_lahir"] }}</td>
                <td scope="row">{{ $row["agama"] }}</td>
                <td scope="row">{{ $row["status_kepegawaian"] }}</td>
                <td scope="row">{{ $row["jenis_kepegawaian"] }}</td>
                <td scope="row">{{ $row["kedudukan_kepegawaian"] }}</td>
                <td scope="row">{{ $row["bantuan_bepetarum_pns"] }}</td>
                <td scope="row">{{ $row["tahun_bantuan_bepetarum_pns"] }}</td>
                <td scope="row">{{ $row["status_kawin"] }}</td>
                <td scope="row">{{ $row["rt_rw"] }}</td>
                <td scope="row">{{ $row["hp"] }}</td>
                <td scope="row">{{ $row["telepon"] }}</td>
                <td scope="row">{{ $row["kode_pos"] }}</td>
                <td scope="row">{{ $row["nama_kelurahan"] }}</td>
                <td scope="row">{{ $row["nama_kecamatan"] }}</td>
                <td scope="row">{{ $row["golongan_darah"] }}</td>
                <td scope="row"><img src="{{ $row["foto"]}}" width="50" height="50"></td>
                <td scope="row">{{ $row["no_karpeg"] }}</td>
                <td scope="row">{{ $row["no_taspen"] }}</td>
                <td scope="row">{{ $row["npwp"] }}</td>
                <td scope="row">{{ $row["no_bpjs"] }}</td>
                <td scope="row">{{ $row["no_kariskarsu"] }}</td>
                <td scope="row">{{ $row["nik"] }}</td>
                <td scope="row">{{ $row["pangkat"] }}</td>
                <td scope="row">{{ $row["golongan"] }}</td>
                <td scope="row">{{ $row["nama_jabatan"] }}</td>
                <td scope="row">{{ $row["nama_unit"] }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </form>
    </div>
  </div>
</div>

<br>

<div class="d-flex justify-content-center">
  {{$rows->links()}}
</div>

@endsection
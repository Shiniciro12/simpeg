@extends('admin.layouts.main')
@include('admin.layouts.header-klien')
@section('content')
<div class="container-fluid">
  <div class="row">
    @include('admin.layouts.sidenav')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
      </div>

      <!-- <div class="card shadow p-3 mb-5 bg-body rounded"> -->
      <div class="card-body bg-light">
        <div class="row">
          <div class="col-lg-4">
            <img src="{{auth()->user()->foto ? auth()->user()->foto : '/unggah/identitas/foto/default.jpg'}}"
              class="rounded-3 img-thumbnail mb-2" onclick="browseFile()">
            <form action="/klien/update/foto" method="post">
              @csrf
              <span>*Klik foto untuk pilih file untuk mengubah foto</span>
              <div class="d-grid gap-1">
                <input type="file" name="foto" class="@error('foto') is-invalid @enderror" id="foto"
                  style="visibility: hidden">
                @error('foto')
                <div id="foto" class="invalid-feedback">
                  {{$message}}
                </div>
                @enderror
                <button type="submit" class="btn btn-primary btn-block" id="unggah">
                  <i class="bi bi-camera">&nbsp;Ubah</i>
                </button>
              </div>
            </form>
          </div>
          <div class="col-lg-8">
            <div class="table-responsive">
              <table class="table table-hover caption-top">
                <caption>Profil Pegawai</caption>
                <tbody>
                  <tr>
                    <th scope="row">Nama</th>
                    <td>{{auth()->user()->nama}}</td>
                  </tr>
                  <tr>
                    <th scope="row">NIP</th>
                    <td>{{auth()->user()->nip}}</td>
                  </tr>
                  <tr>
                    <th scope="row">Pangkat/Golongan</th>
                    <td>
                      <ul class="list-group">
                        @foreach ($pangkat as $row)
                        <li class="list-group-item">{{$row->pangkat}}</li>
                        @endforeach
                      </ul>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">Riwayat Jabatan</th>
                    <td>
                      <ul class="list-group">
                        @foreach ($jabatan as $row)
                        <li class="list-group-item">{{$row->nama_jabatan}}</li>
                        @endforeach
                      </ul>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">Riwayat Pendidikan</th>
                    <td>
                      <ul class="list-group">
                        @foreach ($pendidikan as $row)
                        <li class="list-group-item">{{$row->nama_lembaga_pendidikan}}</li>
                        @endforeach
                      </ul>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- </div> -->
      <hr>
      <div class="row">
        <div class="col-sm-12">
          <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h4 class="h4">Ajuan Layanan</h4>
          </div>
          <div class="row">
            @foreach ($layanan_khusus as $row)
            <div class="col-3 mb-4">
              <div class="card text-center">
                <div class="card-body">
                  @if ($row->status == 4)
                  <i class="bi bi-clipboard-check link-danger" style="font-size: 36px;"></i>
                  @elseif ($row->status == 3)
                  <i class="bi bi-clipboard-check link-warning" style="font-size: 36px;"></i>
                  @elseif ($row->status == 2)
                  <i class="bi bi-clipboard-check link-success" style="font-size: 36px;"></i>
                  @endif
                  <br><br>
                  <small class="card-text" style="color: black;"><b>{{$row->nama_layanan}}</b></small>
                </div>
              </div>
            </div>
            @endforeach

          </div>
        </div>
      </div>
    </main>
  </div>
</div>
@endsection
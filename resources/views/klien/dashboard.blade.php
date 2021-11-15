@extends('admin.layouts.main')
@include('admin.layouts.header-klien')
@section('content')
  <body>
<div class="container-fluid">
  <div class="row">
   @include('admin.layouts.sidenav')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
      </div>
      
      <!-- <div class="card shadow p-3 mb-5 bg-body rounded"> -->
        <div class="card-body bg-light">
          <div class="row">
              <div class="col-lg-4">
                  <img src="/images/bv.jpg" class="rounded-3 img-thumbnail">
                  <br><br>
                  <div class="d-grid gap-2">
                  <button type="button" class="btn btn-warning btn-block" href="#">
                    <i class="bi bi-pencil-square">&nbsp;Edit</i>
                  </button>
                  <button type="button" class="btn btn-primary btn-block" href="#">
                    <i class="bi bi-camera">&nbsp;Upload Foto</i>
                  </button>
                </div>
              </div>
              <div class="col-lg-8">
                <div class="table-responsive">
                  <table class="table table-hover caption-top">
                    <caption>Profil Pegawai</caption>
                    <tbody>
                      <tr>
                        <th scope="row">Nama</th>
                        <td>Mark Johansson</td>
                      </tr>
                      <tr>
                        <th scope="row">NIP</th>
                        <td>19870304050601003</td>
                      </tr>
                      <tr>
                        <th scope="row">Pangkat/Golongan</th>
                        <td>Penata/III D</td>
                      </tr>
                      <tr>
                        <th scope="row">Riwayat Pendidikan</th>
                        <td>SD Negeri 1 Surabaya</td>
                      </tr>
                      <tr>
                        <th scope="row"></th>
                        <td>SMP Swastiastu Denpasar</td>
                      </tr>
                      <tr>
                        <th scope="row"></th>
                        <td>SMA Geovani Kota Kupang</td>
                      </tr>
                      <tr>
                        <th scope="row"></th>
                        <td>S1-Teknik Informatika/Universitas Gunadarma Jakarta</td>
                      </tr>
                      <tr>
                        <th scope="row"></th>
                        <td>S2-Manajemen Bisnis/Universitas Atmajaya Yogyakarta</td>
                      </tr>
                      <tr>
                        <th scope="row"></th>
                        <td>S3/Institut Teknologi Bandung</td>
                      </tr>
                      <tr>
                        <th scope="row">Jabatan</th>
                        <td>Kepala Seksi Bidang Pengembangan e-Government</td>
                      </tr>
                      <tr>
                        <th scope="row">Hukuman Displin</th>
                        <td colspan="2">Pernah/Tidak Pernah</td>
                      </tr>
                    </tbody>
                  </table>
              </div>
              </div>
          </div>
        </div>
      <!-- </div> -->
     
    </main>
  </div>
</div>
</body>
@endsection

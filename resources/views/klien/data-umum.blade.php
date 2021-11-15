@extends('admin.layouts.main')
@include('admin.layouts.header-klien')
@section('content')
<body>
<div class="container-fluid">
  <div class="row">
  @include('admin.layouts.sidenav')

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Umum</h1>
      </div>
      
      <!-- <div class="card shadow p-3 mb-5 bg-body rounded"> -->
        <div class="card-body">
            <div class="alert alert-success" role="alert">
                Silahkan pilih menu berikut untuk mengisi data
            </div>
        <!-- Row Pertama -->
          <div class="row">
              <div class="col-3">
                   <div class="card text-center">
                     <a href="/" class="link-light">
                       <div class="card-body">
                           <i class="bi bi-person-check link-primary" style="font-size: 36px;"></i><br><br>
                            <small class="card-text" style="color: black;"><b>Riwayat Ubah Identitas</b></small>
                        </div>
                      </a>
                        <div class="card-footer bg-danger text-light">
                            <small><b>Belum Selesai</b></small>
                        </div>
                    </div>          
              </div>     

              <div class="col-3">
                    <div class="card text-center">
                     <a href="/" class="link-light">
                       <div class="card-body">
                           <i class="bi bi-clipboard-check link-primary" style="font-size: 36px;"></i><br><br>
                            <small class="card-text" style="color: black;"><b>Riwayat Pangkat/Golongan</b></small>
                        </div>
                      </a>
                        <div class="card-footer bg-success text-light">
                            <small><b>Selesai</b></small>
                        </div>
                    </div>         
              </div>
              <div class="col-3">
                   <div class="card text-center">
                     <a href="/" class="link-light">
                       <div class="card-body">
                           <i class="bi bi-files link-primary" style="font-size: 36px;"></i><br><br>
                            <small class="card-text" style="color: black;"><b>Riwayat Pendidikan</b></small>
                        </div>
                      </a>
                        <div class="card-footer bg-danger text-light">
                            <small><b>Belum Selesai</b></small>
                        </div>
                    </div>     
              </div>
              <div class="col-3">
                    <div class="card text-center">
                     <a href="/" class="link-light">
                       <div class="card-body">
                           <i class="bi bi-bookmarks link-primary" style="font-size: 36px;"></i><br><br>
                            <small class="card-text" style="color: black;"><b>Riwayat Jabatan</b></small>
                        </div>
                      </a>
                        <div class="card-footer bg-danger text-light">
                            <small><b>Belum Selesai</b></small>
                        </div>
                    </div>     
              </div>
          </div>
          <!-- End Row Pertama -->
            <br>
          <!-- Row Kedua -->
          <div class="row">
              <div class="col-3">
                   <div class="card text-center">
                     <a href="/" class="link-light">
                       <div class="card-body">
                           <i class="bi bi-easel link-primary" style="font-size: 36px;"></i><br><br>
                            <small class="card-text" style="color: black;"><b>Riwayat Diklat</b></small>
                        </div>
                      </a>
                        <div class="card-footer bg-danger text-light">
                            <small><b>Belum Selesai</b></small>
                        </div>
                    </div>          
              </div>     

              <div class="col-3">
                    <div class="card text-center">
                     <a href="/" class="link-light">
                       <div class="card-body">
                           <i class="bi bi-people link-primary" style="font-size: 36px;"></i><br><br>
                            <small class="card-text" style="color: black;"><b>Riwayat Keluarga</b></small>
                        </div>
                      </a>
                        <div class="card-footer bg-danger text-light">
                            <small><b>Belum Selesai</b></small>
                        </div>
                    </div>         
              </div>
              <div class="col-3">
                   <div class="card text-center">
                     <a href="/" class="link-light">
                       <div class="card-body">
                           <i class="bi bi-award link-primary" style="font-size: 36px;"></i><br><br>
                            <small class="card-text" style="color: black;"><b>Riwayat Tanda Jasa</b></small>
                        </div>
                      </a>
                        <div class="card-footer bg-danger text-light">
                            <small><b>Belum Selesai</b></small>
                        </div>
                    </div>     
              </div>
              <div class="col-3">
                    <div class="card text-center">
                     <a href="/" class="link-light">
                       <div class="card-body">
                           <i class="bi bi-briefcase link-primary" style="font-size: 36px;"></i><br><br>
                            <small class="card-text" style="color: black;"><b>Unit Kerja</b></small>
                        </div>
                      </a>
                        <div class="card-footer bg-danger text-light">
                            <small><b>Belum Selesai</b></small>
                        </div>
                    </div>     
              </div>
          </div>
          <!-- End Row Kedua -->
          <br>

        </div>
      <!-- </div> -->
     
    </main>
  </div>
</div>
</body>


@endsection
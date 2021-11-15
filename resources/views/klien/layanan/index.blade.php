@extends('admin.layouts.main')
@include('admin.layouts.header-klien')
@section('content')
<body>
<div class="container-fluid">
  <div class="row">
  @include('admin.layouts.sidenav')

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Layanan</h1>
      </div>
      
      <!-- <div class="card shadow p-3 mb-5 bg-body rounded"> -->
        <div class="card-body">
            <div class="alert alert-success" role="alert">
                Silahkan Klik Layanan dibawah ini untuk mengisi form
            </div>
        <!-- Row Pertama -->
          <div class="row">
              <div class="col-3">
                   <div class="card text-center">
                     <a href="/klien/layanan/form1" class="link-light">
                       <div class="card-body">
                           <i class="bi bi-clipboard-check link-primary" style="font-size: 36px;"></i><br><br>
                            <small class="card-text" style="color: black;"><b>Layanan Satya</b></small>
                        </div>
                      </a>
                    </div>          
              </div>     

              <div class="col-3">
                    <div class="card text-center">
                     <a href="/klien/layanan/form1" class="link-light">
                       <div class="card-body">
                           <i class="bi bi-clipboard-check link-primary" style="font-size: 36px;"></i><br><br>
                            <small class="card-text" style="color: black;"><b>Layanan Ibel/Tubel</b></small>
                        </div>
                      </a>
                    </div>         
              </div>
              <div class="col-3">
                   <div class="card text-center">
                     <a href="/klien/layanan/form1" class="link-light">
                       <div class="card-body">
                           <i class="bi bi-clipboard-check link-primary" style="font-size: 36px;"></i><br><br>
                            <small class="card-text" style="color: black;"><b>Layanan Mutasi Kenaikan Pangkat Penyesuaian Ijasah</b></small>
                        </div>
                      </a>
                    </div>     
              </div>
              <div class="col-3">
                    <div class="card text-center">
                     <a href="/klien/layanan/form1" class="link-light">
                       <div class="card-body">
                           <i class="bi bi-clipboard-check link-primary" style="font-size: 36px;"></i><br><br>
                            <small class="card-text" style="color: black;"><b>Layanan Mutasi Pelayanan Kenaikan Pangkat Jabatan Fungsional Tertentu</b></small>
                        </div>
                      </a>
                    </div>     
              </div>
          </div>
          <!-- End Row Pertama -->
            <br>

            <!-- Row Kedua -->
          <div class="row">
              <div class="col-3">
                   <div class="card text-center">
                     <a href="/klien/layanan/form1" class="link-light">
                       <div class="card-body">
                           <i class="bi bi-clipboard-check link-primary" style="font-size: 36px;"></i><br><br>
                            <small class="card-text" style="color: black;"><b>Pelayanan Kenaikan Pangkat Reguler</b></small>
                        </div>
                      </a>
                    </div>          
              </div>     

              <div class="col-3">
                    <div class="card text-center">
                     <a href="/klien/layanan/form1" class="link-light">
                       <div class="card-body">
                           <i class="bi bi-clipboard-check link-primary" style="font-size: 36px;"></i><br><br>
                            <small class="card-text" style="color: black;"><b>Layanan Kenaikan Pangkat Jabatan Struktural</b></small>
                        </div>
                      </a>
                    </div>         
              </div>
              <div class="col-3">
                   <div class="card text-center">
                     <a href="/klien/layanan/form1" class="link-light">
                       <div class="card-body">
                           <i class="bi bi-clipboard-check link-primary" style="font-size: 36px;"></i><br><br>
                            <small class="card-text" style="color: black;"><b>Layanan Kelengkapan Mutasi Struktural</b></small>
                        </div>
                      </a>
                    </div>     
              </div>
              <div class="col-3">
                    <div class="card text-center">
                     <a href="/klien/layanan/form1" class="link-light">
                       <div class="card-body">
                           <i class="bi bi-clipboard-check link-primary" style="font-size: 36px;"></i><br><br>
                            <small class="card-text" style="color: black;"><b>Layanan Pengurusan SK Pensiun BUP</b></small>
                        </div>
                      </a>
                    </div>     
              </div>
          </div>
          <!-- End Row Kedua -->
            <br>

        <!-- Row Ketiga -->
        <div class="row">
              <div class="col-3">
                   <div class="card text-center">
                     <a href="/klien/layanan/form1" class="link-light">
                       <div class="card-body">
                           <i class="bi bi-clipboard-check link-primary" style="font-size: 36px;"></i><br><br>
                            <small class="card-text" style="color: black;"><b>Layanan Pengurusan SK Pensiun Dini</b></small>
                        </div>
                      </a>
                    </div>          
              </div>     

              <div class="col-3">
                    <div class="card text-center">
                     <a href="/klien/layanan/form1" class="link-light">
                       <div class="card-body">
                           <i class="bi bi-clipboard-check link-primary" style="font-size: 36px;"></i><br><br>
                            <small class="card-text" style="color: black;"><b>Layanan Pengurusan SK Pensiun Janda/Duda</b></small>
                        </div>
                      </a>
                    </div>         
              </div>
              <div class="col-3">
                      
              </div>
              <div class="col-3">
                      
              </div>
          </div>
          <!-- End Row Ketiga -->
            <br>

        </div>
      <!-- </div> -->
     
    </main>
  </div>
</div>
</body>


@endsection
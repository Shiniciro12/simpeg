@extends('admin.layouts.main')
@include('admin.layouts.header-klien')
@section('content')
<body>
<div class="container-fluid">
  <div class="row">
  @include('admin.layouts.sidenav')

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Khusus</h1>
      </div>
      
      <!-- <div class="card shadow p-3 mb-5 bg-body rounded"> -->
        <div class="card-body">
            <div class="alert alert-success" role="alert">
               Silahkan pilih menu template surat untuk mengunduh format surat atau menu layanan untuk mengupload dokumen 
            </div>
        <!-- Row Pertama -->
          <div class="row">
              <div class="col-6">
                   <div class="card text-center">
                     <a href="/klien/layanan/index" class="link-light">
                       <div class="card-body">
                           <i class="bi bi-files link-primary" style="font-size: 44px;"></i><br><br>
                            <small class="card-text" style="color: black;"><b>Layanan</b></small>
                        </div>
                      </a>
                    </div>          
              </div>     

              <div class="col-6">
                    <div class="card text-center">
                     <a href="/klien/layanan/listsurat" class="link-light">
                       <div class="card-body">
                           <i class="bi bi-files link-primary" style="font-size: 44px;"></i><br><br>
                            <small class="card-text" style="color: black;"><b>Template Surat</b></small>
                        </div>
                      </a>
                    </div>         
              </div>
            
          </div>
          <!-- End Row Pertama -->
        </div>
      <!-- </div> -->
    </main>
  </div>
</div>
</body>


@endsection
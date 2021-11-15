@extends('admin.layouts.main')
@include('admin.layouts.header-klien')
@section('content')
<body>
<div class="container-fluid">
  <div class="row">
  @include('admin.layouts.sidenav')

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Template Surat</h1>
      </div>

      <div class="alert alert-success" role="alert">
                        Silahkan Klik Surat dibawah ini untuk mendapatkan format surat 
                        </div>

 
            <div class="row">
                    <div class="col-md-12">
                        <ul class="list-group">
                            <li class="list-group-item"><a href="/template_surat/Daftar Riwayat Hidup.pdf" class="nav-link">Daftar Riwayat Hidup</a></li>
                            <li class="list-group-item"><a href="/template_surat/Laporan Perkawinan Janda Duda.pdf" class="nav-link">Laporan Perkawinan Janda Duda</a></li>
                            <li class="list-group-item"><a href="/template_surat/Laporan Perkawinan Pertama.pdf" class="nav-link">Laporan Perkawinan Pertama</a></li>
                        </ul>
                    </div>
                </div>
      <!-- <div class="card shadow p-3 mb-5 bg-body rounded"> -->
        
      <!-- </div> -->
     
    </main>
  </div>
</div>
</body>


@endsection
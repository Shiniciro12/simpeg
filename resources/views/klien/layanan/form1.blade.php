@extends('admin.layouts.main')
@include('admin.layouts.header-klien')
@section('content')

<body>
  <div class="container-fluid">
    <div class="row">
      @include('admin.layouts.sidenav')

      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
          <h1 class="h2">Layanan</h1>
        </div>

        <div class="alert alert-success" role="alert">
          Layanan adalah ...
        </div>

        <div class="row">
          <div class="col-md-10">
            <form action="" method="">
              @csrf
              <div class="mb-3">
                <label for="nip" class="form-label">NIP</label>
                <input type="text" class="form-control" id="nip" disabled>
              </div>
              <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" disabled>
                <hr>
                <div class="mb-3">
                  <label for="formFile" class="form-label">Upload File</label>
                  <input class="form-control" type="file" id="formFile">
                </div>
                <button class="btn btn-primary rounded-pill">Kirim</button>
            </form>
          </div>
        </div>
        <!-- <div class="card shadow p-3 mb-5 bg-body rounded"> -->

        <!-- </div> -->

      </main>
    </div>
  </div>
</body>

@endsection
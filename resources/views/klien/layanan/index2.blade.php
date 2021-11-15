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
                            Layanan  adalah ...
                        </div>
        
      <ul class="nav nav-tabs tab-center" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Layanan 1</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Layanan 2</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Layanan 3</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home2" type="button" role="tab" aria-controls="home2" aria-selected="true">Layanan 4</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile2" type="button" role="tab" aria-controls="profile2" aria-selected="false">Layanan 5</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact2" type="button" role="tab" aria-controls="contact2" aria-selected="false">Layanan 6</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home3" type="button" role="tab" aria-controls="home3" aria-selected="true">Layanan 7</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile3" type="button" role="tab" aria-controls="profile3" aria-selected="false">Layanan 8</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact3" type="button" role="tab" aria-controls="contact3" aria-selected="false">Layanan 9</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact5" type="button" role="tab" aria-controls="contact5" aria-selected="false">Layanan 10</button>
        </li>
      </ul>

        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <br>    
            <div class="row">
                    <div class="col-md-10">
                        <form action="" method="">
                        @csrf
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nama">
                            </div>
                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <textarea class="form-control" id="keterangan" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Upload File</label>
                                <input class="form-control" type="file" id="formFile">
                            </div>
                            <button class="btn btn-primary rounded-pill">Kirim</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <br>    
            <div class="row">
                    <div class="col-md-10">
                        <form action="" method="">
                        @csrf
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama DUA</label>
                                <input type="text" class="form-control" id="nama">
                            </div>
                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan DUA</label>
                                <textarea class="form-control" id="keterangan" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Upload File</label>
                                <input class="form-control" type="file" id="formFile">
                            </div>
                            <button class="btn btn-primary rounded-pill">Kirim</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
            <br>    
            <div class="row">
                    <div class="col-md-10">
                        <form action="" method="">
                        @csrf
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama TIGA</label>
                                <input type="text" class="form-control" id="nama">
                            </div>
                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan TIGA</label>
                                <textarea class="form-control" id="keterangan" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Upload File</label>
                                <input class="form-control" type="file" id="formFile">
                            </div>
                            <button class="btn btn-primary rounded-pill">Kirim</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
            <br>    
            <div class="row">
                    <div class="col-md-10">
                        <form action="" method="">
                        @csrf
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama TIGA</label>
                                <input type="text" class="form-control" id="nama">
                            </div>
                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan TIGA</label>
                                <textarea class="form-control" id="keterangan" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Upload File</label>
                                <input class="form-control" type="file" id="formFile">
                            </div>
                            <button class="btn btn-primary rounded-pill">Kirim</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
            <br>    
            <div class="row">
                    <div class="col-md-10">
                        <form action="" method="">
                        @csrf
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama TIGA</label>
                                <input type="text" class="form-control" id="nama">
                            </div>
                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan TIGA</label>
                                <textarea class="form-control" id="keterangan" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Upload File</label>
                                <input class="form-control" type="file" id="formFile">
                            </div>
                            <button class="btn btn-primary rounded-pill">Kirim</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
            <br>    
            <div class="row">
                    <div class="col-md-10">
                        <form action="" method="">
                        @csrf
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama TIGA</label>
                                <input type="text" class="form-control" id="nama">
                            </div>
                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan TIGA</label>
                                <textarea class="form-control" id="keterangan" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Upload File</label>
                                <input class="form-control" type="file" id="formFile">
                            </div>
                            <button class="btn btn-primary rounded-pill">Kirim</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>



      <!-- <div class="card shadow p-3 mb-5 bg-body rounded"> -->
        
      <!-- </div> -->
     
    </main>
  </div>
</div>
</body>


@endsection
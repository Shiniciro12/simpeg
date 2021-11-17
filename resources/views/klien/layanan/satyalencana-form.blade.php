@extends('admin.layouts.main')
@include('admin.layouts.header-klien')
@section('content')

<body>
  <div class="container-fluid">
    <div class="row">
      @include('admin.layouts.sidenav')

      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
          <h1 class="h2">Satya Lencana</h1>
        </div>  
        <div class="row">
          <div class="col-md-10 mx-auto">

            <div class="alert alert-success" role="alert">
              Satya Lencana adalah salah satu tanda jasa atau tanda kehormatan di Indonesia yang diberikan oleh pemerintah Indonesia baik kepada instansi maupun perorangan.
            </div>
            <form action="/klien/layanan/satyaadd" method="POST" enctype="multipart/form-data">
              @csrf
              {{-- Jenis Layanan --}}
              <input type="hidden" value="Satya Lencana" name="jenis">
              
              <div class="mb-3">
                <label for="nip" class="form-label">NIP</label>
                <input type="text" class="form-control" id="nip" value="{{auth()->user()->nip}}" disabled>
              </div>
              <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" value="{{auth()->user()->nama}}" disabled>
                <br>
                
                {{-- FORM UPLOAD BUAT LAYANAN --}}
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="mb-3">
                          <label for="formFile" class="form-label">Surat Permohonan</label>
                          <input class="form-control @error('surat_permohonan') is-invalid @enderror" type="file" name="surat_permohonan" id="surat_permohonan" accept=".pdf">
                          @error('surat_permohonan')
                          <div id="surat_permohonan" class="invalid-feedback">
                            {{$message}}
                          </div>
                          @enderror
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="mb-3">
                          <label for="formFile" class="form-label">FC SK Penganugerahan Satya Lencana Terakhir (Bagi Yang Memiliki)</label>
                          <input class="form-control @error('fcskp') is-invalid @enderror" type="file" name="fcskp" id="fcskp" accept=".pdf">
                          @error('fcskp')
                          <div id="fcskp" class="invalid-feedback">
                            {{$message}}
                          </div>
                          @enderror
                        </div>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="mb-3">
                          <label for="formFile" class="form-label">Surat Keterangan Tidak Pernah Dijatuhi Hukuman Disiplin Berat atau Sedang</label>
                          <input class="form-control @error('sktp') is-invalid @enderror" type="file" name="sktp" id="sktp" accept=".pdf">
                          @error('sktp')
                          <div id="sktp" class="invalid-feedback">
                            {{$message}}
                          </div>
                          @enderror

                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="mb-3">
                          <label for="formFile" class="form-label">Daftar Riwayat Hidup</label>
                          <input class="form-control @error('drh') is-invalid @enderror" type="file" name="drh" id="drh" accept=".pdf">
                          @error('drh')
                          <div id="drh" class="invalid-feedback">
                            {{$message}}
                          </div>
                          @enderror
                        </div>
                        <button class="btn btn-primary rounded-pill" type="submit" style="float:right">Kirim</button>
            </form>
          </div>
        </div>
    </div>
  </div>
  </div>
  </div>
  </main>
  </div>
  </div>
</body>

@endsection
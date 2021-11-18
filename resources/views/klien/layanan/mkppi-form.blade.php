@extends('admin.layouts.main')
@include('admin.layouts.header-klien')
@section('content')

<body>
  <div class="container-fluid">
    <div class="row">
      @include('admin.layouts.sidenav')

      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
          <h1 class="h2">Mutasi Kenaikan Pangkat Penyesuaian Ijazah</h1>
        </div>  
        <div class="row">
          <div class="col-md-10 mx-auto">
            <form action="/klien/layanan/mkppiadd" method="POST" enctype="multipart/form-data">
              @csrf
              {{-- Jenis Layanan --}}
              <input type="hidden" value="{{$jenis_layanan->jenis_layanan_id}}" name="jenis">
              
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
                          <label for="formFile" class="form-label">FC Petikan SK, SPP dan SPMT (Semua Jabatan)</label>
                          <input class="form-control @error('fcpsss') is-invalid @enderror" type="file" name="fcpsss" id="fcpsss" accept=".pdf">
                          @error('fcpsss')
                          <div id="fcpsss" class="invalid-feedback">
                            {{$message}}
                          </div>
                          @enderror
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="mb-3">
                          <label for="formFile" class="form-label">FC SKP 2 Tahun Terakhir</label>
                          <input class="form-control @error('fcskptt') is-invalid @enderror" type="file" name="fcskptt" id="fcskptt" accept=".pdf">
                          @error('fcskptt')
                          <div id="fcskptt" class="invalid-feedback">
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
                          <label for="formFile" class="form-label">FC SK Jabatan, SPP dan SPMT Atasan Langsung/Pejabat Penilai Terbaru</label>
                          <input class="form-control @error('fsjssal') is-invalid @enderror" type="file" name="fsjssal" id="fsjssal" accept=".pdf">
                          @error('fsjssal')
                          <div id="fsjssal" class="invalid-feedback">
                            {{$message}}
                          </div>
                          @enderror
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="mb-3">
                          <label for="formFile" class="form-label">FC SK Mutasi Wilayah Kerja (SK Pangkat Terakhir Bukan Kota Kupang)</label>
                          <input class="form-control @error('fcskmwk') is-invalid @enderror" type="file" name="fcskmwk" id="fcskmwk" accept=".pdf">
                          @error('fcskmwk')
                          <div id="fcskmwk" class="invalid-feedback">
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
                          <label for="formFile" class="form-label">FC Konversi NIP</label>
                          <input class="form-control @error('fckn') is-invalid @enderror" type="file" name="fckn" id="fckn" accept=".pdf">
                          @error('fckn')
                          <div id="fckn" class="invalid-feedback">
                            {{$message}}
                          </div>
                          @enderror
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="mb-3">
                          <label for="formFile" class="form-label">FC DRH</label>
                          <input class="form-control @error('fcdrh') is-invalid @enderror" type="file" name="fcdrh" id="fcdrh" accept=".pdf">
                          @error('fcdrh')
                          <div id="fcdrh" class="invalid-feedback">
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
                          <label for="formFile" class="form-label">FC Surat Tanda Lulus Ujian Penyesuaian Ijazah (STLUPI), Kecuali Ikazah yang Diperoleh Dari Tugas Belajar</label>
                          <input class="form-control @error('fctlupi') is-invalid @enderror" type="file" name="fctlupi" id="fctlupi" accept=".pdf">
                          @error('fctlupi')
                          <div id="fctlupi" class="invalid-feedback">
                            {{$message}}
                          </div>
                          @enderror
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="mb-3">
                          <label for="formFile" class="form-label">Asli Surat Keterangan Uraian Tugas Yang Ditanda Tangani Pejabat Eselon II</label>
                          <input class="form-control @error('askuty') is-invalid @enderror" type="file" name="askuty" id="askuty" accept=".pdf">
                          @error('askuty')
                          <div id="askuty" class="invalid-feedback">
                            {{$message}}
                          </div>
                          @enderror
                        </div>
                      </div>
                    </div>
                      
                    </div>
                    <button class="btn btn-primary rounded-pill" type="submit" style="float:right">Kirim</button>
                  </div>
                </div>
              </div>
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
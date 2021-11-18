@extends('admin.layouts.main')
@include('admin.layouts.header-klien')
@section('content')

<body>
  <div class="container-fluid">
    <div class="row">
      @include('admin.layouts.sidenav')

      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
          <h1 class="h2">Izin Belajar</h1>
        </div>  
        <div class="row">
          <div class="col-md-10 mx-auto">

            <div class="alert alert-success" role="alert">
              Izin belajar dan tugas belajar bagi PNS adalah bentuk dukungan pemerintah dalam meningkatkan kapasitas dan kemampuan sumber daya manusia, khususnya yang bekerja dalam bidang pelayanan publik.
            </div>
            <form action="/klien/layanan/ibeladd" method="POST" enctype="multipart/form-data">
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
                          <label for="formFile" class="form-label">Surat Permohonan Tugas Belajar Kepada Walikota Kupang Cq. Kepala BKPPD Kota Kupang</label>
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
                          <label for="formFile" class="form-label">Surat Persetujuan Pimpinan Instansi/Unit Kerja untuk mengikuti Tugas Belajar</label>
                          <input class="form-control @error('surat_persetujuan') is-invalid @enderror" type="file" name="surat_persetujuan" id="surat_persetujuan" accept=".pdf">
                          @error('surat_persetujuan')
                          <div id="surat_persetujuan" class="invalid-feedback">
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
                          <label for="formFile" class="form-label">FC SKP 2 Tahun Terakhir</label>
                          <input class="form-control @error('fcskp') is-invalid @enderror" type="file" name="fcskp" id="fcskp" accept=".pdf">
                          @error('fcskp')
                          <div id="fcskp" class="invalid-feedback">
                            {{$message}}
                          </div>
                          @enderror
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="mb-3">
                          <label for="formFile" class="form-label">FC PAK (Bagi PNS Dalam Jabatan Fungsional)</label>
                          <input class="form-control @error('fcpak') is-invalid @enderror" type="file" name="fcpak" id="fcpak" accept=".pdf">
                          @error('fcpak')
                          <div id="fcpak" class="invalid-feedback">
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
                          <label for="formFile" class="form-label">Surat Pernyataan Bersedia Menanggung Biaya Pendidikan (Bagi Yang Tidak Ada Sponsor)</label>
                          <input class="form-control @error('spbmbp') is-invalid @enderror" type="file" name="spbmbp" id="spbmbp" accept=".pdf">
                          @error('spbmbp')
                          <div id="spbmbp" class="invalid-feedback">
                            {{$message}}
                          </div>
                          @enderror
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="mb-3">
                          <label for="formFile" class="form-label">Surat Pernyataan Sponsor/Pihak Ke-Tiga</label>
                          <input class="form-control @error('spspkt') is-invalid @enderror" type="file" name="spspkt" id="spspkt" accept=".pdf">
                          @error('spspkt')
                          <div id="spspkt" class="invalid-feedback">
                            {{$message}}
                          </div>
                          @enderror
                        </div>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-6 mx-auto">
                        <div class="mb-3">
                          <label for="formFile" class="form-label">Poin 1-12 Rangkap 2</label>
                          <input class="form-control @error('pr') is-invalid @enderror" type="file" name="pr" id="pr" accept=".pdf">
                          @error('pr')
                          <div id="pr" class="invalid-feedback">
                            {{$message}}
                          </div>
                          @enderror
                        </div>
                      </div>
                      <button class="btn btn-primary rounded-pill" type="submit" style="float:right">Kirim</button>
                    </div>
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
@extends('admin.layouts.main')
@include('admin.layouts.header-klien')
@section('content')

<body>
  <div class="container-fluid">
    <div class="row">
      @include('admin.layouts.sidenav')

      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
          <h1 class="h2">Kenaikan Pangkat Jabatan Struktural</h1>
        </div>  
        <div class="row">
          <div class="col-md-10 mx-auto">
            <form action="/klien/layanan/kpjsadd" method="POST" enctype="multipart/form-data">
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
                          <label for="formFile" class="form-label">FC Petikan SK, SPP, dan SPMT Terakhir dan 2 Jabatan Sebelumnya</label>
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
                          <label for="formFile" class="form-label">FC Penilaian Prestasi Kerja 2 Tahun Terakhir</label>
                          <input class="form-control @error('fcppktt') is-invalid @enderror" type="file" name="fcppktt" id="fcppktt" accept=".pdf">
                          @error('fcppktt')
                          <div id="fcppktt" class="invalid-feedback">
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
                          <input class="form-control @error('fcskjss') is-invalid @enderror" type="file" name="fcskjss" id="fcskjss" accept=".pdf">
                          @error('fcskjss')
                          <div id="fcskjss" class="invalid-feedback">
                            {{$message}}
                          </div>
                          @enderror
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="mb-3">
                          <label for="formFile" class="form-label">FC SK Mutasi Wilayah Kerja (Jika SK Pangkat Terakhir Bukan Kota Kupang)</label>
                          <input class="form-control @error('fckmwk') is-invalid @enderror" type="file" name="fckmwk" id="fckmwk" accept=".pdf">
                          @error('fckmwk')
                          <div id="fckmwk" class="invalid-feedback">
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
                          <label for="formFile" class="form-label">FC Daftar Riwayat Hidup</label>
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
                          <label for="formFile" class="form-label">FC Surat Tanda Lulus Ujian Dinas Tingkat II Atau Sertifikat Diklat PIM III Bagi Yang Pindah Golongan III/d ke IV/a, Kecuali Memiliki Ijazah Dokter, Apoteker dan Magister (S2)</label>
                          <input class="form-control @error('fcstlud') is-invalid @enderror" type="file" name="fcstlud" id="fcstlud" accept=".pdf">
                          @error('fcstlud')
                          <div id="fcstlud" class="invalid-feedback">
                            {{$message}}
                          </div>
                          @enderror
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="mb-3">
                          <label for="formFile" class="form-label">FC SK Pembebasan Sementara Dari Jabatan Fungsional (Sebelumnya Menduduki Jabatan Fungsional Tertentu)</label>
                          <input class="form-control @error('fcskpps') is-invalid @enderror" type="file" name="fcskpps" id="fcskpps" accept=".pdf">
                          @error('fcskpps')
                          <div id="fcskpps" class="invalid-feedback">
                            {{$message}}
                          </div>
                          @enderror
                        </div>
                      </div>
                    </div>
                    <hr>
                              
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
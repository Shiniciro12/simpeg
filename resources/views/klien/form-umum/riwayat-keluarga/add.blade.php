@extends('klien.layouts.main')
@section('content')
    <div class="pcoded-content">
        <!-- Page-header start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <div class="page-header-title">
                            <h1 class="m-b-10" style="color:white">Riwayat Keluarga</h1>
                            <!-- <p class="m-b-0" style="font-size: 20px">Selamat datang di Sistem Informasi Pegawai</p> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page-header end -->
        <div class="pcoded-inner-content">
            <!-- Main-body start -->
            <div class="main-body">
                <div class="page-wrapper">
                    <!-- Page-body start -->
                    <div class="page-body">
                        {{-- Table taro sini --}}
                        <form action="/klien/dataumum/keluarga/store" method="post"
                         enctype="multipart/form-data" class="form-material">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Form Riwayat Keluarga</h5>
                                        <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                                    </div>
                                    {{-- ISIAN FORM --}}

                                    <div class="card-block">
                                        
                                            @csrf
                                            <input type="hidden" value="{{ auth()->user()->nip }}"
                                                name="nip">

                                            <div class="form-group form-default">
                                            <input type="number" 
                                                    name="nik" class="form-control @error('nik') is-invalid @enderror" 
                                                    value="{{old('nik')}}" id="nik" aria-describedby="nik">
                                                    @error('nik')
                                                    <div id="nik" class="text-danger">
                                                        {{$message}}
                                                    </div>
                                                    @enderror
                                                <span class="form-bar"></span>
                                                <label class="float-label">NIK
                                                    <span class="text-danger">*</span>
                                                </label>
                                            </div>
                                            <br>
                                            <div class="form-group form-default">
                                                <input type="text" 
                                                        name="nama" class="form-control @error('nama') is-invalid @enderror" 
                                                        value="{{old('nama')}}" id="nama" aria-describedby="nama">
                                                        @error('nama')
                                                        <div id="nama" class="text-danger">
                                                            {{$message}}
                                                        </div>
                                                        @enderror
                                                <span class="form-bar"></span>
                                                <label class="float-label">Nama
                                                    <span class="text-danger">*</span>
                                                </label>
                                            </div>
                                            <br>
                                            <div class="form-group form-default">
                                                 <input type="text" 
                                                    name="tempat_lahir" 
                                                    class="form-control @error('tempat_lahir') is-invalid @enderror" 
                                                    value="{{old('tempat_lahir')}}" id="tempat_lahir" aria-describedby="tempat_lahir">
                                                    @error('tempat_lahir')
                                                    <div id="tempat_lahir" class="text-danger">
                                                        {{$message}}
                                                    </div>
                                                    @enderror
                                                <span class="form-bar"></span>
                                                <label class="float-label">Tempat Lahir
                                                    <span class="text-danger">*</span>
                                                </label>
                                            </div>
                                            <br>
                                            <div class="form-group form-default">
                                                <input type="date" 
                                                        name="tgl_lahir" 
                                                        class="form-control @error('tgl_lahir') is-invalid @enderror" 
                                                        value="{{old('tgl_lahir')}}" id="tgl_lahir" aria-describedby="tgl_lahir">
                                                    @error('tgl_lahir')
                                                    <div id="tgl_lahir" class="text-danger">
                                                        {{$message}}
                                                    </div>
                                                    @enderror
                                                <span class="form-bar"></span>
                                                <label class="float-label">Tanggal Lahir
                                                    <span class="text-danger">*</span>
                                                </label>
                                            </div>
                                            <br>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <select class="form-control @error('jenis_kelamin') is-invalid @enderror" 
                                                            name="jenis_kelamin" value="{{old('jenis_kelamin')}}" aria-label="jenis kelamin" 
                                                            id="jenis_kelamin">
                                                            <option selected value="">Pilih Jenis Kelamin</option>
                                                                <option {{old('jenis_kelamin')=='L' ? 'selected' : '' }} 
                                                                    value="L">Laki-laki
                                                                </option>
                                                                <option {{old('jenis_kelamin')=='P' ? 'selected' : '' }} 
                                                                    value="P">Perempuan
                                                                </option>
                                                        </select>
                                                        @error('jenis_kelamin')
                                                        <div id="jenis_kelamin" class="text-danger">
                                                            {{$message}}
                                                        </div>
                                                        @enderror
                                                </div>
                                            </div>
                                            <br>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                <select  class="form-control @error('status_keluarga') is-invalid @enderror" 
                                                            name="status_keluarga" value="{{old('status_keluarga')}}" 
                                                            aria-label="status_keluarga" id="status_keluarga">
                                                            <option selected value="">Pilih Status Keluarga</option>
                                                                <option {{old('status_keluarga')=='Kepala Keluarga' ? 'selected' : '' }} 
                                                                    value="Kepala Keluarga">Kepala Keluarga
                                                                </option>
                                                                <option {{old('status_keluarga')=='Istri' ? 'selected' : '' }} 
                                                                    value="Istri">Istri
                                                                </option>
                                                                <option {{old('status_keluarga')=='Anak' ? 'selected' : '' }} 
                                                                    value="Anak">Anak
                                                                </option>
                                                                <option {{old('status_keluarga')=='Status Lain' ? 'selected' : '' }} 
                                                                    value="Status Lain">Status Lain
                                                                </option>
                                                        </select>
                                                        @error('status_keluarga')
                                                        <div id="status_keluarga" class="text-danger">
                                                            {{$message}}
                                                        </div>
                                                        @enderror
                                                </div>
                                            </div>
                                            <br>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                <select  class="form-control @error('status_kawin') is-invalid @enderror" 
                                                            name="status_kawin" value="{{old('status_kawin')}}" 
                                                            aria-label="status kawin" id="status_kawin">
                                                            <option selected value="">Pilih Status Perkawinan</option>
                                                                <option {{old('status_kawin')=='Belum Kawin' ? 'selected' : '' }} 
                                                                    value="Belum Kawin">Belum Kawin
                                                                </option>
                                                                <option {{old('status_kawin')=='Kawin' ? 'selected' : '' }} 
                                                                    value="Kawin">Kawin
                                                                </option>
                                                                <option {{old('status_kawin')=='Janda' ? 'selected' : '' }} 
                                                                    value="Janda">Janda
                                                                </option>
                                                                <option {{old('status_kawin')=='Duda' ? 'selected' : '' }} 
                                                                    value="Duda">Duda
                                                                </option>
                                                        </select>
                                                        @error('status_kawin')
                                                        <div id="status_kawin" class="text-danger">
                                                            {{$message}}
                                                        </div>
                                                        @enderror
                                                </div>
                                            </div>
                                            <br>
                                            <div class="form-group form-default">
                                            <input type="date" 
                                                    name="tgl_kawin" 
                                                    class="form-control @error('tgl_kawin') is-invalid @enderror" 
                                                    value="{{old('tgl_kawin')}}" id="tgl_kawin" aria-describedby="tgl_kawin">
                                                @error('tgl_kawin')
                                                <div id="tgl_kawin" class="text-danger">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                                <span class="form-bar"></span>
                                                <label class="float-label">Tanggal Kawin</label>
                                            </div>
                                            <br>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                <select  class="form-control @error('status_tunjangan') is-invalid @enderror" 
                                                            name="status_tunjangan" value="{{old('status_tunjangan')}}" 
                                                            aria-label="status_tunjangan" id="status_tunjangan">
                                                            <option selected value="">Pilih Status Tunjangan</option>
                                                                <option {{old('status_tunjangan')=='Ya' ? 'selected' : '' }} 
                                                                    value="Ya">Ya
                                                                </option>
                                                                <option {{old('status_tunjangan')=='Tidak' ? 'selected' : '' }} 
                                                                    value="Tidak">Tidak
                                                                </option>
                                                        </select>
                                                        @error('status_tunjangan')
                                                        <div id="status_tunjangan" class="text-danger">
                                                            {{$message}}
                                                        </div>
                                                        @enderror
                                                </div>
                                            </div>
                                            <br>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                <select  class="form-control @error('pendidikan') is-invalid @enderror" 
                                                            name="pendidikan" value="{{old('pendidikan')}}" 
                                                            aria-label="pendidikan" id="pendidikan">
                                                            <option selected value="">Pilih Status Pendidikan</option>
                                                            <option {{old('pendidikan')=='Belum Sekolah' ? 'selected' : '' }} 
                                                                value="Belum Sekolah">Belum Sekolah
                                                            </option>
                                                            <option {{old('pendidikan')=='TK/Paud' ? 'selected' : '' }} 
                                                                value="TK/Paud">TK/Paud
                                                            </option>
                                                            <option {{old('pendidikan')=='SD Sederajat' ? 'selected' : '' }} 
                                                                value="SD Sederajat">SD Sederajat
                                                            </option>
                                                            <option {{old('pendidikan')=='SMP Sederajat' ? 'selected' : '' }} 
                                                                value="SMP Sederajat">SMP Sederajat
                                                            </option>
                                                            <option {{old('pendidikan')=='SMA Sederajat' ? 'selected' : '' }} 
                                                                value="SMA Sederajat">SMA Sederajat
                                                            </option>
                                                            <option {{old('pendidikan')=='S1(Sarjana)' ? 'selected' : '' }} 
                                                                value="S1(Sarjana)">S1(Sarjana)
                                                            </option>
                                                            <option {{old('pendidikan')=='S2(Master)' ? 'selected' : '' }} 
                                                                value="S2(Master)">S2(Master)
                                                            </option>
                                                            <option {{old('pendidikan')=='S3(Doctor)' ? 'selected' : '' }} 
                                                                value="S3(Doctor)">S3(Doctor)
                                                            </option>
                                                        </select>
                                                        @error('pendidikan')
                                                        <div id="pendidikan" class="text-danger">
                                                            {{$message}}
                                                        </div>
                                                        @enderror
                                                </div>
                                            </div>
                                            <br>
                                            <div class="form-group form-default">
                                            <input type="text" 
                                                    class="form-control @error('pekerjaan') is-invalid @enderror" 
                                                    name="pekerjaan" value="{{old('pekerjaan')}}" 
                                                    id="pekerjaan" aria-describedby="pekerjaan">
                                                @error('pekerjaan')
                                                <div id="pekerjaan" class="text-danger">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                                <span class="form-bar"></span>
                                                <label class="float-label">Pekerjaan
                                                    <span class="text-danger">*</span>
                                                </label>
                                            </div>
                                            <br>
                                            <!-- bariskedua -->
                                    </div>
                                </div>
                            </div>

                            <!-- form kedua -->
                            <div class="col-md-6">
                                <div class="card">
                                    {{-- ISIAN FORM --}}

                                    <div class="card-block">
                                        <!-- <form action="/klien/dataumum/riwayat-pangkat/store" method="post"
                                            enctype="multipart/form-data" class="form-material">
                                            @csrf -->
                                            <input type="hidden" value="{{ auth()->user()->nip }}"
                                                name="nip">
                                                <br>
                                                <div class="form-group form-default">
                                            <textarea class="form-control @error('alamat') is-invalid @enderror" 
                                                        value="{{old('alamat')}}" name="alamat" 
                                                        id="alamat" rows="3">{{old('alamat')}}</textarea>
                                                @error('alamat')
                                                <div id="alamat" class="text-danger">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                                 <span class="form-bar"></span>
                                                 <label class="float-label">Alamat
                                                    <span class="text-danger">*</span>
                                                 </label>
                                            </div>
                                            <br>
                                            <div class="form-group form-default">
                                            <input type="text" 
                                                    class="form-control @error('desa_kelurahan') is-invalid @enderror" 
                                                    name="desa_kelurahan" value="{{old('desa_kelurahan')}}" 
                                                    id="desa_kelurahan" aria-describedby="desa_kelurahan">
                                                @error('desa_kelurahan')
                                                <div id="desa_kelurahan" class="text-danger">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                                <span class="form-bar"></span>
                                                <label class="float-label">Desa/Kelurahan
                                                    <span class="text-danger">*</span>
                                                </label>
                                            </div>
                                            <br>
                                            <div class="form-group form-default">
                                            <input type="text" 
                                                    class="form-control @error('kecamatan') is-invalid @enderror" 
                                                    name="kecamatan" value="{{old('kecamatan')}}" 
                                                    id="kecamatan" aria-describedby="kecamatan">
                                                @error('kecamatan')
                                                <div id="kecamatan" class="text-danger">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                                <span class="form-bar"></span>
                                                <label class="float-label">Kecamatan
                                                    <span class="text-danger">*</span>
                                                </label>
                                            </div>
                                            <br>
                                            <div class="form-group form-default">
                                            <input type="text" 
                                                    class="form-control @error('kabupaten_kota') is-invalid @enderror" 
                                                    name="kabupaten_kota" value="{{old('kabupaten_kota')}}" 
                                                    id="kabupaten_kota" aria-describedby="kabupaten_kota">
                                                @error('kabupaten_kota')
                                                <div id="kabupaten_kota" class="text-danger">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                                <span class="form-bar"></span>
                                                <label class="float-label">Kabupaten/Kota
                                                    <span class="text-danger">*</span>
                                                </label>
                                            </div>
                                            <br>
                                            <div class="form-group form-default">
                                            <input type="text" 
                                                    class="form-control @error('provinsi') is-invalid @enderror" 
                                                    name="provinsi" value="{{old('provinsi')}}" 
                                                    id="provinsi" aria-describedby="provinsi">
                                                @error('provinsi')
                                                <div id="" class="text-danger">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                                <span class="form-bar"></span>
                                                <label class="float-label">Provinsi
                                                    <span class="text-danger">*</span>
                                                </label>
                                            </div>
                                            <br>
                                            <div class="form-group form-default">
                                            <input type="number" 
                                                    class="form-control @error('hp') is-invalid @enderror" 
                                                    name="hp" value="{{old('hp')}}" 
                                                    id="hp" aria-describedby="hp">
                                                @error('hp')
                                                <div id="hp" class="text-danger">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                                <span class="form-bar"></span>
                                                <label class="float-label">No.HP
                                                    <span class="text-danger">*</span>
                                                </label>
                                            </div>
                                            <br>
                                            <div class="form-group form-default">
                                            <input type="number" 
                                                    name="telepon" class="form-control @error('telepon') is-invalid @enderror" 
                                                    value="{{old('telepon')}}" 
                                                    id="telepon" aria-describedby="telepon">
                                                @error('telepon')
                                                <div id="telepon" class="text-danger">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                                <span class="form-bar"></span>
                                                <label class="float-label">No.Telepon</label>
                                            </div>
                                            <br>
                                            <div class="form-group form-default">
                                            <input type="number" 
                                                    class="form-control @error('kode_pos') is-invalid @enderror" 
                                                    name="kode_pos" value="{{old('kode_pos')}}" 
                                                    id="kode_pos" aria-describedby="kode_pos">
                                                @error('kode_pos')
                                                <div id="kode_pos" class="text-danger">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                                <span class="form-bar"></span>
                                                <label class="float-label">Kode Pos
                                                    <span class="text-danger">*</span>
                                                </label>
                                            </div>
                                            <br>
                                            <div class="form-group row">
                                                <label class="col-sm-6 col-form-label">File KK (Format Pdf Maksimal 500kb)
                                                    <span class="text-danger">*</span></label><br>
                                                <div class="col-sm-12">
                                                <input type="file" class="form-control @error('dokumen') is-invalid @enderror" 
                                                        value="{{old('dokumen')}}" id="dokumen" name="dokumen">
                                                        @error('dokumen')
                                                        <div id="dokumen" class="text-danger">
                                                            {{$message}}
                                                        </div>
                                                        @enderror
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary"
                                                style="float: right">Kirim</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- task, page, download counter  end -->
                        <!-- Page-body end -->
                    </div>
                    <div id="styleSelector"></div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
@endsection

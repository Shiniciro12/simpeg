@extends('klien.layouts.main')
@section('content')
    <div class="pcoded-content">
        <!-- Page-header start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h1 class="m-b-10" style="color:white">Riwayat Keluarga</h1>
                            <!-- <p class="m-b-0" style="font-size: 20px">Selamat datang di Sistem Informasi Pegawai</p> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
                                            <!-- Material tab card start -->
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5>Riwayat Keluarga</h5>
                                                </div>
                                                <div class="card-block">
                                                    <!-- Row start -->
                                                    <div class="row m-b-30">
                                                        <div class="col-lg-12 col-xl-12">
                                                         
                                                            <!-- Nav tabs -->
                                                            <ul class="nav nav-tabs md-tabs" role="tablist">
                                                                <li class="nav-item">
                                                                    <a class="nav-link active" data-toggle="tab" href="#home3" role="tab">Orang Tua</a>
                                                                    <div class="slide"></div>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link" data-toggle="tab" href="#profile3" role="tab">Suami/Istri</a>
                                                                    <div class="slide"></div>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link" data-toggle="tab" href="#messages3" role="tab">Anak</a>
                                                                    <div class="slide"></div>
                                                                </li>
                                                                
                                                            </ul>
                                                            <!-- Tab panes -->
                                                            <div class="tab-content card-block">
                                                                <div class="tab-pane active" id="home3" role="tabpanel">
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
                                                                    <h5>Form Orang Tua</h5>
                                                                    <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                                                                </div>
                                                                {{-- ISIAN FORM --}}

                                                                <div class="card-block">
                                                                    
                                                                        @csrf
                                                                        <input type="hidden" value="{{ auth()->user()->nip }}"
                                                                            name="nip_orang_tua">
                                                                            <input type="hidden" value="0"
                                                                            name="ket_orang_tua">
                                                                            <input type="hidden" value="Orang Tua"
                                                                            name="status_keluarga_orang_tua">

                                                                        <div class="form-group form-default">
                                                                        <input type="number" 
                                                                                name="nik_orang_tua" class="form-control @error('nik_orang_tua') is-invalid @enderror" 
                                                                                value="{{old('nik_orang_tua')}}" id="nik_orang_tua" aria-describedby="nik_orang_tua">
                                                                                @error('nik_orang_tua')
                                                                                <div id="nik_orang_tua" class="text-danger">
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
                                                                                    name="nama_orang_tua" class="form-control @error('nama_orang_tua') is-invalid @enderror" 
                                                                                    value="{{old('nama_orang_tua')}}" id="nama_orang_tua" aria-describedby="nama_orang_tua">
                                                                                    @error('nama_orang_tua')
                                                                                    <div id="nama_orang_tua" class="text-danger">
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
                                                                                name="tempat_lahir_orang_tua" 
                                                                                class="form-control @error('tempat_lahir_orang_tua') is-invalid @enderror" 
                                                                                value="{{old('tempat_lahir_orang_tua')}}" id="tempat_lahir_orang_tua" aria-describedby="tempat_lahir_orang_tua">
                                                                                @error('tempat_lahir_orang_tua')
                                                                                <div id="tempat_lahir_orang_tua" class="text-danger">
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
                                                                                    name="tgl_lahir_orang_tua" 
                                                                                    class="form-control @error('tgl_lahir_orang_tua') is-invalid @enderror" 
                                                                                    value="{{old('tgl_lahir_orang_tua')}}" id="tgl_lahir_orang_tua" aria-describedby="tgl_lahir_orang_tua">
                                                                                @error('tgl_lahir_orang_tua')
                                                                                <div id="tgl_lahir_orang_tua" class="text-danger">
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
                                                                                <select class="form-control @error('jenis_kelamin_orang_tua') is-invalid @enderror" 
                                                                                        name="jenis_kelamin_orang_tua" value="{{old('jenis_kelamin_orang_tua')}}" aria-label="jenis kelamin" 
                                                                                        id="jenis_kelamin_orang_tua">
                                                                                        <option selected value="">Pilih Jenis Kelamin</option>
                                                                                            <option {{old('jenis_kelamin_orang_tua')=='L' ? 'selected' : '' }} 
                                                                                                value="L">Laki-laki
                                                                                            </option>
                                                                                            <option {{old('jenis_kelamin_orang_tua')=='P' ? 'selected' : '' }} 
                                                                                                value="P">Perempuan
                                                                                            </option>
                                                                                    </select>
                                                                                    @error('jenis_kelamin_orang_tua')
                                                                                    <div id="jenis_kelamin_orang_tua" class="text-danger">
                                                                                        {{$message}}
                                                                                    </div>
                                                                                    @enderror
                                                                            </div>
                                                                        </div>
                                                                        <br>
                                                                        <!-- <div class="form-group row">
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
                                                                        </div> -->
                                                                        <br>
                                                                        <div class="form-group row">
                                                                            <div class="col-sm-12">
                                                                            <select  class="form-control @error('status_kawin_orang_tua') is-invalid @enderror" 
                                                                                        name="status_kawin_orang_tua" value="{{old('status_kawin_orang_tua')}}" 
                                                                                        aria-label="status kawin" id="status_kawin_orang_tua">
                                                                                        <option selected value="">Pilih Status Perkawinan</option>
                                                                                            <option {{old('status_kawin_orang_tua')=='Belum Kawin' ? 'selected' : '' }} 
                                                                                                value="Belum Kawin">Belum Kawin
                                                                                            </option>
                                                                                            <option {{old('status_kawin_orang_tua')=='Kawin' ? 'selected' : '' }} 
                                                                                                value="Kawin">Kawin
                                                                                            </option>
                                                                                            <option {{old('status_kawin_orang_tua')=='Janda' ? 'selected' : '' }} 
                                                                                                value="Janda">Janda
                                                                                            </option>
                                                                                            <option {{old('status_kawin_orang_tua')=='Duda' ? 'selected' : '' }} 
                                                                                                value="Duda">Duda
                                                                                            </option>
                                                                                    </select>
                                                                                    @error('status_kawin_orang_tua')
                                                                                    <div id="status_kawin_orang_tua" class="text-danger">
                                                                                        {{$message}}
                                                                                    </div>
                                                                                    @enderror
                                                                            </div>
                                                                        </div>
                                                                        <br>
                                                                    
                                                                        <div class="form-group form-default">
                                                                        <input type="date" 
                                                                                name="tgl_kawin_orang_tua" 
                                                                                class="form-control @error('tgl_kawin_orang_tua') is-invalid @enderror" 
                                                                                value="{{old('tgl_kawin_orang_tua')}}" id="tgl_kawin_orang_tua" aria-describedby="tgl_kawin_orang_tua">
                                                                            @error('tgl_kawin_orang_tua')
                                                                            <div id="tgl_kawin_orang_tua" class="text-danger">
                                                                                {{$message}}
                                                                            </div>
                                                                            @enderror
                                                                            <span class="form-bar"></span>
                                                                            <label class="float-label">Tanggal Kawin</label>
                                                                        </div>
                                                                        
                                                                        <br>
                                                                        <div class="form-group row">
                                                                            <div class="col-sm-12">
                                                                            <select  class="form-control @error('status_tunjangan_orang_tua') is-invalid @enderror" 
                                                                                        name="status_tunjangan_orang_tua" value="{{old('status_tunjangan_orang_tua')}}" 
                                                                                        aria-label="status_tunjangan_orang_tua" id="status_tunjangan_orang_tua">
                                                                                        <option selected value="">Pilih Status Tunjangan</option>
                                                                                            <option {{old('status_tunjangan_orang_tua')=='Ya' ? 'selected' : '' }} 
                                                                                                value="Ya">Ya
                                                                                            </option>
                                                                                            <option {{old('status_tunjangan_orang_tua')=='Tidak' ? 'selected' : '' }} 
                                                                                                value="Tidak">Tidak
                                                                                            </option>
                                                                                    </select>
                                                                                    @error('status_tunjangan_orang_tua')
                                                                                    <div id="status_tunjangan_orang_tua" class="text-danger">
                                                                                        {{$message}}
                                                                                    </div>
                                                                                    @enderror
                                                                            </div>
                                                                        </div>
                                                                        <br>
                                                                        <div class="form-group row">
                                                                            <div class="col-sm-12">
                                                                            <select  class="form-control @error('pendidikan_orang_tua') is-invalid @enderror" 
                                                                                        name="pendidikan_orang_tua" value="{{old('pendidikan_orang_tua')}}" 
                                                                                        aria-label="pendidikan_orang_tua" id="pendidikan_orang_tua">
                                                                                        <option selected value="">Pilih Status Pendidikan Orang Tua</option>
                                                                                        <option {{old('pendidikan_orang_tua')=='Belum Sekolah' ? 'selected' : '' }} 
                                                                                            value="Belum Sekolah">Belum Sekolah
                                                                                        </option>
                                                                                        <option {{old('pendidikan_orang_tua')=='TK/Paud' ? 'selected' : '' }} 
                                                                                            value="TK/Paud">TK/Paud
                                                                                        </option>
                                                                                        <option {{old('pendidikan_orang_tua')=='SD Sederajat' ? 'selected' : '' }} 
                                                                                            value="SD Sederajat">SD Sederajat
                                                                                        </option>
                                                                                        <option {{old('pendidikan_orang_tua')=='SMP Sederajat' ? 'selected' : '' }} 
                                                                                            value="SMP Sederajat">SMP Sederajat
                                                                                        </option>
                                                                                        <option {{old('pendidikan_orang_tua')=='SMA Sederajat' ? 'selected' : '' }} 
                                                                                            value="SMA Sederajat">SMA Sederajat
                                                                                        </option>
                                                                                        <option {{old('pendidikan_orang_tua')=='S1(Sarjana)' ? 'selected' : '' }} 
                                                                                            value="S1(Sarjana)">S1(Sarjana)
                                                                                        </option>
                                                                                        <option {{old('pendidikan_orang_tua')=='S2(Master)' ? 'selected' : '' }} 
                                                                                            value="S2(Master)">S2(Master)
                                                                                        </option>
                                                                                        <option {{old('pendidikan_orang_tua')=='S3(Doctor)' ? 'selected' : '' }} 
                                                                                            value="S3(Doctor)">S3(Doctor)
                                                                                        </option>
                                                                                    </select>
                                                                                    @error('pendidikan_orang_tua')
                                                                                    <div id="pendidikan_orang_tua" class="text-danger">
                                                                                        {{$message}}
                                                                                    </div>
                                                                                    @enderror
                                                                            </div>
                                                                        </div>
                                                                        <br>
                                                                        <div class="form-group form-default">
                                                                        <input type="text" 
                                                                                class="form-control @error('pekerjaan_orang_tua') is-invalid @enderror" 
                                                                                name="pekerjaan_orang_tua" value="{{old('pekerjaan_orang_tua')}}" 
                                                                                id="pekerjaan_orang_tua" aria-describedby="pekerjaan_orang_tua">
                                                                            @error('pekerjaan_orang_tua')
                                                                            <div id="pekerjaan_orang_tua" class="text-danger">
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
                                                                        <textarea class="form-control @error('alamat_orang_tua') is-invalid @enderror" 
                                                                                    value="{{old('alamat_orang_tua')}}" name="alamat_orang_tua" 
                                                                                    id="alamat_orang_tua" rows="3">{{old('alamat_orang_tua')}}</textarea>
                                                                            @error('alamat_orang_tua')
                                                                            <div id="alamat_orang_tua" class="text-danger">
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
                                                                                class="form-control @error('desa_kelurahan_orang_tua') is-invalid @enderror" 
                                                                                name="desa_kelurahan_orang_tua" value="{{old('desa_kelurahan_orang_tua')}}" 
                                                                                id="desa_kelurahan_orang_tua" aria-describedby="desa_kelurahan_orang_tua">
                                                                            @error('desa_kelurahan_orang_tua')
                                                                            <div id="desa_kelurahan_orang_tua" class="text-danger">
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
                                                                                class="form-control @error('kecamatan_orang_tua') is-invalid @enderror" 
                                                                                name="kecamatan_orang_tua" value="{{old('kecamatan_orang_tua')}}" 
                                                                                id="kecamatan_orang_tua" aria-describedby="kecamatan_orang_tua">
                                                                            @error('kecamatan_orang_tua')
                                                                            <div id="kecamatan_orang_tua" class="text-danger">
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
                                                                                class="form-control @error('kabupaten_kota_orang_tua') is-invalid @enderror" 
                                                                                name="kabupaten_kota_orang_tua" value="{{old('kabupaten_kota_orang_tua')}}" 
                                                                                id="kabupaten_kota_orang_tua" aria-describedby="kabupaten_kota_orang_tua">
                                                                            @error('kabupaten_kota_orang_tua')
                                                                            <div id="kabupaten_kota_orang_tua" class="text-danger">
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
                                                                                class="form-control @error('provinsi_orang_tua') is-invalid @enderror" 
                                                                                name="provinsi_orang_tua" value="{{old('provinsi_orang_tua')}}" 
                                                                                id="provinsi_orang_tua" aria-describedby="provinsi_orang_tua">
                                                                            @error('provinsi_orang_tua')
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
                                                                                class="form-control @error('hp_orang_tua') is-invalid @enderror" 
                                                                                name="hp_orang_tua" value="{{old('hp_orang_tua')}}" 
                                                                                id="hp_orang_tua" aria-describedby="hp_orang_tua">
                                                                            @error('hp_orang_tua')
                                                                            <div id="hp_orang_tua" class="text-danger">
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
                                                                                name="telepon_orang_tua" class="form-control @error('telepon_orang_tua') is-invalid @enderror" 
                                                                                value="{{old('telepon_orang_tua')}}" 
                                                                                id="telepon_orang_tua" aria-describedby="telepon_orang_tua">
                                                                            @error('telepon_orang_tua')
                                                                            <div id="telepon_orang_tua" class="text-danger">
                                                                                {{$message}}
                                                                            </div>
                                                                            @enderror
                                                                            <span class="form-bar"></span>
                                                                            <label class="float-label">No.Telepon</label>
                                                                        </div>
                                                                        <br>
                                                                        <div class="form-group form-default">
                                                                        <input type="number" 
                                                                                class="form-control @error('kode_pos_orang_tua') is-invalid @enderror" 
                                                                                name="kode_pos_orang_tua" value="{{old('kode_pos_orang_tua')}}" 
                                                                                id="kode_pos_orang_tua" aria-describedby="kode_pos_orang_tua">
                                                                            @error('kode_pos_orang_tua')
                                                                            <div id="kode_pos_orang_tua" class="text-danger">
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
                                                                            <input type="file" class="form-control @error('dokumen_orang_tua') is-invalid @enderror" 
                                                                                    value="{{old('dokumen_orang_tua')}}" id="dokumen_orang_tua" name="dokumen_orang_tua">
                                                                                    @error('dokumen_orang_tua')
                                                                                    <div id="dokumen_orang_tua" class="text-danger">
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
                                    </div> </div>
                                                  <!-- Form isi istri/suami ke- -->
                                            <div class="tab-pane" id="profile3" role="tabpanel">
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
                                                                    <h5>Form Pasangan</h5>
                                                                    <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                                                                </div>
                                                                {{-- ISIAN FORM --}}

                                                                <div class="card-block">
                                                                    
                                                                        @csrf
                                                                        <input type="hidden" value="{{ auth()->user()->nip }}"
                                                                            name="nip_pasangan">
                                                                          
                                                                            <input type="hidden" value="Pasangan"
                                                                            name="status_keluarga_pasangan">

                                                                             <div class="form-group row">
                                                                            <div class="col-sm-12">
                                                                            <select  class="form-control @error('ket_pasangan') is-invalid @enderror" 
                                                                                        name="ket_pasangan" value="{{old('ket_pasangan')}}" 
                                                                                        aria-label="ket_pasangan" id="ket_pasangan">
                                                                                        <option selected value="">Pilih Suami/Istri Ke-</option>
                                                                                            <option {{old('ket_pasangan')=='1' ? 'selected' : '' }} 
                                                                                                value="1">1
                                                                                            </option>
                                                                                            <option {{old('ket_pasangan')=='2' ? 'selected' : '' }} 
                                                                                                value="2">2
                                                                                            </option> <option {{old('ket_pasangan')=='3' ? 'selected' : '' }} 
                                                                                                value="3">3
                                                                                            </option> <option {{old('ket_pasangan')=='4' ? 'selected' : '' }} 
                                                                                                value="4">4
                                                                                            </option> <option {{old('ket_pasangan')=='5' ? 'selected' : '' }} 
                                                                                                value="5">5
                                                                                            </option>
                                                                                            </option> <option {{old('ket_pasangan')=='6' ? 'selected' : '' }} 
                                                                                                value="6">6
                                                                                            </option>
                                                                                            </option> <option {{old('ket_pasangan')=='7' ? 'selected' : '' }} 
                                                                                                value="7">7
                                                                                            </option>
                                                                                            </option> <option {{old('ket_pasangan')=='8' ? 'selected' : '' }} 
                                                                                                value="8">8
                                                                                            </option>
                                                                                            </option> <option {{old('ket_pasangan')=='9' ? 'selected' : '' }} 
                                                                                                value="9">9
                                                                                            </option>
                                                                                            </option> <option {{old('ket_pasangan')=='10' ? 'selected' : '' }} 
                                                                                                value="10">10
                                                                                            </option>
                                                                                    </select>
                                                                                    @error('ket')
                                                                                    <div id="ket_pasangan" class="text-danger">
                                                                                        {{$message}}
                                                                                    </div>
                                                                                    @enderror
                                                                            </div>
                                                                        </div>
                                                                        <br>
                                                                        <div class="form-group form-default">
                                                                        <input type="number" 
                                                                                name="nik_pasangan" class="form-control @error('nik_pasangan') is-invalid @enderror" 
                                                                                value="{{old('nik_pasangan')}}" id="nik_pasangan" aria-describedby="nik_pasangan">
                                                                                @error('nik_pasangan')
                                                                                <div id="nik_pasangan" class="text-danger">
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
                                                                                    name="nama_pasangan" class="form-control @error('nama_pasangan') is-invalid @enderror" 
                                                                                    value="{{old('nama_pasangan')}}" id="nama_pasangan" aria-describedby="nama_pasangan">
                                                                                    @error('nama_pasangan')
                                                                                    <div id="nama_pasangan" class="text-danger">
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
                                                                                name="tempat_lahir_pasangan" 
                                                                                class="form-control @error('tempat_lahir_pasangan') is-invalid @enderror" 
                                                                                value="{{old('tempat_lahir_pasangan')}}" id="tempat_lahir_pasangan" aria-describedby="tempat_lahir_pasangan">
                                                                                @error('tempat_lahir_pasangan')
                                                                                <div id="tempat_lahir_pasangan" class="text-danger">
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
                                                                                    name="tgl_lahir_pasangan" 
                                                                                    class="form-control @error('tgl_lahir_pasangan') is-invalid @enderror" 
                                                                                    value="{{old('tgl_lahir_pasangan')}}" id="tgl_lahir_pasangan" aria-describedby="tgl_lahir_pasangan">
                                                                                @error('tgl_lahir_pasangan')
                                                                                <div id="tgl_lahir_pasangan" class="text-danger">
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
                                                                                <select class="form-control @error('jenis_kelamin_pasangan') is-invalid @enderror" 
                                                                                        name="jenis_kelamin_pasangan" value="{{old('jenis_kelamin_pasangan')}}" aria-label="jenis kelamin" 
                                                                                        id="jenis_kelamin_pasangan">
                                                                                        <option selected value="">Pilih Jenis Kelamin</option>
                                                                                            <option {{old('jenis_kelamin_pasangan')=='L' ? 'selected' : '' }} 
                                                                                                value="L">Laki-laki
                                                                                            </option>
                                                                                            <option {{old('jenis_kelamin_pasangan')=='P' ? 'selected' : '' }} 
                                                                                                value="P">Perempuan
                                                                                            </option>
                                                                                    </select>
                                                                                    @error('jenis_kelamin_pasangan')
                                                                                    <div id="jenis_kelamin_pasangan" class="text-danger">
                                                                                        {{$message}}
                                                                                    </div>
                                                                                    @enderror
                                                                            </div>
                                                                        </div>
                                                                        <br>
                                                                        <br>
                                                                        <div class="form-group row">
                                                                            <div class="col-sm-12">
                                                                            <select  class="form-control @error('status_kawin_pasangan') is-invalid @enderror" 
                                                                                        name="status_kawin_pasangan" value="{{old('status_kawin_pasangan')}}" 
                                                                                        aria-label="status kawin" id="status_kawin_pasangan">
                                                                                        <option selected value="">Pilih Status Perkawinan</option>
                                                                                            <option {{old('status_kawin_pasangan')=='Belum Kawin' ? 'selected' : '' }} 
                                                                                                value="Belum Kawin">Belum Kawin
                                                                                            </option>
                                                                                            <option {{old('status_kawin_pasangan')=='Kawin' ? 'selected' : '' }} 
                                                                                                value="Kawin">Kawin
                                                                                            </option>
                                                                                            <option {{old('status_kawin_pasangan')=='Janda' ? 'selected' : '' }} 
                                                                                                value="Janda">Janda
                                                                                            </option>
                                                                                            <option {{old('status_kawin_pasangan')=='Duda' ? 'selected' : '' }} 
                                                                                                value="Duda">Duda
                                                                                            </option>
                                                                                    </select>
                                                                                    @error('status_kawin_pasangan')
                                                                                    <div id="status_kawin_pasangan" class="text-danger">
                                                                                        {{$message}}
                                                                                    </div>
                                                                                    @enderror
                                                                            </div>
                                                                        </div>
                                                                        <br>
                                                                    
                                                                        <div class="form-group form-default">
                                                                        <input type="date" 
                                                                                name="tgl_kawin_pasangan" 
                                                                                class="form-control @error('tgl_kawin_pasangan') is-invalid @enderror" 
                                                                                value="{{old('tgl_kawin_pasangan')}}" id="tgl_kawin_pasangan" aria-describedby="tgl_kawin_pasangan">
                                                                            @error('tgl_kawin_pasangan')
                                                                            <div id="tgl_kawin_pasangan" class="text-danger">
                                                                                {{$message}}
                                                                            </div>
                                                                            @enderror
                                                                            <span class="form-bar"></span>
                                                                            <label class="float-label">Tanggal Kawin</label>
                                                                        </div>
                                                                        
                                                                        <br>
                                                                        <div class="form-group row">
                                                                            <div class="col-sm-12">
                                                                            <select  class="form-control @error('status_tunjangan_pasangan') is-invalid @enderror" 
                                                                                        name="status_tunjangan_pasangan" value="{{old('status_tunjangan_pasangan')}}" 
                                                                                        aria-label="status_tunjangan_pasangan" id="status_tunjangan_pasangan">
                                                                                        <option selected value="">Pilih Status Tunjangan</option>
                                                                                            <option {{old('status_tunjangan_pasangan')=='Ya' ? 'selected' : '' }} 
                                                                                                value="Ya">Ya
                                                                                            </option>
                                                                                            <option {{old('status_tunjangan_pasangan')=='Tidak' ? 'selected' : '' }} 
                                                                                                value="Tidak">Tidak
                                                                                            </option>
                                                                                    </select>
                                                                                    @error('status_tunjangan_pasangan')
                                                                                    <div id="status_tunjangan_pasangan" class="text-danger">
                                                                                        {{$message}}
                                                                                    </div>
                                                                                    @enderror
                                                                            </div>
                                                                        </div>
                                                                        <br>
                                                                        <div class="form-group row">
                                                                            <div class="col-sm-12">
                                                                            <select  class="form-control @error('pendidikan_pasangan') is-invalid @enderror" 
                                                                                        name="pendidikan_pasangan" value="{{old('pendidikan_pasangan')}}" 
                                                                                        aria-label="pendidikan_pasangan" id="pendidikan_pasangan">
                                                                                        <option selected value="">Pilih Status Pendidikan</option>
                                                                                        <option {{old('pendidikan_pasangan')=='Belum Sekolah' ? 'selected' : '' }} 
                                                                                            value="Belum Sekolah">Belum Sekolah
                                                                                        </option>
                                                                                        <option {{old('pendidikan_pasangan')=='TK/Paud' ? 'selected' : '' }} 
                                                                                            value="TK/Paud">TK/Paud
                                                                                        </option>
                                                                                        <option {{old('pendidikan_pasangan')=='SD Sederajat' ? 'selected' : '' }} 
                                                                                            value="SD Sederajat">SD Sederajat
                                                                                        </option>
                                                                                        <option {{old('pendidikan_pasangan')=='SMP Sederajat' ? 'selected' : '' }} 
                                                                                            value="SMP Sederajat">SMP Sederajat
                                                                                        </option>
                                                                                        <option {{old('pendidikan_pasangan')=='SMA Sederajat' ? 'selected' : '' }} 
                                                                                            value="SMA Sederajat">SMA Sederajat
                                                                                        </option>
                                                                                        <option {{old('pendidikan_pasangan')=='S1(Sarjana)' ? 'selected' : '' }} 
                                                                                            value="S1(Sarjana)">S1(Sarjana)
                                                                                        </option>
                                                                                        <option {{old('pendidikan_pasangan')=='S2(Master)' ? 'selected' : '' }} 
                                                                                            value="S2(Master)">S2(Master)
                                                                                        </option>
                                                                                        <option {{old('pendidikan_pasangan')=='S3(Doctor)' ? 'selected' : '' }} 
                                                                                            value="S3(Doctor)">S3(Doctor)
                                                                                        </option>
                                                                                    </select>
                                                                                    @error('pendidikan_pasangan')
                                                                                    <div id="pendidikan_pasangan" class="text-danger">
                                                                                        {{$message}}
                                                                                    </div>
                                                                                    @enderror
                                                                            </div>
                                                                        </div>
                                                                        <br>
                                                                        <div class="form-group form-default">
                                                                        <input type="text" 
                                                                                class="form-control @error('pekerjaan_pasangan') is-invalid @enderror" 
                                                                                name="pekerjaan_pasangan" value="{{old('pekerjaan_pasangan')}}" 
                                                                                id="pekerjaan_pasangan" aria-describedby="pekerjaan_pasangan">
                                                                            @error('pekerjaan_pasangan')
                                                                            <div id="pekerjaan_pasangan" class="text-danger">
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
                                                                            name="nip_pasangan">
                                                                            <br>
                                                                            <div class="form-group form-default">
                                                                        <textarea class="form-control @error('alamat_pasangan') is-invalid @enderror" 
                                                                                    value="{{old('alamat_pasangan')}}" name="alamat_pasangan" 
                                                                                    id="alamat_pasangan" rows="3">{{old('alamat_pasangan')}}</textarea>
                                                                            @error('alamat_pasangan')
                                                                            <div id="alamat_pasangan" class="text-danger">
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
                                                                                class="form-control @error('desa_kelurahan_pasangan') is-invalid @enderror" 
                                                                                name="desa_kelurahan_pasangan" value="{{old('desa_kelurahan_pasangan')}}" 
                                                                                id="desa_kelurahan_pasangan" aria-describedby="desa_kelurahan_pasangan">
                                                                            @error('desa_kelurahan_pasangan')
                                                                            <div id="desa_kelurahan_pasangan" class="text-danger">
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
                                                                                class="form-control @error('kecamatan_pasangan') is-invalid @enderror" 
                                                                                name="kecamatan_pasangan" value="{{old('kecamatan_pasangan')}}" 
                                                                                id="kecamatan_pasangan" aria-describedby="kecamatan_pasangan">
                                                                            @error('kecamatan_pasangan')
                                                                            <div id="kecamatan_pasangan" class="text-danger">
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
                                                                                class="form-control @error('kabupaten_kota_pasangan') is-invalid @enderror" 
                                                                                name="kabupaten_kota_pasangan" value="{{old('kabupaten_kota_pasangan')}}" 
                                                                                id="kabupaten_kota_pasangan" aria-describedby="kabupaten_kota_pasangan">
                                                                            @error('kabupaten_kota_pasangan')
                                                                            <div id="kabupaten_kota_pasangan" class="text-danger">
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
                                                                                class="form-control @error('provinsi_pasangan') is-invalid @enderror" 
                                                                                name="provinsi_pasangan" value="{{old('provinsi_pasangan')}}" 
                                                                                id="provinsi_pasangan" aria-describedby="provinsi_pasangan">
                                                                            @error('provinsi_pasangan')
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
                                                                                class="form-control @error('hp_pasangan') is-invalid @enderror" 
                                                                                name="hp_pasangan" value="{{old('hp_pasangan')}}" 
                                                                                id="hp_pasangan" aria-describedby="hp_pasangan">
                                                                            @error('hp_pasangan')
                                                                            <div id="hp_pasangan" class="text-danger">
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
                                                                                name="telepon_pasangan" class="form-control @error('telepon_pasangan') is-invalid @enderror" 
                                                                                value="{{old('telepon_pasangan')}}" 
                                                                                id="telepon_pasangan" aria-describedby="telepon_pasangan">
                                                                            @error('telepon_pasangan')
                                                                            <div id="telepon_pasangan" class="text-danger">
                                                                                {{$message}}
                                                                            </div>
                                                                            @enderror
                                                                            <span class="form-bar"></span>
                                                                            <label class="float-label">No.Telepon</label>
                                                                        </div>
                                                                        <br>
                                                                        <div class="form-group form-default">
                                                                        <input type="number" 
                                                                                class="form-control @error('kode_pos_pasangan') is-invalid @enderror" 
                                                                                name="kode_pos_pasangan" value="{{old('kode_pos_pasangan')}}" 
                                                                                id="kode_pos_pasangan" aria-describedby="kode_pos_pasangan">
                                                                            @error('kode_pos_pasangan')
                                                                            <div id="kode_pos_pasangan" class="text-danger">
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
                                                                            <label class="col-sm-6 col-form-label">File Akta Nikah (Format Pdf Maksimal 500kb)
                                                                                <span class="text-danger">*</span></label><br>
                                                                            <div class="col-sm-1_pasangan">
                                                                            <input type="file" class="form-control @error('dokumen_pasangan') is-invalid @enderror" 
                                                                                    value="{{old('dokumen_pasangan')}}" id="dokumen_pasangan" name="dokumen_pasangan">
                                                                                    @error('dokumen_pasangan')
                                                                                    <div id="dokumen_pasangan" class="text-danger">
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
                                    </div>    </div>
                                                                        <div class="tab-pane" id="messages3" role="tabpanel">
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
                                                                    <h5>Form Anak</h5>
                                                                    <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                                                                </div>
                                                                {{-- ISIAN FORM --}}

                                                                <div class="card-block">
                                                                    
                                                                        @csrf
                                                                        <input type="hidden" value="{{ auth()->user()->nip }}"
                                                                            name="nip_anak">
                                                                         
                                                                            <input type="hidden" value="Anak"
                                                                            name="status_keluarga_anak">
                                                                             
                                                                            <div class="form-group row">
                                                                            <div class="col-sm-12">
                                                                            <select  class="form-control @error('ket_anak') is-invalid @enderror" 
                                                                                        name="ket_anak" value="{{old('ket_anak')}}" 
                                                                                        aria-label="ket_anak" id="ket_anak">
                                                                                        <option selected value="">Anak Ke-  </option>
                                                                                            <option {{old('ket_anak')=='1' ? 'selected' : '' }} 
                                                                                                value="1">1
                                                                                            </option>
                                                                                            <option {{old('ket_anak')=='2' ? 'selected' : '' }} 
                                                                                                value="2">2
                                                                                            </option> <option {{old('ket_anak')=='3' ? 'selected' : '' }} 
                                                                                                value="3">3
                                                                                            </option> <option {{old('ket_anak')=='4' ? 'selected' : '' }} 
                                                                                                value="4">4
                                                                                            </option> <option {{old('ket_anak')=='5' ? 'selected' : '' }} 
                                                                                                value="5">5
                                                                                            </option>
                                                                                            </option> <option {{old('ket_anak')=='6' ? 'selected' : '' }} 
                                                                                                value="6">6
                                                                                            </option>
                                                                                            </option> <option {{old('ket_anak')=='7' ? 'selected' : '' }} 
                                                                                                value="7">7
                                                                                            </option>
                                                                                            </option> <option {{old('ket_anak')=='8' ? 'selected' : '' }} 
                                                                                                value="8">8
                                                                                            </option>
                                                                                            </option> <option {{old('ket_anak')=='9' ? 'selected' : '' }} 
                                                                                                value="9">9
                                                                                            </option>
                                                                                            </option> <option {{old('ket_anak')=='10' ? 'selected' : '' }} 
                                                                                                value="10">10
                                                                                            </option>
                                                                                    </select>
                                                                                    @error('ket_anak')
                                                                                    <div id="ket_anak" class="text-danger">
                                                                                        {{$message}}
                                                                                    </div>
                                                                                    @enderror
                                                                                 
                                                                          
                                                                            </div>
                                                                        </div>
                                                                        <br>
                                                                        <div class="form-group form-default">
                                                                        <input type="number" 
                                                                                name="nik_anak" class="form-control @error('nik_anak') is-invalid @enderror" 
                                                                                value="{{old('nik_anak')}}" id="nik_anak" aria-describedby="nik_anak">
                                                                                @error('nik_anak')
                                                                                <div id="nik_anak" class="text-danger">
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
                                                                                    name="nama_anak" class="form-control @error('nama_anak') is-invalid @enderror" 
                                                                                    value="{{old('nama_anak')}}" id="nama_anak" aria-describedby="nama_anak">
                                                                                    @error('nama_anak')
                                                                                    <div id="nama_anak" class="text-danger">
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
                                                                                name="tempat_lahir_anak" 
                                                                                class="form-control @error('tempat_lahir_anak') is-invalid @enderror" 
                                                                                value="{{old('tempat_lahir_anak')}}" id="tempat_lahir_anak" aria-describedby="tempat_lahir_anak">
                                                                                @error('tempat_lahir_anak')
                                                                                <div id="tempat_lahir_anak" class="text-danger">
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
                                                                                    name="tgl_lahir_anak" 
                                                                                    class="form-control @error('tgl_lahir_anak') is-invalid @enderror" 
                                                                                    value="{{old('tgl_lahir_anak')}}" id="tgl_lahir_anak" aria-describedby="tgl_lahir_anak">
                                                                                @error('tgl_lahir_anak')
                                                                                <div id="tgl_lahir_anak" class="text-danger">
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
                                                                                <select class="form-control @error('jenis_kelamin_anak') is-invalid @enderror" 
                                                                                        name="jenis_kelamin_anak" value="{{old('jenis_kelamin_anak')}}" aria-label="jenis kelamin" 
                                                                                        id="jenis_kelamin_anak">
                                                                                        <option selected value="">Pilih Jenis Kelamin</option>
                                                                                            <option {{old('jenis_kelamin_anak')=='L' ? 'selected' : '' }} 
                                                                                                value="L">Laki-laki
                                                                                            </option>
                                                                                            <option {{old('jenis_kelamin_anak')=='P' ? 'selected' : '' }} 
                                                                                                value="P">Perempuan
                                                                                            </option>
                                                                                    </select>
                                                                                    @error('jenis_kelamin_anak')
                                                                                    <div id="jenis_kelamin_anak" class="text-danger">
                                                                                        {{$message}}
                                                                                    </div>
                                                                                    @enderror
                                                                            </div>
                                                                        </div>
                                                                        <br>
                                                                        <!-- <div class="form-group row">
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
                                                                        </div> -->
                                                                        <br>
                                                                        <div class="form-group row">
                                                                            <div class="col-sm-12">
                                                                            <select  class="form-control @error('status_kawin_anak') is-invalid @enderror" 
                                                                                        name="status_kawin_anak" value="{{old('status_kawin_anak')}}" 
                                                                                        aria-label="status kawin" id="status_kawin_anak">
                                                                                        <option selected value="">Pilih Status Perkawinan</option>
                                                                                            <option {{old('status_kawin_anak')=='Belum Kawin' ? 'selected' : '' }} 
                                                                                                value="Belum Kawin">Belum Kawin
                                                                                            </option>
                                                                                            <option {{old('status_kawin_anak')=='Kawin' ? 'selected' : '' }} 
                                                                                                value="Kawin">Kawin
                                                                                            </option>
                                                                                            <option {{old('status_kawin_anak')=='Janda' ? 'selected' : '' }} 
                                                                                                value="Janda">Janda
                                                                                            </option>
                                                                                            <option {{old('status_kawin_anak')=='Duda' ? 'selected' : '' }} 
                                                                                                value="Duda">Duda
                                                                                            </option>
                                                                                    </select>
                                                                                    @error('status_kawin_anak')
                                                                                    <div id="status_kawin_anak" class="text-danger">
                                                                                        {{$message}}
                                                                                    </div>
                                                                                    @enderror
                                                                            </div>
                                                                        </div>
                                                                        <br>
                                                                    
                                                                        <div class="form-group form-default">
                                                                        <input type="date" 
                                                                                name="tgl_kawin_anak" 
                                                                                class="form-control @error('tgl_kawin_anak') is-invalid @enderror" 
                                                                                value="{{old('tgl_kawin_anak')}}" id="tgl_kawin_anak" aria-describedby="tgl_kawin_anak">
                                                                            @error('tgl_kawin_anak')
                                                                            <div id="tgl_kawin_anak" class="text-danger">
                                                                                {{$message}}
                                                                            </div>
                                                                            @enderror
                                                                            <span class="form-bar"></span>
                                                                            <label class="float-label">Tanggal Kawin</label>
                                                                        </div>
                                                                        
                                                                        <br>
                                                                        <div class="form-group row">
                                                                            <div class="col-sm-12">
                                                                            <select  class="form-control @error('status_tunjangan_anak') is-invalid @enderror" 
                                                                                        name="status_tunjangan_anak" value="{{old('status_tunjangan_anak')}}" 
                                                                                        aria-label="status_tunjangan_anak" id="status_tunjangan_anak">
                                                                                        <option selected value="">Pilih Status Tunjangan</option>
                                                                                            <option {{old('status_tunjangan_anak')=='Ya' ? 'selected' : '' }} 
                                                                                                value="Ya">Ya
                                                                                            </option>
                                                                                            <option {{old('status_tunjangan_anak')=='Tidak' ? 'selected' : '' }} 
                                                                                                value="Tidak">Tidak
                                                                                            </option>
                                                                                    </select>
                                                                                    @error('status_tunjangan_anak')
                                                                                    <div id="status_tunjangan_anak" class="text-danger">
                                                                                        {{$message}}
                                                                                    </div>
                                                                                    @enderror
                                                                            </div>
                                                                        </div>
                                                                        <br>
                                                                        <div class="form-group row">
                                                                            <div class="col-sm-12">
                                                                            <select  class="form-control @error('pendidikan_anak') is-invalid @enderror" 
                                                                                        name="pendidikan_anak" value="{{old('pendidikan_anak')}}" 
                                                                                        aria-label="pendidikan_anak" id="pendidikan_anak">
                                                                                        <option selected value="">Pilih Status Pendidikan Anak</option>
                                                                                        <option {{old('pendidikan_anak')=='Belum Sekolah' ? 'selected' : '' }} 
                                                                                            value="Belum Sekolah">Belum Sekolah
                                                                                        </option>
                                                                                        <option {{old('pendidikan_anak')=='TK/Paud' ? 'selected' : '' }} 
                                                                                            value="TK/Paud">TK/Paud
                                                                                        </option>
                                                                                        <option {{old('pendidikan_anak')=='SD Sederajat' ? 'selected' : '' }} 
                                                                                            value="SD Sederajat">SD Sederajat
                                                                                        </option>
                                                                                        <option {{old('pendidikan_anak')=='SMP Sederajat' ? 'selected' : '' }} 
                                                                                            value="SMP Sederajat">SMP Sederajat
                                                                                        </option>
                                                                                        <option {{old('pendidikan_anak')=='SMA Sederajat' ? 'selected' : '' }} 
                                                                                            value="SMA Sederajat">SMA Sederajat
                                                                                        </option>
                                                                                        <option {{old('pendidikan_anak')=='S1(Sarjana)' ? 'selected' : '' }} 
                                                                                            value="S1(Sarjana)">S1(Sarjana)
                                                                                        </option>
                                                                                        <option {{old('pendidikan_anak')=='S2(Master)' ? 'selected' : '' }} 
                                                                                            value="S2(Master)">S2(Master)
                                                                                        </option>
                                                                                        <option {{old('pendidikan_anak')=='S3(Doctor)' ? 'selected' : '' }} 
                                                                                            value="S3(Doctor)">S3(Doctor)
                                                                                        </option>
                                                                                    </select>
                                                                                    @error('pendidikan_anak')
                                                                                    <div id="pendidikan_anak" class="text-danger">
                                                                                        {{$message}}
                                                                                    </div>
                                                                                    @enderror
                                                                            </div>
                                                                        </div>
                                                                        <br>
                                                                        <div class="form-group form-default">
                                                                        <input type="text" 
                                                                                class="form-control @error('pekerjaan_anak') is-invalid @enderror" 
                                                                                name="pekerjaan_anak" value="{{old('pekerjaan_anak')}}" 
                                                                                id="pekerjaan_anak" aria-describedby="pekerjaan_anak">
                                                                            @error('pekerjaan_anak')
                                                                            <div id="pekerjaan_anak" class="text-danger">
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
                                                                            name="nip_anak">
                                                                            <br>
                                                                            <div class="form-group form-default">
                                                                        <textarea class="form-control @error('alamat_anak') is-invalid @enderror" 
                                                                                    value="{{old('alamat_anak')}}" name="alamat_anak" 
                                                                                    id="alamat_anak" rows="3">{{old('alamat_anak')}}</textarea>
                                                                            @error('alamat_anak')
                                                                            <div id="alamat_anak" class="text-danger">
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
                                                                                class="form-control @error('desa_kelurahan_anak') is-invalid @enderror" 
                                                                                name="desa_kelurahan_anak" value="{{old('desa_kelurahan_anak')}}" 
                                                                                id="desa_kelurahan_anak" aria-describedby="desa_kelurahan_anak">
                                                                            @error('desa_kelurahan_anak')
                                                                            <div id="desa_kelurahan_anak" class="text-danger">
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
                                                                                class="form-control @error('kecamatan_anak') is-invalid @enderror" 
                                                                                name="kecamatan_anak" value="{{old('kecamatan_anak')}}" 
                                                                                id="kecamatan_anak" aria-describedby="kecamatan_anak">
                                                                            @error('kecamatan_anak')
                                                                            <div id="kecamatan_anak" class="text-danger">
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
                                                                                class="form-control @error('kabupaten_kota_anak') is-invalid @enderror" 
                                                                                name="kabupaten_kota_anak" value="{{old('kabupaten_kota_anak')}}" 
                                                                                id="kabupaten_kota_anak" aria-describedby="kabupaten_kota_anak">
                                                                            @error('kabupaten_kota_anak')
                                                                            <div id="kabupaten_kota_anak" class="text-danger">
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
                                                                                class="form-control @error('provinsi_anak') is-invalid @enderror" 
                                                                                name="provinsi_anak" value="{{old('provinsi_anak')}}" 
                                                                                id="provinsi_anak" aria-describedby="provinsi_anak">
                                                                            @error('provinsi_anak')
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
                                                                                class="form-control @error('hp_anak') is-invalid @enderror" 
                                                                                name="hp_anak" value="{{old('hp_anak')}}" 
                                                                                id="hp_anak" aria-describedby="hp_anak">
                                                                            @error('hp_anak')
                                                                            <div id="hp_anak" class="text-danger">
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
                                                                                name="telepon_anak" class="form-control @error('telepon_anak') is-invalid @enderror" 
                                                                                value="{{old('telepon_anak')}}" 
                                                                                id="telepon_anak" aria-describedby="telepon_anak">
                                                                            @error('telepon_anak')
                                                                            <div id="telepon_anak" class="text-danger">
                                                                                {{$message}}
                                                                            </div>
                                                                            @enderror
                                                                            <span class="form-bar"></span>
                                                                            <label class="float-label">No.Telepon</label>
                                                                        </div>
                                                                        <br>
                                                                        <div class="form-group form-default">
                                                                        <input type="number" 
                                                                                class="form-control @error('kode_pos_anak') is-invalid @enderror" 
                                                                                name="kode_pos_anak" value="{{old('kode_pos_anak')}}" 
                                                                                id="kode_pos_anak" aria-describedby="kode_pos_anak">
                                                                            @error('kode_pos_anak')
                                                                            <div id="kode_pos_anak" class="text-danger">
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
                                                                            <label class="col-sm-6 col-form-label">File Akta Kelahiran (Format Pdf Maksimal 500kb)
                                                                                <span class="text-danger">*</span></label><br>
                                                                            <div class="col-sm-12">
                                                                            <input type="file" class="form-control @error('dokumen_anak') is-invalid @enderror" 
                                                                                    value="{{old('dokumen_anak')}}" id="dokumen_anak" name="dokumen_anak">
                                                                                    @error('dokumen_anak')
                                                                                    <div id="dokumen_anak" class="text-danger">
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
                                    </div>    </div>     </div>
                                                                    
                                                                    </div>
                                                                </div>
                                                            
                                                            <!-- Row end -->
                                                            <!-- Row start -->
                                                            
                                                            <!-- Row end -->
                                                        </div>
                                                    </div>
                                                    <!-- Material tab card end -->
                                                </div>
                                            </div>
                <!-- Page-header end -->
       
    </div>
    </div>
    </div>
    </div>
@endsection

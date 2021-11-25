@extends('klien.layouts.main')
@section('content')
<div class="pcoded-content">
    <!-- Page-header start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h1 class="m-b-10" style="color:white">Ubah Identitas</h1>
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
                    <!-- form pembuka -->
                    <form action="/klien/dataumum/identitas/update" method="post" enctype="multipart/form-data"
                        class="form-material">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Data Biografi</h5>
                                        <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                                    </div>
                                    {{-- ISIAN FORM --}}
                                    <div class="card-block">
                                        @csrf
                                        <div class="form-group form-default">
                                            <input type="number" class="form-control @error('nik') is-invalid @enderror"
                                                value="{{old('nik', $rowIdentitas['nik'])}}" id="nik" aria-describedby="nik"
                                                name="nik">
                                            @error('nik')
                                            <div id="nik" class="text-danger">
                                                {{$message}}
                                            </div>
                                            @enderror
                                            <span class="form-bar"></span>
                                            <label class="float-label">Nomor Induk Kependudukan (NIK) <span
                                                    class="text-danger">*</span></label></label>
                                        </div>
                                        <br>
                                        <div class="form-group form-default">
                                            <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                                value="{{old('nama', $rowIdentitas['nama'])}}" id="nama" aria-describedby="nama"
                                                name="nama">
                                            @error('nama')
                                            <div id="nama" class="text-danger">
                                                {{$message}}
                                            </div>
                                            @enderror
                                            <span class="form-bar"></span>
                                            <label class="float-label">Nama <span
                                                    class="text-danger">*</span></label></label>
                                        </div>
                                        <br>
                                        <div class="form-group form-default">
                                            <input type="text"
                                                class="form-control @error('tempat_lahir') is-invalid @enderror"
                                                value="{{old('tempat_lahir', $rowIdentitas['tempat_lahir'])}}" id="tempat_lahir"
                                                aria-describedby="tempat_lahir" name="tempat_lahir">
                                            @error('tempat_lahir')
                                            <div id="tempat_lahir" class="text-danger">
                                                {{$message}}
                                            </div>
                                            @enderror
                                            <span class="form-bar"></span>
                                            <label class="float-label">Tempat Lahir <span
                                                    class="text-danger">*</span></label></label>
                                        </div>
                                        <br>
                                        <div class="form-group form-default">
                                            <input type="date"
                                                class="form-control @error('tgl_lahir') is-invalid @enderror"
                                                value="{{old('tgl_lahir', $rowIdentitas['tgl_lahir'])}}" id="tgl_lahir"
                                                aria-describedby="tgl_lahir" name="tgl_lahir">
                                            @error('tgl_lahir')
                                            <div id="tgl_lahir" class="text-danger">
                                                {{$message}}
                                            </div>
                                            @enderror
                                            <span class="form-bar"></span>
                                            <label class="float-label">Tanggal Lahir <span
                                                    class="text-danger">*</span></label></label>
                                        </div>
                                        <br>
                                        <div class="form-group row">
                                            <label class="col-sm-6 col-form-label">Jenis Kelamin <span
                                                    class="text-danger">*</span></label></label>
                                            <div class="col-sm-12">
                                                <select
                                                    class="form-control @error('jenis_kelamin') is-invalid @enderror"
                                                    value="{{old('jenis_kelamin', $rowIdentitas['jenis_kelamin'])}}"
                                                    aria-label="jenis kelamin" name="jenis_kelamin" id="jenis_kelamin">
                                                    <option selected value=""></option>
                                                    <option {{$rowIdentitas['jenis_kelamin']=='L' ? 'selected' : '' }}
                                                        value="L">Laki-laki
                                                    </option>
                                                    <option {{$rowIdentitas['jenis_kelamin']=='P' ? 'selected' : '' }}
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
                                            <label class="col-sm-6 col-form-label">Agama <span
                                                    class="text-danger">*</span></label></label>
                                            <div class="col-sm-12">
                                                <select class="form-control @error('agama') is-invalid @enderror"
                                                    value="{{old('agama', $rowIdentitas['agama'])}}" aria-label="agama"
                                                    name="agama" id="agama">
                                                    <option value="">Pilih Agama</option>
                                                    @foreach ($rowsAgama as $rowAgama)
                                                    <option {{old('agama', $rowIdentitas['agama'])==$rowAgama ? 'selected' : ''
                                                        }} value="{{ $rowAgama }}">{{
                                                        $rowAgama }}</option>
                                                    @endforeach
                                                </select>
                                                @error('agama')
                                                <div id="agama" class="text-danger">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group row">
                                            <label class="col-sm-6 col-form-label">Golongan Darah <span
                                                    class="text-danger">*</span></label></label>
                                            <div class="col-sm-12">
                                                <select
                                                    class="form-control @error('golongan_darah') is-invalid @enderror"
                                                    value="{{old('golongan_darah', $rowIdentitas['golongan_darah'])}}"
                                                    aria-label="golongan darah" name="golongan_darah"
                                                    id="golongan_darah">
                                                    <option value="">Pilih Golongan Darah</option>
                                                    @foreach ($golonganDarah as $gd)
                                                    <option {{old('golongan_darah', $rowIdentitas['golongan_darah'])==$gd
                                                        ? 'selected' : '' }} value="{{ $gd }}">{{ $gd
                                                        }}</option>
                                                    @endforeach
                                                </select>
                                                @error('golongan_darah')
                                                <div id="golongan_darah" class="text-danger">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group row">
                                            <label class="col-sm-6 col-form-label">Status Perkawinan <span
                                                    class="text-danger">*</span></label></label>
                                            <div class="col-sm-12">
                                                <select class="form-control @error('status_kawin') is-invalid @enderror"
                                                    value="{{old('status_kawin', $rowIdentitas['status_kawin'])}}"
                                                    aria-label="status_kawin" name="status_kawin" id="status_kawin">
                                                    <option value="">Pilih Status Perkawinan</option>
                                                    @foreach ($rowsStatusKawin as $rowStatusKawin)
                                                    <option {{old('status_kawin',
                                                        $rowIdentitas['status_kawin'])==$rowStatusKawin ? 'selected' : '' }}
                                                        value="{{ $rowStatusKawin }}">{{ $rowStatusKawin }}</option>
                                                    @endforeach
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
                                            <input type="text"
                                                class="form-control @error('gelar_depan') is-invalid @enderror"
                                                value="{{old('gelar_depan', $rowIdentitas['gelar_depan'])}}" id="gelar_depan"
                                                aria-describedby="gelar_depan" name="gelar_depan">
                                            @error('gelar_depan')
                                            <div id="gelar_depan" class="text-danger">
                                                {{$message}}
                                            </div>
                                            @enderror
                                            <span class="form-bar"></span>
                                            <label class="float-label">Gelar Depan</label>
                                        </div>
                                        <br>
                                        <div class="form-group form-default">
                                            <input type="text"
                                                class="form-control @error('gelar_belakang') is-invalid @enderror"
                                                value="{{old('gelar_belakang', $rowIdentitas['gelar_belakang'])}}"
                                                id="gelar_belakang" aria-describedby="gelar_belakang"
                                                name="gelar_belakang">
                                            @error('gelar_belakang')
                                            <div id="gelar_belakang" class="text-danger">
                                                {{$message}}
                                            </div>
                                            @enderror
                                            <span class="form-bar"></span>
                                            <label class="float-label">Gelar Belakang</label>
                                        </div>
                                        <br>
                                        <div class="form-group form-default">
                                            <input type="number" class="form-control @error('hp') is-invalid @enderror"
                                                value="{{old('hp', $rowIdentitas['hp'])}}" id="hp" aria-describedby="hp"
                                                name="hp">
                                            @error('hp')
                                            <div id="hp" class="text-danger">
                                                {{$message}}
                                            </div>
                                            @enderror
                                            <span class="form-bar"></span>
                                            <label class="float-label">Handphone (HP) <span
                                                    class="text-danger">*</span></label></label>
                                        </div>
                                        <br>
                                        <div class="form-group form-default">
                                            <input type="number"
                                                class="form-control @error('telepon') is-invalid @enderror"
                                                value="{{old('telepon', $rowIdentitas['telepon'])}}" id="telepon"
                                                aria-describedby="telepon" name="telepon">
                                            @error('telepon')
                                            <div id="telepon" class="text-danger">
                                                {{$message}}
                                            </div>
                                            @enderror
                                            <span class="form-bar"></span>
                                            <label class="float-label">Telepon</label>
                                        </div>
                                        <br>
                                        <div class="form-group row">
                                            <label class="col-sm-6 col-form-label">Kelurahan <span
                                                    class="text-danger">*</span></label></label>
                                            <div class="col-sm-12">
                                                <select class="form-control @error('kelurahan_id') is-invalid @enderror"
                                                    value="{{old('kelurahan_id', $rowIdentitas['kelurahan_id'])}}"
                                                    aria-label="kelurahan" name="kelurahan_id" id="kelurahan_id">
                                                    <option value="">Pilih Kelurahan</option>
                                                    @foreach ($rowsKelurahan as $rowKelurahan)
                                                    <option {{old('kelurahan_id',
                                                        $rowIdentitas['kelurahan_id'])==$rowKelurahan['kelurahan_id']
                                                        ? 'selected' : '' }}
                                                        value="{{ $rowKelurahan['kelurahan_id'] }}">
                                                        {{$rowKelurahan['nama_kelurahan']}}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                @error('kelurahan_id')
                                                <div id="kelurahan_id" class="text-danger">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group row">
                                            <label class="col-sm-6 col-form-label">Kecamatan <span
                                                    class="text-danger">*</span></label></label>
                                            <div class="col-sm-12">
                                                <select class="form-control @error('kecamatan_id') is-invalid @enderror"
                                                    value="{{old('kecamatan_id', $rowIdentitas['kecamatan_id'])}}"
                                                    aria-label="kecamatan" name="kecamatan_id" id="kecamatan_id">
                                                    <option value="">Pilih Kecamatan</option>
                                                    @foreach ($rowsKecamatan as $rowKecamatan)
                                                    <option {{old('kecamatan_id',
                                                        $rowIdentitas['kecamatan_id'])==$rowKecamatan['kecamatan_id']
                                                        ? 'selected' : '' }}
                                                        value="{{ $rowKecamatan['kecamatan_id'] }}">{{
                                                        $rowKecamatan['nama_kecamatan']
                                                        }}</option>
                                                    @endforeach
                                                </select>
                                                @error('kecamatan_id')
                                                <div id="kecamatan_id" class="text-danger">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group form-default">
                                            <input type="text" class="form-control @error('rt_rw') is-invalid @enderror"
                                                value="{{old('rt_rw', $rowIdentitas['rt_rw'])}}" id="rt_rw"
                                                aria-describedby="rt_rw" name="rt_rw">
                                            @error('rt_rw')
                                            <div id="rt_rw" class="text-danger">
                                                {{$message}}
                                            </div>
                                            @enderror
                                            <span class="form-bar"></span>
                                            <label class="float-label">RT/RW (Contoh : 007/002) <span
                                                    class="text-danger">*</span></label></label>
                                        </div>
                                        <br>
                                        <div class="form-group form-default">
                                            <input type="number"
                                                class="form-control @error('npwp') is-invalid @enderror"
                                                value="{{old('npwp', $rowIdentitas['npwp'])}}" id="npwp" aria-describedby="npwp"
                                                name="npwp">
                                            @error('npwp')
                                            <div id="npwp" class="text-danger">
                                                {{$message}}
                                            </div>
                                            @enderror
                                            <span class="form-bar"></span>
                                            <label class="float-label">NPWP <span
                                                    class="text-danger">*</span></label></label>
                                        </div>
                                        <br>
                                        <div class="form-group form-default">
                                            <input type="number"
                                                class="form-control @error('no_bpjs') is-invalid @enderror"
                                                value="{{old('no_bpjs', $rowIdentitas['no_bpjs'])}}" id="no_bpjs"
                                                aria-describedby="nomor bpjs" name="no_bpjs">
                                            @error('no_bpjs')
                                            <div id="no_bpjs" class="text-danger">
                                                {{$message}}
                                            </div>
                                            @enderror
                                            <span class="form-bar"></span>
                                            <label class="float-label">Nomor BPJS <span
                                                    class="text-danger">*</span></label></label>
                                        </div>
                                        <br>

                                        <div class="form-group row">
                                            <label class="col-sm-6 col-form-label">Foto (Format JPG, JPEG, PNG, Maksimal
                                                500Kb)
                                                <span class="text-danger">*</span></label><br>
                                            <div class="col-sm-12">
                                                <input type="file"
                                                    class="form-control  @error('foto') is-invalid @enderror"
                                                    value="{{old('foto')}}" id="foto" name="foto">

                                                @error('foto')
                                                <div id="foto" class="text-danger">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <!-- colom ke dua -->
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Data PNS</h5>
                                        <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                                    </div>
                                    {{-- ISIAN FORM --}}
                                    <div class="card-block">
                                        <div class="form-group form-default">
                                            <input type="number" class="form-control @error('nip') is-invalid @enderror"
                                                value="{{old('nip', $rowIdentitas['nip'])}}" id="nip" aria-describedby="nip"
                                                name="nip">
                                            @error('nip')
                                            <div id="nip" class="text-danger">
                                                {{$message}}
                                            </div>
                                            @enderror
                                            <span class="form-bar"></span>
                                            <label class="float-label">Nomor Induk Pegawai (NIP) <span
                                                    class="text-danger">*</span></label></label>
                                        </div>
                                        <br>

                                        <div class="form-group form-default">
                                            <input type="text"
                                                class="form-control @error('no_karpeg') is-invalid @enderror"
                                                value="{{old('no_karpeg', $rowIdentitas['no_karpeg'])}}" id="no_karpeg"
                                                aria-describedby="nomor kartu pegawai" name="no_karpeg">
                                            @error('no_karpeg')
                                            <div id="no_karpeg" class="text-danger">
                                                {{$message}}
                                            </div>
                                            @enderror
                                            <span class="form-bar"></span>
                                            <label class="float-label">Nomor Karpeg <span
                                                    class="text-danger">*</span></label></label>
                                        </div>
                                        <br>
                                        <div class="form-group form-default">
                                            <input type="text"
                                                class="form-control @error('no_taspen') is-invalid @enderror"
                                                value="{{old('no_taspen', $rowIdentitas['no_taspen'])}}" id="no_taspen"
                                                aria-describedby="nomor taspen" name="no_taspen">
                                            @error('no_taspen')
                                            <div id="no_taspen" class="text-danger">
                                                {{$message}}
                                            </div>
                                            @enderror
                                            <span class="form-bar"></span>
                                            <label class="float-label">Nomor Taspen <span
                                                    class="text-danger">*</span></label></label>
                                        </div>
                                        <br>
                                        <div class="form-group form-default">
                                            <input type="text"
                                                class="form-control @error('no_kariskarsu') is-invalid @enderror"
                                                value="{{old('no_kariskarsu', $rowIdentitas['no_kariskarsu'])}}"
                                                id="no_kariskarsu" aria-describedby="nomor karis atau karsu"
                                                name="no_kariskarsu">
                                            @error('no_kariskarsu')
                                            <div id="no_kariskarsu" class="text-danger">
                                                {{$message}}
                                            </div>
                                            @enderror
                                            <span class="form-bar"></span>
                                            <label class="float-label">Nomor Karis/Karsu <span
                                                    class="text-danger">*</span></label> </label>
                                        </div>
                                        <br>
                                        <div class="form-group row">
                                            <label class="col-sm-6 col-form-label">Bantuan Bepetarum PNS <span
                                                    class="text-danger">*</span></label> </label>
                                            <div class="col-sm-12">
                                                <select
                                                    class="form-control @error('bantuan_bepetarum_pns') is-invalid @enderror"
                                                    value="{{old('bantuan_bepetarum_pns', $rowIdentitas['bantuan_bepetarum_pns'])}}"
                                                    aria-label="bantuan bepetarum pns" id="bantuan_bepetarum_pns"
                                                    name="bantuan_bepetarum_pns">
                                                    <option value="">Pilih Bantuan Bepetarum PNS</option>

                                                    @foreach ($rowsBBP as $rowBBP)
                                                    <option {{old('bantuan_bepetarum_pns',
                                                        $rowIdentitas['bantuan_bepetarum_pns'])==$rowBBP ? 'selected' : '' }}
                                                        value="{{ $rowBBP }}">{{ $rowBBP }}</option>
                                                    @endforeach
                                                </select>
                                                @error('bantuan_bepetarum_pns')
                                                <div id="bantuan_bepetarum_pns" class="text-danger">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group form-default">
                                            <input type="number"
                                                class="form-control @error('tahun_bantuan_bepetarum_pns') is-invalid @enderror"
                                                value="{{old('tahun_bantuan_bepetarum_pns', $rowIdentitas['tahun_bantuan_bepetarum_pns'])}}"
                                                id="tahun_bantuan_bepetarum_pns"
                                                aria-describedby="tahun bantuan bepetarum PNS "
                                                name="tahun_bantuan_bepetarum_pns">
                                            @error('tahun_bantuan_bepetarum_pns')
                                            <div id="tahun_bantuan_bepetarum_pns" class="text-danger">
                                                {{$message}}
                                            </div>
                                            @enderror
                                            <span class="form-bar"></span>
                                            <label class="float-label">Tahun Bantuan Bepetarum <span
                                                    class="text-danger">*</span></label></label>
                                        </div>
                                        <br>
                                        <div class="form-group row">
                                            <label class="col-sm-6 col-form-label">Status Kepegawaian <span
                                                    class="text-danger">*</span></label></label>
                                            <div class="col-sm-12">
                                                <select
                                                    class="form-control @error('status_kepegawaian') is-invalid @enderror"
                                                    value="{{old('status_kepegawaian', $rowIdentitas['status_kepegawaian'])}}"
                                                    aria-label="status kepegawaian" id="status_kepegawaian"
                                                    name="status_kepegawaian">
                                                    <option value="">Pilih Status Kepegawaian</option>
                                                    @foreach ($rowsStatusPegawai as $rowStatusPegawai)
                                                    <option {{old('status_kepegawaian',
                                                        $rowIdentitas['status_kepegawaian'])==$rowStatusPegawai ? 'selected'
                                                        : '' }} value="{{ $rowStatusPegawai}}">{{ $rowStatusPegawai }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                @error('status_kepegawaian')
                                                <div id="status_kepegawaian" class="text-danger">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group row">
                                            <label class="col-sm-6 col-form-label">Jenis Kepegawaian <span
                                                    class="text-danger">*</span></label></label>
                                            <div class="col-sm-12">
                                                <select
                                                    class="form-control @error('jenis_kepegawaian') is-invalid @enderror"
                                                    value="{{old('jenis_kepegawaian', $rowIdentitas['jenis_kepegawaian'])}}"
                                                    aria-label="jenis kepegawaian" id="jenis_kepegawaian"
                                                    name="jenis_kepegawaian">
                                                    <option value="">Pilih Jenis Kepegawaian</option>
                                                    @foreach ($rowsJenisPegawai as $rowJenisPegawai)
                                                    <option {{old('jenis_kepegawaian',
                                                        $rowIdentitas['jenis_kepegawaian'])==$rowJenisPegawai ? 'selected' : ''
                                                        }} value="{{ $rowJenisPegawai }}">{{ $rowJenisPegawai }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                @error('jenis_kepegawaian')
                                                <div id="jenis_kepegawaian" class="text-danger">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group row">
                                            <label class="col-sm-6 col-form-label">Kedudukan Kepegawaian<span
                                                    class="text-danger">*</span></label></label>
                                            <div class="col-sm-12">
                                                <select
                                                    class="form-control @error('kedudukan_kepegawaian') is-invalid @enderror"
                                                    value="{{old('kedudukan_kepegawaian', $rowIdentitas['kedudukan_kepegawaian'])}}"
                                                    aria-label="kedudukan kepegawaian" id="kedudukan_kepegawaian"
                                                    name="kedudukan_kepegawaian">
                                                    <option value="">Pilih Kedudukan Kepegawaian</option>
                                                    @foreach ($rowsKedudukanPegawai as $rowKedudukanPegawai)
                                                    <option {{old('kedudukan_kepegawaian',
                                                        $rowIdentitas['kedudukan_kepegawaian'])==$rowKedudukanPegawai
                                                        ? 'selected' : '' }} value="{{ $rowKedudukanPegawai }}">{{
                                                        $rowKedudukanPegawai }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                @error('kedudukan_kepegawaian')
                                                <div id="kedudukan_kepegawaian" class="text-danger">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group row">
                                            <label class="col-sm-6 col-form-label">Pangkat <span
                                                    class="text-danger">*</span></label></label>
                                            <div class="col-sm-12">
                                                <select class="form-control @error('pangkat_id') is-invalid @enderror"
                                                    value="{{old('pangkat_id', $rowIdentitas['pangkat_id'])}}"
                                                    aria-label="pangkat" id="pangkat_id" name="pangkat_id">
                                                    <option value="">Pilih Pangkat</option>
                                                    @foreach ($rowsPangkat as $rowPangkat)
                                                    <option {{old('pangkat_id',
                                                        $rowIdentitas['pangkat_id'])==$rowPangkat['pangkat_id'] ? 'selected'
                                                        : '' }} value="{{ $rowPangkat['pangkat_id'] }}">{{
                                                        $rowPangkat['pangkat'] }}</option>
                                                    @endforeach
                                                </select>
                                                @error('pangkat_id')
                                                <div id="pangkat_id" class="text-danger">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </div>

                                        </div>
                                        <br>
                                        <div class="form-group row">
                                            <label class="col-sm-6 col-form-label">Jabatan <span
                                                    class="text-danger">*</span></label></label>
                                            <div class="col-sm-12">
                                                <select class="form-control @error('jabatan_id') is-invalid @enderror"
                                                    value="{{old('jabatan_id', $rowIdentitas['jabatan_id'])}}"
                                                    aria-label="jabatan" id="jabatan_id" name="jabatan_id">
                                                    <option value="">Pilih Jabatan</option>
                                                    @foreach ($rowsJabatan as $rowJabatan)
                                                    <option {{old('jabatan_id',
                                                        $rowIdentitas['jabatan_id'])==$rowJabatan['jabatan_id'] ? 'selected'
                                                        : '' }} value="{{ $rowJabatan['jabatan_id'] }}">{{
                                                        $rowJabatan['nama_jabatan'] }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                @error('jabatan_id')
                                                <div id="jabatan_id" class="text-danger">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group row">
                                            <label class="col-sm-6 col-form-label">Unit Kerja <span
                                                    class="text-danger">*</span></label></label>
                                            <div class="col-sm-12">
                                                <select
                                                    class="form-control @error('unit_kerja_id') is-invalid @enderror"
                                                    value="{{old('unit_kerja_id', $rowIdentitas['unit_kerja_id'])}}"
                                                    aria-label="unit kerja" name="unit_kerja_id" id="unit_kerja_id">
                                                    <option value="">Pilih Unit Kerja</option>
                                                    @foreach ($rowsUnitKerja as $rowUnitKerja)
                                                    <option {{old('unit_kerja_id',
                                                        $rowIdentitas['unit_kerja_id'])==$rowUnitKerja['unit_kerja_id']
                                                        ? 'selected' : '' }}
                                                        value="{{ $rowUnitKerja['unit_kerja_id'] }}">{{
                                                        $rowUnitKerja['nama_unit'] }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                @error('unit_kerja_id')
                                                <div id="unit_kerja_id" class="text-danger">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group row">
                                            <label class="col-sm-6 col-form-label">Kartu Pegawai (Format PDF, Maksimal
                                                500Kb)
                                                <span class="text-danger">*</span></label><br>
                                            <div class="col-sm-12">
                                                <input type="file"
                                                    class="form-control  @error('karpeg') is-invalid @enderror"
                                                    value="{{old('karpeg')}}" id="karpeg" name="karpeg">
                                                @error('karpeg')
                                                <div id="karpeg" class="text-danger">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group row">
                                            <label class="col-sm-6 col-form-label">Berkala Terakhir (Format PDF,
                                                Maksimal 500Kb)
                                                <span class="text-danger">*</span></label><br>
                                            <div class="col-sm-12">
                                                <input type="file"
                                                    class="form-control  @error('berkala_terakhir') is-invalid @enderror"
                                                    value="{{old('berkala_terakhir')}}" id="berkala_terakhir"
                                                    name="berkala_terakhir">
                                                @error('berkala_terakhir')
                                                <div id="berkala_terakhir" class="text-danger">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <br>
                                        <button type="submit" class="btn btn-primary"
                                            style="float: right">Kirim</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
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
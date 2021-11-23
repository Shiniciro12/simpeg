@extends('klien.layouts.main')
@section('content')
<div class="pcoded-content">
    <!-- Page-header start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h1 class="m-b-10" style="color:white">{{ $page }}</h1>
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
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Form Tambah Pendidikan</h5>
                                    <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                                </div>
                                {{-- ISIAN FORM --}}
                                <div class="card-block">
                                    <form action="/klien/dataumum/riwayat-pendidikan/store" method="post"
                                        enctype="multipart/form-data" class="form-material">
                                        @csrf
                                        <input type="hidden" value="{{auth()->user()->identitas_id}}"
                                            name="identitas_id">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <select
                                                    class="form-control @error('tingkat_pendidikan') is-invalid @enderror"
                                                    required value="{{old('tingkat_pendidikan')}}"
                                                    name="tingkat_pendidikan" aria-label="tingkat_pendidikan"
                                                    id="tingkat_pendidikan">
                                                    <option value="">Pilih Tingkat Pendidikan</option>
                                                    <option {{old('tingkat_pendidikan')=='SD/Sederajat' ? 'selected'
                                                        : '' }} value="SD/Sederajat">
                                                        SD/Sederajat
                                                    </option>
                                                    <option {{old('tingkat_pendidikan')=='SMP/Sederajat' ? 'selected'
                                                        : '' }} value="SMP/Sederajat">
                                                        SMP/Sederajat
                                                    </option>
                                                    <option {{old('tingkat_pendidikan')=='SMA/Sederajat' ? 'selected'
                                                        : '' }} value="SMA/Sederajat">
                                                        SMA/Sederajat
                                                    </option>
                                                    <option {{old('tingkat_pendidikan')=='Diploma III' ? 'selected' : ''
                                                        }} value="Diploma III">
                                                        Diploma III
                                                    </option>
                                                    <option {{old('tingkat_pendidikan')=='Diploma IV' ? 'selected' : ''
                                                        }} value="Diploma IV">
                                                        Diploma IV
                                                    </option>
                                                    <option {{old('tingkat_pendidikan')=='S1' ? 'selected' : '' }}
                                                        value="S1">
                                                        S1
                                                    </option>
                                                    <option {{old('tingkat_pendidikan')=='S2' ? 'selected' : '' }}
                                                        value="S2">
                                                        S2
                                                    </option>
                                                    <option {{old('tingkat_pendidikan')=='S3' ? 'selected' : '' }}
                                                        value="S3">
                                                        S3
                                                    </option>
                                                </select>
                                                @error('tingkat_pendidikan')
                                                <div id="tingkat_pendidikan" class="text-danger">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                                <span class="form-bar"></span>
                                            </div>
                                        </div>
                                        <br>

                                        <div class="form-group form-default">
                                            <input type="text" name="jurusan"
                                                class="form-control @error('jurusan') is-invalid @enderror"
                                                value="{{old('jurusan')}}" id="jurusan" aria-describedby="jurusan"
                                                name="jurusan">
                                            @error('jurusan')
                                            <div id="jurusan" class="text-danger">
                                                {{$message}}
                                            </div>
                                            @enderror
                                            <span class="form-bar"></span>
                                            <label class="float-label">Jurusan
                                                <span class="text-danger">*</span></label>
                                        </div>
                                        <br>
                                        <div class="form-group form-default">
                                            <input type="nama_lembaga_pendidikan" name="nama_lembaga_pendidikan"
                                                class="form-control @error('nama_lembaga_pendidikan') is-invalid @enderror"
                                                value="{{old('nama_lembaga_pendidikan')}}" id="nama_lembaga_pendidikan"
                                                aria-describedby="nama_lembaga_pendidikan"
                                                name="nama_lembaga_pendidikan">
                                            @error('nama_lembaga_pendidikan')
                                            <div id="nama_lembaga_pendidikan" class="text-danger">
                                                {{$message}}
                                            </div>
                                            @enderror
                                            <span class="form-bar"></span>
                                            <label class="float-label">Nama Lembaga Pendidikan
                                                <span class="text-danger">*</span></label>
                                        </div>
                                        <br>
                                        <div class="form-group form-default">
                                            <input type="text" name="tempat"
                                                class="form-control @error('tempat') is-invalid @enderror"
                                                value="{{old('tempat')}}" id="tempat" aria-describedby="tempat"
                                                name="tempat">
                                            @error('tempat')
                                            <div id="tempat" class="text-danger">
                                                {{$message}}
                                            </div>
                                            @enderror
                                            <span class="form-bar"></span>
                                            <label class="float-label">Tempat
                                                <span class="text-danger">*</span></label>
                                        </div>
                                        <br>
                                        <div class="form-group form-default">
                                            <input type="text" name="nama_kepsek_rektor"
                                                class="form-control @error('nama_kepsek_rektor') is-invalid @enderror"
                                                value="{{old('nama_kepsek_rektor')}}" id="nama_kepsek_rektor"
                                                aria-describedby="nama_kepsek_rektor" name="nama_kepsek_rektor">
                                            @error('nama_kepsek_rektor')
                                            <div id="nama_kepsek_rektor" class="text-danger">
                                                {{$message}}
                                            </div>
                                            @enderror
                                            <span class="form-bar"></span>
                                            <label class="float-label">Nama Kepsek/Rektor
                                                <span class="text-danger">*</span></label>
                                        </div>
                                        <br>
                                        <div class="form-group form-default">
                                            <input type="text" name="no_sttb"
                                                class="form-control @error('no_sttb') is-invalid @enderror"
                                                value="{{old('no_sttb')}}" id="no_sttb" aria-describedby="no_sttb"
                                                name="no_sttb">
                                            @error('no_sttb')
                                            <div id="no_sttb" class="text-danger">
                                                {{$message}}
                                            </div>
                                            @enderror
                                            <span class="form-bar"></span>
                                            <label class="float-label">No Ijazah
                                                <span class="text-danger">*</span></label>
                                        </div>
                                        <br>
                                        <div class="form-group form-default">
                                            <input type="date" name="tgl_sttb"
                                                class="form-control @error('tgl_sttb') is-invalid @enderror"
                                                value="{{old('tgl_sttb')}}" id="tgl_sttb" aria-describedby="tgl_sttb"
                                                name="tgl_sttb">
                                            @error('tgl_sttb')
                                            <div id="tgl_sttb" class="text-danger">
                                                {{$message}}
                                            </div>
                                            @enderror
                                            <span class="form-bar"></span>
                                            <label class="float-label">Tanggal Ijazah
                                                <span class="text-danger">*</span></label>
                                        </div>
                                        <br>
                                        <div class="form-group row">
                                            <label class="col-sm-6 col-form-label">File Ijazah (Format Pdf Maksimal
                                                500kb)
                                                <span class="text-danger">*</span></label><br>
                                            <div class="col-sm-12">
                                                <input type="file" required name="sttb"
                                                    class="form-control @error('sttb') is-invalid @enderror"
                                                    value="{{old('sttb')}}" id="sttb" accept=".pdf" name="sttb">
                                                @error('sttb')
                                                <div id="sttb" class="text-danger">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group row">
                                            <label class="col-sm-6 col-form-label">Transkip Ijazah (Format Pdf Maksimal
                                                500kb)
                                                <span class="text-danger">*</span></label><br>
                                            <div class="col-sm-12">
                                                <input type="file" required name="transkrip"
                                                    class="form-control @error('transkrip') is-invalid @enderror"
                                                    value="{{old('transkrip')}}" id="transkrip" accept=".pdf"
                                                    name="transkrip">

                                                @error('transkrip')
                                                <div id="transkrip" class="text-danger">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                                <span class="form-bar"></span>
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
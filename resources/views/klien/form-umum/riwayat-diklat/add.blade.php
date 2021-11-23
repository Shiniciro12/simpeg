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
                                    <h5>Form Tambah Diklat</h5>
                                    <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                                </div>
                                {{-- ISIAN FORM --}}

                                <div class="card-block">
                                    <form action="/klien/dataumum/diklat/store" method="post" class="form-material"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" value="{{ auth()->user()->identitas_id }}"
                                            name="identitas_id">

                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <select class="form-control @error('status') is-invalid @enderror"
                                                    value="{{ old('status') }}" name="status" aria-label="status"
                                                    id="status">
                                                    <option value="">Pilih Riwayat Diklat</option>
                                                    <option {{ old('status')=='Diklat Struktural' ? 'selected' : '' }}
                                                        value="Diklat Struktural">
                                                        Diklat Struktural
                                                    </option>
                                                    <option {{ old('status')=='Diklat Fungsional' ? 'selected' : '' }}
                                                        value="Diklat Fungsional">
                                                        Diklat Fungsional
                                                    </option>
                                                    <option {{ old('status')=='Diklat Teknis' ? 'selected' : '' }}
                                                        value="Diklat Teknis">Diklat
                                                        Teknis
                                                    </option>
                                                </select>
                                                @error('status')
                                                <div id="status" class="text-danger">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                                <span class="form-bar"></span>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group form-default">
                                            <input type="text" name="nama"
                                                class="form-control @error('nama') is-invalid @enderror"
                                                value="{{ old('nama') }}" id="nama" aria-describedby="nama" name="nama">
                                            @error('nama')
                                            <div id="nama" class="text-danger">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                            <span class="form-bar"></span>
                                            <label class="float-label">Nama Diklat <span
                                                    class="text-danger">*</span></label>
                                        </div>
                                        <br>
                                        <div class="form-group form-default">
                                            <input type="text" name="tempat"
                                                class="form-control @error('tempat') is-invalid @enderror"
                                                value="{{ old('tempat') }}" id="tempat" aria-describedby="tempat"
                                                name="tempat">
                                            @error('tempat')
                                            <div id="tempat" class="text-danger">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                            <span class="form-bar"></span>
                                            <label class="float-label">Tempat Diklat <span
                                                    class="text-danger">*</span></label>
                                        </div>
                                        <br>
                                        <div class="form-group form-default">
                                            <input type="text" name="penyelenggara"
                                                class="form-control @error('penyelenggara') is-invalid @enderror"
                                                value="{{ old('penyelenggara') }}" id="penyelenggara"
                                                aria-describedby="penyelenggara" name="penyelenggara">
                                            @error('penyelenggara')
                                            <div id="penyelenggara" class="text-danger">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                            <span class="form-bar"></span>
                                            <label class="float-label">Penyelenggara <span
                                                    class="text-danger">*</span></label>
                                        </div>
                                        <br>
                                        <div class="form-group form-default">
                                            <input type="text" name="angka"
                                                class="form-control @error('angka') is-invalid @enderror"
                                                value="{{ old('angka') }}" id="angka" aria-describedby="angka"
                                                name="angka">
                                            @error('angka')
                                            <div id="angka" class="text-danger">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                            <span class="form-bar"></span>
                                            <label class="float-label">Angka</label>
                                        </div>
                                        <br>
                                        <div class="form-group form-default">
                                            <input type="date" name="tgl_mulai"
                                                class="form-control @error('tgl_mulai') is-invalid @enderror"
                                                value="{{ old('tgl_mulai') }}" id="tgl_mulai"
                                                aria-describedby="tgl_mulai" name="tgl_mulai">
                                            @error('tgl_mulai')
                                            <div id="tgl_mulai" class="text-danger">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                            <span class="form-bar"></span>
                                            <label class="float-label">Tanggal Mulai <span
                                                    class="text-danger">*</span></label>
                                        </div>
                                        <br>
                                        <div class="form-group form-default">
                                            <input type="date" name="tgl_selesai"
                                                class="form-control @error('tgl_selesai') is-invalid @enderror"
                                                value="{{ old('tgl_selesai') }}" id="tgl_selesai"
                                                aria-describedby="tgl_selesai" name="tgl_selesai">
                                            @error('tgl_selesai')
                                            <div id="tgl_selesai" class="text-danger">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                            <span class="form-bar"></span>
                                            <label class="float-label">Tanggal Selesai <span
                                                    class="text-danger">*</span></label>
                                        </div>
                                        <br>
                                        <div class="form-group form-default">
                                            <input type="number" name="jam"
                                                class="form-control @error('jam') is-invalid @enderror"
                                                value="{{ old('jam') }}" id="jam" aria-describedby="jam" name="jam"
                                                min="0">
                                            @error('jam')
                                            <div id="jam" class="text-danger">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                            <span class="form-bar"></span>
                                            <label class="float-label">Jam</label>
                                        </div>
                                        <br>
                                        <div class="form-group form-default">
                                            <input type="text" name="no_sttp"
                                                class="form-control @error('no_sttp') is-invalid @enderror"
                                                value="{{ old('no_sttp') }}" id="no_sttp" aria-describedby="no_sttp"
                                                name="no_sttp">
                                            @error('no_sttp')
                                            <div id="no_sttp" class="text-danger">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                            <span class="form-bar"></span>
                                            <label class="float-label">Nomor Sertifikat <span
                                                    class="text-danger">*</span></label>
                                        </div>
                                        <br>
                                        <div class="form-group form-default">
                                            <input type="date" name="tgl_sttp"
                                                class="form-control @error('tgl_sttp') is-invalid @enderror"
                                                value="{{ old('tgl_sttp') }}" id="tgl_sttp" aria-describedby="tgl_sttp"
                                                name="tgl_sttp">
                                            @error('tgl_sttp')
                                            <div id="tgl_sttp" class="text-danger">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                            <span class="form-bar"></span>
                                            <label class="float-label">Tanggal Sertifikat<span
                                                    class="text-danger">*</span></label>
                                        </div>
                                        <br>
                                        <div class="form-group row">
                                            <label class="col-sm-6 col-form-label">File Sertifikat (Fotmat Pdf Maksimal
                                                500kb)
                                                <span class="text-danger">*</span></label><br>
                                            <div class="col-sm-12">
                                                <input type="file" name="sertifikat"
                                                    class="form-control @error('sertifikat') is-invalid @enderror"
                                                    value="{{ old('sertifikat') }}" id="sertifikat" accept=".pdf"
                                                    name="sertifikat">
                                                @error('sertifikat')
                                                <div id="sertifikat" class="text-danger">
                                                    {{ $message }}
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
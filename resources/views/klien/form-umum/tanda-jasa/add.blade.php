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
                                    <h5>Form Tambah Tanda Jasa</h5>
                                </div>
                                {{-- ISIAN FORM --}}
                                <div class="card-block">
                                    <form action="/klien/dataumum/tandajasa/store" method="post"
                                        enctype="multipart/form-data" class="form-material">
                                        @csrf
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <div class="form-group form-default">
                                                    <input type="text" name="nama"
                                                        class="form-control @error('nama') is-invalid @enderror"
                                                        value="{{old('nama')}}" id="nama" aria-describedby="nama">
                                                    @error('nama')
                                                    <div id="nama" class="text-danger">
                                                        {{$message}}
                                                    </div>
                                                    @enderror
                                                    <span class="form-bar"></span>
                                                    <label class="float-label">Nama Tanda Jasa <span
                                                            class="text-danger">*</span></label>
                                                </div>
                                                <br>
                                                <div class="form-group form-default">
                                                    <input type="text" name="no_sk"
                                                        class="form-control @error('no_sk') is-invalid @enderror"
                                                        value="{{old('no_sk')}}" id="no_sk" aria-describedby="no_sk">
                                                    @error('no_sk')
                                                    <div id="no_sk" class="text-danger">
                                                        {{$message}}
                                                    </div>
                                                    @enderror
                                                    <span class="form-bar"></span>
                                                    <label class="float-label">No SK <span
                                                            class="text-danger">*</span></label>
                                                </div>
                                                <br>
                                                <div class="form-group form-default">
                                                    <input type="date" name="tgl_sk"
                                                        class="form-control @error('tgl_sk') is-invalid @enderror"
                                                        value="{{old('tgl_sk')}}" id="tgl_sk" aria-describedby="tgl_sk">
                                                    @error('tgl_sk')
                                                    <div id="tgl_sk" class="text-danger">
                                                        {{$message}}
                                                    </div>
                                                    @enderror
                                                    <span class="form-bar"></span>
                                                    <label class="float-label">Tanggal SK <span
                                                            class="text-danger">*</span></label>
                                                </div>
                                                <br>
                                                <div class="form-group form-default">
                                                    <input type="number" name="tahun"
                                                        class="form-control @error('tahun') is-invalid @enderror"
                                                        value="{{old('tahun')}}" id="tahun" aria-describedby="tahun">
                                                    @error('tahun')
                                                    <div id="tahun" class="text-danger">
                                                        {{$message}}
                                                    </div>
                                                    @enderror
                                                    <span class="form-bar"></span>
                                                    <label class="float-label">Tahun <span
                                                            class="text-danger">*</span></label>
                                                </div>
                                                <br>
                                                <div class="form-group form-default">
                                                    <input type="text" name="asal_perolehan"
                                                        class="form-control @error('asal_perolehan') is-invalid @enderror"
                                                        value="{{old('asal_perolehan')}}" id="asal_perolehan"
                                                        aria-describedby="asal_perolehan">
                                                    @error('asal_perolehan')
                                                    <div id="asal_perolehan" class="text-danger">
                                                        {{$message}}
                                                    </div>
                                                    @enderror
                                                    <span class="form-bar"></span>
                                                    <label class="float-label">Asal Perolehan <span
                                                            class="text-danger">*</span></label>
                                                </div>
                                                <br>
                                                <div class="form-group row">
                                                    <label class="col-sm-6 col-form-label">File SK (Fotmat Pdf Maksimal
                                                        500kb)
                                                        <span class="text-danger">*</span></label><br>
                                                    <div class="col-sm-12">
                                                        <input type="file"
                                                            class="form-control @error('sertifikat') is-invalid @enderror"
                                                            value="{{old('sertifikat')}}" id="sertifikat"
                                                            name="sertifikat">
                                                        @error('sertifikat')
                                                        <div id="sertifikat" class="text-danger">
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
@extends('klien.layouts.main')
@section('content')
<div class="pcoded-content">
        <!-- Page-header start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <div class="page-header-title">
                            <h1 class="m-b-10" style="color:white">Riwayat Pangkat</h1>
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
                                        <h5>Form Riwayat Jabatan</h5>
                                        <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                                    </div>
                                    {{-- ISIAN FORM --}}

                                    <div class="card-block">
                                        <form action="/klien/dataumum/riwayat-jabatan/store" method="post"
                                            enctype="multipart/form-data" class="form-material">
                                            @csrf
                                            <input type="hidden" value="{{auth()->user()->identitas_id}}" name="identitas_id">

                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                <select class="form-control" name="jabatan_id" id="jabatan_id" required value="{{old('jabatan_id')}}">
                                                 <option value="" disabled selected>Pilih Jabatan</option>

                                                @foreach ($rowsJabatan as $rowJabatan)
                                                <option {{old('jabatan_id')==$rowJabatan['jabatan_id'] ? 'selected' : '' }} value="{{ $rowJabatan['jabatan_id'] }}">{{ $rowJabatan['nama_jabatan']
                                                 }}</option>
                                                 @endforeach

                                                    </select>
                                                    @error('jabatan_id')
                                                        <div id="jabatan_id" class="text-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <br>

                                            <div class="form-group form-default">
                                                   <input type="text" class="form-control @error('pejabat') is-invalid @enderror" value="{{old('pejabat')}}" id="pejabat" aria-describedby="pejabat" name="pejabat">
                                            @error('pejabat')
                                        <div id="pejabat" class="text-danger">
                                            {{$message}}
                                            </div>
                                            @enderror
                                                <span class="form-bar"></span>
                                                <label class="float-label">Pejabat
                                                    <span class="text-danger">*</span></label>
                                            </div>
                                            <br>
                                            <div class="form-group form-default">
                                            <input type="text" class="form-control @error('no_sk') is-invalid @enderror" value="{{old('no_sk')}}" name="no_sk">
                                            @error('no_sk')
                                             <div id="no_sk" class="text-danger">
                                         {{$message}}
                                         </div>
                                         @enderror
                                                <span class="form-bar"></span>
                                                <label class="float-label">No SK
                                                    <span class="text-danger">*</span></label>
                                            </div>
                                            <br>
                                            <div class="form-group form-default">
                                            <input type="date" class="form-control" name="tgl_sk" value="{{old('tgl_sk')}}">
                                             @error('tgl_sk')
                                            <div id="tgl_sk" class="text-danger">
                                            {{$message}}
                                            </div>
                                                @enderror
                                                <span class="form-bar"></span>
                                                <label class="float-label">Tanggal Jabatan
                                                    <span class="text-danger">*</span></label>
                                            </div>
                                            <br>
                                            <div class="form-group form-default">
                                            <input type="date" class="form-control" name="tmt" value="{{old('tmt')}}">
                                            @error('tmt')
                                            <div id="tmt" class="text-danger">
                                             {{$message}}
                                            </div>
                                                @enderror
                                                <span class="form-bar"></span>
                                                <label class="float-label">TMT Jabatan
                                                    <span class="text-danger">*</span></label>
                                            </div>
                                            <br>
                                            <div class="form-group row">
                                                <label class="col-sm-6 col-form-label">File SK (Fotmat Pdf Maksimal 500kb)
                                                    <span class="text-danger">*</span></label><br>
                                                <div class="col-sm-12">
                                                <input type="file" class="form-control @error('sk_jabatan') is-invalid @enderror" id="sk_jabatan" name="sk_jabatan" accept=".pdf" required>
                                            
                                                @error('sk_jabatan')
                                                <div id="sk_jabatan" class="text-danger">
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
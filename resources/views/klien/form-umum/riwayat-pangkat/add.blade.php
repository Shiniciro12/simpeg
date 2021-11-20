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
                                        <h5>Form Riwayat Pangkat</h5>
                                        <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                                    </div>
                                    {{-- ISIAN FORM --}}

                                    <div class="card-block">
                                        <form action="/klien/dataumum/riwayat-pangkat/store" method="post"
                                            enctype="multipart/form-data" class="form-material">
                                            @csrf
                                            <input type="hidden" value="{{ auth()->user()->identitas_id }}"
                                                name="identitas_id">

                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <select class="form-control @error('pangkat_id') is-invalid @enderror"
                                                        value="{{ old('pangkat_id') }}" aria-label="pangkat"
                                                        name="pangkat_id" id="pangkat_id">
                                                        <option selected value="">Pilih Pangkat</option>
                                                        @foreach ($rowsPangkat as $rowpangkat)
                                                            <option
                                                                {{ old('pangkat_id') == $rowpangkat['pangkat_id'] ? 'selected' : '' }}
                                                                value="{{ $rowpangkat['pangkat_id'] }}">
                                                                {{ $rowpangkat['pangkat'] }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('pangkat_id')
                                                        <div id="pangkat_id" class="text-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <br>
                                            <div class="form-group form-default">
                                                <input type="text"
                                                    class="form-control @error('pejabat') is-invalid @enderror"
                                                    value="{{ old('pejabat') }}" id="pejabat" aria-describedby="pejabat"
                                                    name="pejabat">
                                                @error('pejabat')
                                                    <div id="pejabat" class="text-danger">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                <span class="form-bar"></span>
                                                <label class="float-label">Pejabat</label>
                                            </div>
                                            <br>
                                            <div class="form-group form-default">
                                                <input type="text" class="form-control @error('no_sk') is-invalid @enderror"
                                                    value="{{ old('no_sk') }}" id="no_sk" aria-describedby="no_sk"
                                                    name="no_sk">
                                                @error('no_sk')
                                                    <div id="no_sk" class="text-danger">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                <span class="form-bar"></span>
                                                <label class="float-label">No SK</label>
                                            </div>
                                            <br>
                                            <div class="form-group form-default">
                                                <input type="date"
                                                    class="form-control @error('tgl_sk') is-invalid @enderror"
                                                    value="{{ old('tgl_sk') }}" id="tgl_sk" aria-describedby="tgl_sk"
                                                    name="tgl_sk">
                                                @error('tgl_sk')
                                                    <div id="tgl_sk" class="text-danger">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                <span class="form-bar"></span>
                                                <label class="float-label">Tanggal SK</label>
                                            </div>
                                            <br>
                                            <div class="form-group form-default">
                                                <input type="date"
                                                    class="form-control @error('tmt_pangkat') is-invalid @enderror"
                                                    value="{{ old('tmt_pangkat') }}" id="tmt_pangkat"
                                                    aria-describedby="tmt_pangkat" name="tmt_pangkat">
                                                @error('tmt_pangkat')
                                                    <div id="tmt_pangkat" class="text-danger">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                <span class="form-bar"></span>
                                                <label class="float-label">TMT Pangkat</label>
                                            </div>
                                            <br>
                                            <div class="form-group row">
                                                <label class="col-sm-6 col-form-label">File SK (Fotmat Pdf Maksimal 500kb)
                                                    <span class="text-danger">*</span></label><br>
                                                <div class="col-sm-12">
                                                    <input type="file"
                                                        class="form-control @error('sk_pangkat') is-invalid @enderror"
                                                        value="{{ old('sk_pangkat') }}" id="sk_pangkat"
                                                        name="sk_pangkat">
                                                    @error('sk_pangkat')
                                                        <div id="sk_pangkat" class="text-danger">
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

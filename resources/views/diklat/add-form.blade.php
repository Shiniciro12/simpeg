@extends('home.layouts.main')
@include('home.layouts.navbar')
@section('content')
<div class="container">
    <div class="mt-2 mb-4"><span class="text-danger">*</span> Wajib diisi</div>
    <div class="row">
        <div class="col-md-6">
            <form action="/diklat/add" method="post" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="browsers" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                    <input list="browsers" required name="nip" id="browser" class="form-control">
                    <datalist id="browsers">
                        @foreach ($rowsIdentitas as $rowIdentitas)
                        <option value="{{ $rowIdentitas['nip'] }}">{{ $rowIdentitas['nama'] }}</option>
                        @endforeach
                    </datalist>
                </div>
                <div class="mb-3">
                    <label for="status" required class="form-label">Jenis Diklat <span class="text-danger">*</span></label>
                    <select class="form-select @error('status') is-invalid @enderror" value="{{old('status')}}" name="status" aria-label="status" id="status">
                        <option value="">Pilih Riwayat Diklat</option>
                        <option value="Diklat Struktural">Diklat Struktural</option>
                        <option value="Diklat Fungsional">Diklat Fungsional</option>
                        <option value="Diklat Teknis">Diklat Teknis</option>
                    </select>
                    @error('status')
                    <div id="status" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Diklat <span class="text-danger">*</span></label>
                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{old('nama')}}" id="nama" aria-describedby="nama" name="nama">
                    @error('nama')
                    <div id="nama" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="tempat" class="form-label">Tempat Diklat <span class="text-danger">*</span></label>
                    <input type="text" name="tempat" class="form-control @error('tempat') is-invalid @enderror" value="{{old('tempat')}}" id="tempat" aria-describedby="tempat" name="tempat">
                    @error('tempat')
                    <div id="tempat" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="penyelenggara" class="form-label">Penyelenggara <span class="text-danger">*</span></label>
                    <input type="text" name="penyelenggara" class="form-control @error('penyelenggara') is-invalid @enderror" value="{{old('penyelenggara')}}" id="penyelenggara" aria-describedby="penyelenggara" name="penyelenggara">
                    @error('penyelenggara')
                    <div id="penyelenggara" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="angka" class="form-label">Angka <span class="text-danger">*</span></label>
                    <input type="text" name="angka" class="form-control @error('angka') is-invalid @enderror" value="{{old('angka')}}" id="angka" aria-describedby="angka" name="angka">
                    @error('angka')
                    <div id="angka" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="tgl_mulai" class="form-label">Tanggal Mulai <span class="text-danger">*</span></label>
                    <input type="date" name="tgl_mulai" class="form-control @error('tgl_mulai') is-invalid @enderror" value="{{old('tgl_mulai')}}" id="tgl_mulai" aria-describedby="tgl_mulai" name="tgl_mulai">
                    @error('tgl_mulai')
                    <div id="tgl_mulai" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
        </div>
        <div class="col-sm-6">
            <div class="mb-3">
                <label for="tgl_selesai" class="form-label">Tanggal Selesai<span class="text-danger">*</span></label>
                <input type="date" name="tgl_selesai" class="form-control @error('tgl_selesai') is-invalid @enderror" value="{{old('tgl_selesai')}}" id="tgl_selesai" aria-describedby="tgl_selesai" name="tgl_selesai">
                @error('tgl_selesai')
                <div id="tgl_selesai" class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="jam" class="form-label">Jam <span class="text-danger">*</span></label>
                <input type="number" name="jam" class="form-control @error('jam') is-invalid @enderror" value="{{old('jam')}}" id="jam" aria-describedby="jam" name="jam">
                @error('jam')
                <div id="jam" class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="no_sttp" class="form-label">No STTP<span class="text-danger">*</span></label>
                <input type="text" name="no_sttp" class="form-control @error('no_sttp') is-invalid @enderror" value="{{old('no_sttp')}}" id="no_sttp" aria-describedby="no_sttp" name="no_sttp">
                @error('no_sttp')
                <div id="no_sttp" class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="tgl_sttp" class="form-label">Tanggal STTP<span class="text-danger">*</span></label>
                <input type="date" name="tgl_sttp" class="form-control @error('tgl_sttp') is-invalid @enderror" value="{{old('tgl_sttp')}}" id="tgl_sttp" aria-describedby="tgl_sttp" name="tgl_sttp">
                @error('tgl_sttp')
                <div id="tgl_sttp" class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <label for="sertifikat" class="form-label">Sertifikat (Format: PDF Maksimal 500Kb) <span class="text-danger">*</span></label>
            <div class="input-group mb-3">
                <input type="file" name="sertifikat" required class="form-control @error('sertifikat') is-invalid @enderror" value="{{old('sertifikat')}}" id="sertifikat" accept=".pdf" name="sertifikat">
                <label class="input-group-text" for="sertifikat">Upload</label>
                @error('sertifikat')
                <div id="sertifikat" class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Kirim</button>
            </form>
        </div>
    </div>
</div>
@endsection
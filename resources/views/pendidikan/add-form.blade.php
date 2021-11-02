@extends('home.layouts.main')
@include('home.layouts.navbar')
@section('content')
<div class="container">
    <div class="mt-2 mb-4"><span class="text-danger">*</span> Wajib diisi</div>
    <div class="row">
        <div class="col-md-6">
            <form action="/pendidikan/add" method="post" enctype="multipart/form-data">
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
                    <label for="tingkat_pendidikan" class="form-label">Tingkat Pendidikan <span class="text-danger">*</span></label>
                    <select class="form-select @error('tingkat_pendidikan') is-invalid @enderror" required value="{{old('tingkat_pendidikan')}}" name="tingkat_pendidikan" aria-label="tingkat_pendidikan" id="tingkat_pendidikan">
                        <option value="">Pilih Tingkat Pendidikan</option>
                        <option value="SD/Sederajat">SD/Sederajat</option>
                        <option value="SMP/Sederajat">SMP/Sederajat</option>
                        <option value="SMA/Sederajat">SMA/Sederajat</option>
                        <option value="Diploma III">Diploma III</option>
                        <option value="Diploma IV">Diploma IV</option>
                        <option value="S1">S1</option>
                        <option value="S2">S2</option>
                        <option value="S3">S3</option>
                    </select>
                    @error('tingkat_pendidikan')
                    <div id="tingkat_pendidikan" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="jurusan" class="form-label">Jurusan <span class="text-danger">*</span></label>
                    <input type="text" name="jurusan" class="form-control @error('jurusan') is-invalid @enderror" value="{{old('jurusan')}}" id="jurusan" aria-describedby="jurusan" name="jurusan">
                    @error('jurusan')
                    <div id="jurusan" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="nama_lembaga_pendidikan" class="form-label">Nama Lembaga Pendidikan <span class="text-danger">*</span></label>
                    <input type="nama_lembaga_pendidikan" name="nama_lembaga_pendidikan" class="form-control @error('nama_lembaga_pendidikan') is-invalid @enderror" value="{{old('nama_lembaga_pendidikan')}}" id="nama_lembaga_pendidikan" aria-describedby="nama_lembaga_pendidikan" name="nama_lembaga_pendidikan">
                    @error('nama_lembaga_pendidikan')
                    <div id="nama_lembaga_pendidikan" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="tempat" class="form-label">Tempat <span class="text-danger">*</span></label>
                    <input type="text" name="tempat" class="form-control @error('tempat') is-invalid @enderror" value="{{old('tempat')}}" id="tempat" aria-describedby="tempat" name="tempat">
                    @error('tempat')
                    <div id="tempat" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="nama_kepsek_rektor" class="form-label">Nama Kepsek/Rektor <span class="text-danger">*</span></label>
                <input type="text" name="nama_kepsek_rektor" class="form-control @error('nama_kepsek_rektor') is-invalid @enderror" value="{{old('nama_kepsek_rektor')}}" id="nama_kepsek_rektor" aria-describedby="nama_kepsek_rektor" name="nama_kepsek_rektor">
                @error('nama_kepsek_rektor')
                <div id="nama_kepsek_rektor" class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="no_sttb" class="form-label">No STTB <span class="text-danger">*</span></label>
                <input type="text" name="no_sttb" class="form-control @error('no_sttb') is-invalid @enderror" value="{{old('no_sttb')}}" id="no_sttb" aria-describedby="no_sttb" name="no_sttb">
                @error('no_sttb')
                <div id="no_sttb" class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="tgl_sttb" class="form-label">Tanggal STTB <span class="text-danger">*</span></label>
                <input type="date" name="tgl_sttb" class="form-control @error('tgl_sttb') is-invalid @enderror" value="{{old('tgl_sttb')}}" id="tgl_sttb" aria-describedby="tgl_sttb" name="tgl_sttb">
                @error('tgl_sttb')
                <div id="tgl_sttb" class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <label for="sttb" class="form-label">STTB (Format: PDF Maksimal 500Kb) <span class="text-danger">*</span></label>
            <div class="input-group mb-3">
                <input type="file" required name="sttb" class="form-control @error('sttb') is-invalid @enderror" value="{{old('sttb')}}" id="sttb" accept=".pdf" name="sttb">
                <label class="input-group-text" for="sttb">Upload</label>
                @error('sttb')
                <div id="sttb" class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary btn-block">Kirim</button>
            </form>
        </div>
    </div>
</div>
@endsection
@extends('home.layouts.main')
@include('home.layouts.navbar')
@section('content')
<div class="container">
    <div class="mt-2 mb-4"><span class="text-danger">*</span> Wajib diisi</div>
    <h3>Data Tanda Jasa</h3><br>
    <div class="row">
        <div class="col-md-6">

            <form action="/tandajasa/add" method="post" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="browsers" class="form-label">NIP Pegawai <span class="text-danger">*</span></label>
                    <input list="browsers" name="nip" id="browser" class="form-control" value="{{old('nip')}}">
                    <datalist id="browsers">
                        @foreach ($rowsIdentitas as $rowIdentitas)
                        <option {{old('identitas_id')==$rowIdentitas['identitas_id'] ? 'selected' : '' }}
                            value="{{ $rowIdentitas['nip'] }}">{{ $rowIdentitas['nama']
                            }}</option>
                        @endforeach
                    </datalist>
                    @error('browsers')
                    <div id="browsers" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Tanda Jasa <span class="text-danger">*</span> </label>
                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                        value="{{old('nama')}}" id="nama" aria-describedby="nama">
                    @error('nama')
                    <div id="nama" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="no_sk" class="form-label">Nomor SK <span class="text-danger">*</span> </label>
                    <input type="text" name="no_sk" class="form-control @error('no_sk') is-invalid @enderror"
                        value="{{old('no_sk')}}" id="no_sk" aria-describedby="no_sk">
                    @error('no_sk')
                    <div id="no_sk" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="tgl_sk" class="form-label">Tanggal SK <span class="text-danger">*</span></label>
                    <input type="date" name="tgl_sk" class="form-control @error('tgl_sk') is-invalid @enderror"
                        value="{{old('tgl_sk')}}" id="tgl_sk" aria-describedby="tgl_sk">
                    @error('tgl_sk')
                    <div id="tgl_sk" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="tahun" class="form-label">Tahun <span class="text-danger">*</span> </label>
                    <input type="number" name="tahun" class="form-control @error('tahun') is-invalid @enderror"
                        value="{{old('tahun')}}" id="tahun" aria-describedby="tahun">
                    @error('tahun')
                    <div id="tahun" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="asal_perolehan" class="form-label">Asal Perolehan <span class="text-danger">*</span>
                </label>
                <input type="text" name="asal_perolehan"
                    class="form-control @error('asal_perolehan') is-invalid @enderror" value="{{old('asal_perolehan')}}"
                    id="asal_perolehan" aria-describedby="asal_perolehan">
                @error('asal_perolehan')
                <div id="asal_perolehan" class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <label for="file" class="form-label">File (Format PDF Maksimal 1MB)</label>
            <div class="input-group mb-3">
                <input type="file" class="form-control" value="" id="file" name="sertifikat">
                <label class="input-group-text" for="file">Upload</label>
                <div id="foto" class="invalid-feedback">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Kirim</button>
        </div>
        </form>
    </div>
</div>
</div>
@endsection
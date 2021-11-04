@extends('home.layouts.main')
@include('home.layouts.navbar')
@section('content')
<div class="container">
 
    <div class="row">
        <div class="col-md-9 mx-auto">
            <form action="/jabatan/updt" method="post" enctype="multipart/form-data">
                @csrf
                <br>
                <div class="mt-2 mb-4"><span class="text-danger">*</span> Wajib diisi</div>
                <h3>Data Jabatan</h3>
                <input type="hidden" value="{{$rowJabatan['jabatan_id']}}" name="jabatan_id">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Jabatan <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('nama_jabatan') is-invalid @enderror" value="{{old('nama_jabatan', $rowJabatan['nama_jabatan'])}}" id="nama_jabatan" aria-describedby="nama_jabatan" name="nama_jabatan">
                        @error('nama_jabatan')
                                <div id="nama_jabatan" class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="mb-3">
                            <label for="eselon" class="form-label">Eselon <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('eselon') is-invalid @enderror" value="{{old('eselon', $rowJabatan['eselon'])}}" id="eselon" aria-describedby="eselon" name="eselon">
                          @error('eselon')
                                <div id="eselon" class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                      
                    </div>
                    <div class="col-sm-3">
                        <div class="mb-3">
                            <label for="kelas" class="form-label">Kelas <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('kelas') is-invalid @enderror" value="{{old('kelas', $rowJabatan['kelas'])}}" id="kelas" aria-describedby="kelas" name="kelas">
                            @error('kelas')
                                <div id="kelas" class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="unit_kerja_id" class="form-label">Unit Kerja <span class="text-danger">*</span></label>
                            <select class="form-select" aria-label="unit_kerja" name="unit_kerja_id" id="unit_kerja_id">
                                <option value="" disabled>Pilih Unit Kerja</option>
                                @foreach ($rowsUnitKerja as $rowUniteKerja)
                                <option value="{{ $rowUniteKerja['unit_kerja_id'] }}" <?php if ($rowJabatan['unit_kerja_id'] == $rowUniteKerja['unit_kerja_id']) {
                                                                                            echo "selected ";
                                                                                        } ?>>{{ $rowUniteKerja['nama_unit'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="jenis_jabatan" class="form-label">Jenis Jabatan<span class="text-danger">*</span></label>
                            <select class="form-select @error('jenis_jabatan') is-invalid @enderror" name="jenis_jabatan" aria-label="jenis_jabatan" id="jenis_jabatan">
                                <option value="" disabled>Pilih Jenis Jabatan</option>
                                <option value="Struktural" <?php if ($rowJabatan['jenis_jabatan'] == "Struktural") {
                                                                echo "selected ";
                                                            } ?>>Struktural</option>
                                <option value="Teknis" <?php if ($rowJabatan['jenis_jabatan'] == "Teknis") {
                                                            echo "selected ";
                                                        } ?>>Teknis</option>
                                <option value="Fungsional" <?php if ($rowJabatan['jenis_jabatan'] == "Fungsional") {
                                                                echo "selected ";
                                                            } ?>>Fungsional</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary" style="width: 150px; float:right;">Kirim</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
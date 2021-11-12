@extends('home.layouts.main')
@include('home.layouts.navbar')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9 mx-auto">
            <form action="/jabatan/add" method="post" enctype="multipart/form-data">
                @csrf
                <br>
                <div class="mt-2 mb-4"><span class="text-danger">*</span> Wajib diisi</div>
                <h3>Data Jabatan</h3>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Jabatan <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                value="{{old('nama')}}" id="nama" aria-describedby="nama" name="nama">
                            @error('nama')
                            <div id="nama" class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="mb-3">
                            <label for="eselon" class="form-label">Eselon<span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('eselon') is-invalid @enderror"
                                value="{{old('eselon')}}" id="eselon" aria-describedby="eselon" name="eselon">
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
                            <input type="text" class="form-control @error('kelas') is-invalid @enderror"
                                value="{{old('kelas')}}" id="kelas" aria-describedby="kelas" name="kelas">
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
                            <label for="unit_kerja_id" class="form-label">Unit Kerja <span
                                    class="text-danger">*</span></label>
                            <select class="form-select @error('unit_kerja_id') is-invalid @enderror"
                                aria-label="unit_kerja" name="unit_kerja_id" id="unit_kerja_id">
                                <option selected value="{{old('unit_kerja_id')}}" disabled>Pilih Unit Kerja</option>
                                @foreach ($rowsUnitKerja as $rowUniteKerja)
                                <option {{old('unit_kerja_id')==$rowUniteKerja['unit_kerja_id'] ? 'selected' : '' }}
                                    value="{{ $rowUniteKerja['unit_kerja_id'] }}">{{ $rowUniteKerja['nama_unit']
                                    }}</option>
                                @endforeach
                            </select>
                            @error('unit_kerja_id')
                            <div id="unit_kerja_id" class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="jenis_jabatan" class="form-label">Jenis Jabatan<span
                                    class="text-danger">*</span></label>
                            <select class="form-select @error('jenis_jabatan') is-invalid @enderror"
                                name="jenis_jabatan" aria-label="jenis_jabatan" id="jenis_jabatan">
                                <option selected value="" disabled>Pilih Jenis Jabatan</option>
                                <option {{old('jenis_jabatan')=='Struktural' ? 'selected' : '' }} value="Struktural">
                                    Struktural
                                </option>
                                <option {{old('jenis_jabatan')=='Teknis' ? 'selected' : '' }} value="Teknis">Teknis
                                </option>
                                <option {{old('jenis_jabatan')=='Fungsional' ? 'selected' : '' }} value="Fungsional">
                                    Fungsional
                                </option>
                            </select>
                            @error('jenis_jabatan')
                            <div id="jenis_jabatan" class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
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
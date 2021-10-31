@extends('home.layouts.main')
@include('home.layouts.navbar')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9 mx-auto">
            <form action="/riwayat-jabatan/add" method="post" enctype="multipart/form-data">
                @csrf
                <br>
                <div class="mt-2 mb-4"><span class="text-danger">*</span> Wajib diisi</div>
                <h3>Data Riwayat Jabatan</h3>


                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">

                            <label for="identitas_id" class="form-label">Nama/NIP Pegawai <span class="text-danger">*</span></label>
                            <input type="text" list="identitas" name="identitas_id" id="identitas_id" class="form-control" required>
                            <datalist id="identitas">
                                @foreach ($rowsIdentitas as $rowIdentitas)
                                <option value="{{$rowIdentitas->nip}}">{{$rowIdentitas->nama}}</option>
                                @endforeach
                            </datalist>
                            @error('identitas_id')
                            <div id="identitas_id" class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="identitas_id" class="form-label">Jabatan <span class="text-danger">*</span></label>
                            <select class="form-select" name="jabatan_id" id="jabatan_id" required>
                                <option value="" disabled SELECTED>Pilih Jabatan</option>
                                @foreach ($rowsJabatan as $rowJabatan)
                                <option value="{{ $rowJabatan->jabatan_id }}">{{$rowJabatan->nama_jabatan}}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="mb-3">
                        <label for="pejabat" class="form-label">Pejabat<span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('pejabat') is-invalid @enderror" value="{{old('pejabat')}}" id="pejabat" aria-describedby="pejabat" name="pejabat">
                        @error('pejabat')
                        <div id="pejabat" class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="no_sk" class="form-label">No SK<span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('no_sk') is-invalid @enderror" value="{{old('no_sk')}}" name="no_sk">
                            @error('no_sk')
                            <div id="no_sk" class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="tgl_sk" class="form-label">Tanggal SK<span class="text-danger">*</span></label>
                            <input type="date" class="form-control" name="tgl_sk">
                            @error('tgl_sk')
                            <div id="tgl_sk" class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 mx-auto">
                        <div class="mb-3">
                            <label for="tmt" class="form-label">TMT<span class="text-danger">*</span></label>
                            <input type="date" class="form-control" name="tmt">
                            @error('tmt')
                            <div id="tmt" class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <label for="sk" class="form-label">SK Jabatan (Format: PDF Maksimal 550Kb) <span class="text-danger">*</span></label>
                            <div class="input-group mb-3">
                                <input type="file" class="form-control @error('sk') is-invalid @enderror" value="{{old('sk')}}" id="sk" name="sk" accept=".pdf" required>
                                <label class="input-group-text" for="sk">Upload</label>
                                @error('sk')
                                <div id="sk" class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <br>
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
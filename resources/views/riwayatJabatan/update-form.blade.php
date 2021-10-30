@extends('home.layouts.main')
@include('home.layouts.navbar')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9 mx-auto">
            <form action="/riwayat-jabatan/updt" method="post" enctype="multipart/form-data">
                @csrf
                <br>
                <div class="mt-2 mb-4"><span class="text-danger">*</span> Wajib diisi</div>
                <h3>Data Riwayat Jabatan</h3>

                <input type="hidden" value="{{$rowRiwayatJabatan->riwayat_jabatan_id}}" name="riwayat_jabatan_id">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">

                            <label for="identitas_id" class="form-label">Nama/NIP Pegawai <span class="text-danger">*</span></label>
                            <input type="text" list="identitas" name="identitas_id" id="identitas_id" class="form-control" value="{{$rowsNip['nip']}}" required>
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
                                <option value="" disabled>Pilih Jabatan</option>
                                @foreach ($rowsJabatan as $rowJabatan)
                                <option value="{{ $rowJabatan->jabatan_id }}" <?php
                                                                                if ($rowJabatan['jabatan_id'] == $rowRiwayatJabatan['jabatan_id']) {
                                                                                    echo "selected";
                                                                                }
                                                                                ?>>{{$rowJabatan->nama_jabatan}}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="mb-3">
                        <label for="pejabat" class="form-label">Pejabat<span class="text-danger">*</span></label>
                        <input type="text" value="{{$rowRiwayatJabatan->pejabat}}" class="form-control @error('pejabat') is-invalid @enderror" value="{{old('pejabat')}}" id="pejabat" aria-describedby="pejabat" name="pejabat">
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
                            <input type="text" value="{{$rowRiwayatJabatan->no_sk}}" class="form-control @error('no_sk') is-invalid @enderror" value="{{old('no_sk')}}" name="no_sk">
                            @error('no_sk')
                            <div id="no_sk" class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="tgl_sk" value="{{$rowRiwayatJabatan->tgl_sk}}" class="form-label">Tanggal SK<span class="text-danger">*</span></label>
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
                            <label for="tmt" value="{{$rowRiwayatJabatan->tmt}}" class="form-label">TMT<span class="text-danger">*</span></label>
                            <input type="date" class="form-control" name="tmt">
                            @error('tmt')
                            <div id="tmt" class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
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
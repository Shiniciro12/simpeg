@extends('home.layouts.main')
@include('home.layouts.navbar')
@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-8">
            <form action="/riwayatpangkat/add" method="post" enctype="multipart/form-data">
                @csrf
                <h3>Data Riwayat Pangkat</h3>
                <div class="mt-2 mb-4"><span class="text-danger">*</span> Wajib diisi</div>
                <div id="data-diri">
                    <div class="mb-3">
                        <label for="pangkat_id" class="form-label">Pangkat <span class="text-danger">*</span></label>
                        <select class="form-select @error('pangkat_id') is-invalid @enderror"
                            value="{{old('pangkat_id')}}" aria-label="pangkat" name="pangkat_id" id="pangkat_id">
                            <option selected value="">Pilih Pangkat</option>
                            @foreach ($rowsPangkat as $rowpangkat)
                            <option value="{{ $rowpangkat['pangkat_id'] }}">{{
                                $rowpangkat['pangkat'] }}
                            </option>
                            @endforeach
                        </select>
                        @error('pangkat_id')
                        <div id="pangkat_id" class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="id_identitas" class="form-label">Identitas <span
                                class="text-danger">*</span></label>
                        <select class="form-select @error('identitas_id') is-invalid @enderror"
                            value="{{old('identitas_id')}}" aria-label="pangkat" name="identitas_id" id="identitas_id">
                            <option selected value="">Pilih NIP</option>
                            @foreach ($rowsIdentitas as $rowpangkat)
                            <option value="{{ $rowpangkat['identitas_id'] }}">{{
                                $rowpangkat['nip'] }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="pejabat" class="form-label">Pejabat <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('pejabat') is-invalid @enderror"
                            value="{{old('pejabat')}}" id="pejabat" aria-describedby="pejabat" name="pejabat">
                        @error('pejabat')
                        <div id="pejabat" class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="no_sk" class="form-label">No SK <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('no_sk') is-invalid @enderror"
                            value="{{old('no_sk')}}" id="no_sk" aria-describedby="no_sk" name="no_sk">
                        @error('no_sk')
                        <div id="no_sk" class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="tgl_sk" class="form-label">Tanggal SK</label>
                        <input type="date" class="form-control @error('tgl_sk') is-invalid @enderror"
                            value="{{old('tgl_sk')}}" id="tgl_sk" aria-describedby="tgl_sk" name="tgl_sk">
                        @error('tgl_sk')
                        <div id="tgl_sk" class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="tmt_pangkat" class="form-label">TMT Pangkat</label>
                        <input type="date" class="form-control @error('tmt_pangkat') is-invalid @enderror"
                            value="{{old('tmt_pangkat')}}" id="tmt_pangkat" aria-describedby="tmt_pangkat"
                            name="tmt_pangkat">
                        @error('tmt_pangkat')
                        <div id="tmt_pangkat" class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>


                    <label for="sk_pangkat" class="form-label">File SK (Fotmat JPG, JPEG, PNG, Maksimal 550Kb) <span
                            class="text-danger">*</span></label>
                    <div class="input-group mb-3">
                        <input type="file" class="form-control @error('sk_pangkat') is-invalid @enderror"
                            value="{{old('sk_pangkat')}}" id="sk_pangkat" name="sk_pangkat">
                        <label class="input-group-text" for="sk_pangkat">Upload</label>
                        @error('sk_pangkat')
                        <div id="sk_pangkat" class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection
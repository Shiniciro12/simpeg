@extends('admin.layouts.main')
@include('admin.layouts.navbar')
@include('admin.layouts.sidebar')
@section('content')
{{-- @dd($errors) --}}

<div class="container">
    <div class="row">
        <div class="col-md-10">
            <form action="/riwayatpangkat/update" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="riwayat_pangkat_id" value="{{ $data['riwayat_pangkat_id'] }}">
                <div class="mt-2 mb-4"><span class="text-danger">*</span> Wajib diisi</div>
                <div id="data-diri">
                    <h3>Data Riwayat Pangkat</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="pangkat_id" class="form-label">Pangkat <span
                                        class="text-danger">*</span></label>
                                <select class="form-select @error('pangkat_id') is-invalid @enderror"
                                    value="{{old('pangkat_id', $data['pangkat_id'])}}" aria-label="Pangkat"
                                    name="pangkat_id" id="pangkat_id">
                                    <option selected value="">Pilih Pangkat</option>
                                    @foreach ($rowsPangkat as $rowPangkat)
                                    @if ($rowPangkat['pangkat_id'] === $rowsRiwayatPangkat['pangkat_id'] )
                                    <option selected value="{{ $rowPangkat['pangkat_id'] }}">{{
                                        $rowPangkat['pangkat'] }}
                                    </option>
                                    @else
                                    <option value="{{ $rowPangkat['pangkat_id'] }}">{{
                                        $rowPangkat['pangkat'] }}
                                    </option>
                                    @endif

                                    @endforeach
                                </select>
                                @error('pangkat_id')
                                <div id="pangkat_id" class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="identitas_id" class="form-label">Nama Lengkap <span
                                        class="text-danger">*</span></label>
                                <select class="form-select @error('identitas_id') is-invalid @enderror"
                                    value="{{old('identitas_id', $data['identitas_id'])}}" aria-label="Pangkat"
                                    name="identitas_id" id="identitas_id">
                                    <option selected value="">Pilih Nama</option>
                                    @foreach ($rowsIdentitas as $rowIdentitas)
                                    @if ($rowIdentitas['identitas_id'] === $rowsRiwayatPangkat['identitas_id'] )
                                    <option selected value="{{ $rowIdentitas['identitas_id'] }}">{{
                                        $rowIdentitas['nama'] }}
                                    </option>
                                    @else
                                    <option value="{{ $rowIdentitas['identitas_id'] }}">{{
                                        $rowIdentitas['nip'] }}
                                    </option>
                                    @endif

                                    @endforeach
                                </select>
                                @error('identitas_id')
                                <div id="identitas_id" class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="pejabat" class="form-label">Pejabat <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('pejabat') is-invalid @enderror"
                                    value="{{old('pejabat', $data['pejabat'])}}" id="pejabat" aria-describedby="pejabat"
                                    name="pejabat">
                                @error('pejabat')
                                <div id="pejabat" class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>


                            <div class="mb-3">
                                <label for="no_sk" class="form-label">No SK</label>
                                <input type="text" class="form-control @error('no_sk') is-invalid @enderror"
                                    value="{{old('no_sk', $data['no_sk'])}}" id="no_sk" aria-describedby="no_sk"
                                    name="no_sk">
                                @error('no_sk')
                                <div id="no_sk" class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="tgl_sk" class="form-label">Tanggal SK <span
                                        class="text-danger">*</span></label>
                                <input type="date" class="form-control @error('tgl_sk') is-invalid @enderror"
                                    value="{{old('tgl_sk', $data['tgl_sk'])}}" id="tgl_sk" aria-describedby="tgl_sk"
                                    name="tgl_sk">
                                @error('tgl_sk')
                                <div id="tgl_sk" class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="tmt_pangkat" class="form-label">TMT Pangkat <span
                                        class="text-danger">*</span></label>
                                <input type="date" class="form-control @error('tmt_pangkat') is-invalid @enderror"
                                    value="{{old('tmt_pangkat', $data['tmt_pangkat'])}}" id="tmt_pangkat"
                                    aria-describedby="tmt_pangkat" name="tmt_pangkat">
                                @error('tmt_pangkat')
                                <div id="tmt_pangkat" class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <input type="hidden" class="form-control @error('sk_pangkat') is-invalid @enderror"
                                value="{{old('sk_pangkat', $data['sk_pangkat'])}}" id="sk_pangkat"
                                aria-describedby="sk_pangkat" name="sk_pangkat">
                            {{-- <div class="mb-3">
                                <label for="sk_pangkat" class="form-label">SK Pangkat <span
                                        class="text-danger">*</span></label> --}}
                                {{-- <input type="text" class="form-control @error('sk_pangkat') is-invalid @enderror"
                                    value="{{old('sk_pangkat', $data['sk_pangkat'])}}" id="sk_pangkat"
                                    aria-describedby="sk_pangkat" name="sk_pangkat"> --}}
                                {{-- @error('sk_pangkat')
                                <div id="sk_pangkat" class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div> --}}


                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary" ">Ubah</button>
                </div>



    </form>
</div>
</div>
</div>
@endsection
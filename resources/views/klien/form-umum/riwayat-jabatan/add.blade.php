@extends('admin.layouts.main')
@include('admin.layouts.header-klien')
@section('content')

<body>
    <div class="container-fluid">
        <div class="row">
            @include('admin.layouts.sidenav')
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <form action="/klien/dataumum/riwayat-jabatan/store" method="post" enctype="multipart/form-data">
                    @csrf
                    <br>
                    <div class="mt-2 mb-4"><span class="text-danger">*</span> Wajib diisi</div>
                    <h3>Data Riwayat Jabatan</h3>

                    <div class="row">

                        <input type="hidden" value="{{auth()->user()->identitas_id}}" name="identitas_id">

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="identitas_id" class="form-label">Jabatan <span class="text-danger">*</span></label>
                                <select class="form-select" name="jabatan_id" id="jabatan_id" required value="{{old('jabatan_id')}}">
                                    <option value="" disabled selected>Pilih Jabatan</option>

                                    @foreach ($rowsJabatan as $rowJabatan)
                                    <option {{old('jabatan_id')==$rowJabatan['jabatan_id'] ? 'selected' : '' }} value="{{ $rowJabatan['jabatan_id'] }}">{{ $rowJabatan['nama_jabatan']
                                    }}</option>
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
                                <input type="date" class="form-control" name="tgl_sk" value="{{old('tgl_sk')}}">
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
                                <input type="date" class="form-control" name="tmt" value="{{old('tmt')}}">
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
                                <label for="sk_jabatan" class="form-label">SK Jabatan (Format: PDF Maksimal 500kb) <span class="text-danger">*</span></label>
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control @error('sk_jabatan') is-invalid @enderror" id="sk_jabatan" name="sk_jabatan" accept=".pdf" required>
                                    <label class="input-group-text" for="sk_jabatan">Upload</label>
                                    @error('sk_jabatan')
                                    <div id="sk_jabatan" class="invalid-feedback">
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

            </main>
        </div>
    </div>
</body>


@endsection
@extends('admin.layouts.main')
@include('admin.layouts.navbar')
@include('admin.layouts.sidebar')
@section('content')
<div class="container">
    <div class="mt-2 mb-4"><span class="text-danger">*</span> Wajib diisi</div>
    <h3>Data Keluarga</h3><br>
    <div class="row">
        <div class="col-md-6">
            <form action="/keluarga/update" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{$rowsKeluarga->keluarga_id}}" name="keluarga_id">
                <div class="mb-3">
                    <label for="browsers" class="form-label">NIP Pegawai <span class="text-danger">*</span></label>
                    <input list="browsers" name="nip" id="browser" class="form-control" value="{{ $nip->nip }}">
                    <datalist id="browsers">
                        @foreach ($rowsIdentitas as $rowIdentitas)
                        <option value="{{ $rowIdentitas['nip'] }}">{{ $rowIdentitas['nama'] }}</option>
                        @endforeach
                    </datalist>
                </div>
                <div class="mb-3">
                    <label for="nik" class="form-label">NIK <span class="text-danger">*</span> </label>
                    <input type="number" name="nik" class="form-control @error('nik') is-invalid @enderror"
                        value="{{old('nik', $rowsKeluarga->nik)}}" id="nik" aria-describedby="nik">
                    @error('nik')
                    <div id="nik" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama <span class="text-danger">*</span></label>
                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                        value="{{old('nama', $rowsKeluarga->nama)}}" id="nama" aria-describedby="nama">
                    @error('nama')
                    <div id="nama" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="tempat_lahir" class="form-label">Tempat Lahir <span class="text-danger">*</span></label>
                    <input type="text" name="tempat_lahir"
                        class="form-control @error('tempat_lahir') is-invalid @enderror"
                        value="{{old('tempat_lahir', $rowsKeluarga->tempat_lahir)}}" id="tempat_lahir"
                        aria-describedby="tempat_lahir">
                    @error('tempat_lahir')
                    <div id="tempat_lahir" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="tgl_lahir" class="form-label">Tanggal Lahir <span class="text-danger">*</span></label>
                    <input type="date" name="tgl_lahir" class="form-control @error('tgl_lahir') is-invalid @enderror"
                        value="{{old('tgl_lahir', $rowsKeluarga->tgl_lahir)}}" id="tgl_lahir"
                        aria-describedby="tgl_lahir">
                    @error('tgl_lahir')
                    <div id="tgl_lahir" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin <span
                            class="text-danger">*</span></label>
                    <select class="form-select @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin"
                        value="{{$rowsKeluarga->jenis_kelamin}}" aria-label="jenis kelamin" id="jenis_kelamin">
                        <option value="">Pilih Jenis Kelamin</option>
                        <option {{old('jenis_kelamin', $rowsKeluarga->jenis_kelamin)=='L' ? 'selected' : '' }}
                            value="L">Laki-laki
                        </option>
                        <option {{old('jenis_kelamin')=='P' ? 'selected' : '' }} value="P">Perempuan
                        </option>
                    </select>
                    @error('jenis_kelamin')
                    <div id="jenis_kelamin" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="status_keluarga" class="form-label">Status Keluarga</label>
                    <select class="form-select @error('status_keluarga') is-invalid @enderror" name="status_keluarga"
                        value="{{$rowsKeluarga->status_keluarga}}" aria-label="status_keluarga" id="status_keluarga">
                        <option selected value="">Pilih Status Keluarga</option>
                        @foreach ($rowsStatusKeluarga as $rowStatusKeluarga)
                        <option {{old('status_keluarga', $rowsKeluarga->status_keluarga)==$rowStatusKeluarga ?
                            'selected' : '' }} value="{{ $rowStatusKeluarga }}">{{ $rowStatusKeluarga
                            }}</option>
                        @endforeach
                    </select>
                    @error('status_keluarga')
                    <div id="status_keluarga" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="status_kawin" class="form-label">Status Kawin</label>
                    <select class="form-select @error('status_kawin') is-invalid @enderror" name="status_kawin"
                        value="{{$rowsKeluarga->status_kawin}}" aria-label="status_kawin" id="status_kawin">
                        <option selected value="">Pilih Status Perkawinan</option>
                        @foreach ($rowsStatusKawin as $rowStatusKawin)
                        <option {{old('status_kawin', $rowsKeluarga->status_kawin)==$rowStatusKawin ?
                            'selected' : '' }} value="{{ $rowStatusKawin }}">{{ $rowStatusKawin
                            }}</option>
                        @endforeach
                    </select>
                    @error('status_kawin')
                    <div id="status_kawin" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="tgl_kawin" class="form-label">Tanggal Kawin</label>
                    <input type="date" name="tgl_kawin" class="form-control"
                        value="{{old('tgl_kawin', $rowsKeluarga->tgl_kawin)}}" id="tgl_kawin"
                        aria-describedby="tgl_kawin">

                </div>
                <div class="mb-3">
                    <label for="status_tunjangan" class="form-label">Status Tunjangan</label>
                    <select class="form-select @error('status_tunjangan') is-invalid @enderror" name="status_tunjangan"
                        value="{{$rowsKeluarga->status_tunjangan}}" aria-label="status_tunjangan" id="status_tunjangan">
                        <option selected value="">Pilih Status Tunjangan</option>
                        <option {{old('status_tunjangan', $rowsKeluarga->status_tunjangan)=='Ya' ? 'selected' : '' }}
                            value="Ya">Ya
                        </option>
                        <option {{old('status_tunjangan', $rowsKeluarga->status_tunjangan)=='Tidak' ? 'selected' : '' }}
                            value="Tidak">Tidak
                        </option>
                    </select>
                    @error('status_tunjangan')
                    <div id="status_tunjangan" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="pendidikan" class="form-label">Pendidikan</label>
                    <select class="form-select @error('pendidikan') is-invalid @enderror" name="pendidikan"
                        value="{{$rowsKeluarga->pendidikan}}" aria-label="pendidikan" id="pendidikan">
                        <option selected value="">Pilih Status Pendidikan</option>
                        @foreach ($rowsPendidikan as $rowPendidikan)
                        <option {{old('pendidikan', $rowsKeluarga->pendidikan)==$rowPendidikan ?
                            'selected' : '' }} value="{{ $rowPendidikan }}">{{ $rowPendidikan
                            }}</option>
                        @endforeach
                    </select>
                    @error('pendidikan')
                    <div id="pendidikan" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
        </div>
        <div class="col-md-6">

            <div class="mb-3">
                <label for="pekerjaan" class="form-label">Pekerjaan</label>
                <input type="text" class="form-control @error('pekerjaan') is-invalid @enderror" name="pekerjaan"
                    value="{{old('pekerjaan', $rowsKeluarga->pekerjaan)}}" id="pekerjaan" aria-describedby="pekerjaan">
                @error('pekerjaan')
                <div id="pekerjaan" class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control" name="alamat" value="{{old('alamat', $rowsKeluarga->alamat)}}"
                    id="alamat" rows="3">{{old('alamat', $rowsKeluarga->alamat)}}</textarea>
            </div>
            <div class="mb-3">
                <label for="desa_kelurahan" class="form-label">Desa/Kelurahan</label>
                <input type="text" class="form-control @error('desa_kelurahan') is-invalid @enderror"
                    name="desa_kelurahan" value="{{old('desa_kelurahan', $rowsKeluarga->desa_kelurahan)}}"
                    id="desa_kelurahan" aria-describedby="desa_kelurahan">
                @error('desa_kelurahan')
                <div id="desa_kelurahan" class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="kecamatan" class="form-label">Kecamatan</label>
                <input type="text" class="form-control @error('kecamatan') is-invalid @enderror" name="kecamatan"
                    value="{{old('kecamatan', $rowsKeluarga->kecamatan)}}" id="kecamatan" aria-describedby="kecamatan">
                @error('kecamatan')
                <div id="kecamatan" class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="kabupaten_kota" class="form-label">Kabupaten</label>
                <input type="text" class="form-control @error('kabupaten_kota') is-invalid @enderror"
                    name="kabupaten_kota" value="{{old('kabupaten_kota', $rowsKeluarga->kabupaten_kota)}}"
                    id="kabupaten_kota" aria-describedby="kabupaten atau kota">
                @error('kabupaten_kota')
                <div id="kabupaten_kota" class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="provinsi" class="form-label">Provinsi</label>
                <input type="text" class="form-control @error('provinsi') is-invalid @enderror" name="provinsi"
                    value="{{old('provinsi', $rowsKeluarga->provinsi)}}" id="provinsi" aria-describedby="provinsi">
                @error('provinsi')
                <div id="" class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="hp" class="form-label">No. Handphone</label>
                <input type="number" class="form-control @error('hp') is-invalid @enderror" name="hp"
                    value="{{old('hp', $rowsKeluarga->hp)}}" id="hp" aria-describedby="hp">
                @error('hp')
                <div id="hp" class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="telepon" class="form-label">No. Telepon</label>
                <input type="number" class="form-control @error('telepon') is-invalid @enderror" name="telepon"
                    value="{{old('telepon', $rowsKeluarga->telepon)}}" id="telepon" aria-describedby="telepon">
                @error('telepon')
                <div id="telepon" class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="kode_pos" class="form-label">Kode Pos</label>
                <input type="number" class="form-control @error('kode_pos') is-invalid @enderror" name="kode_pos"
                    value="{{old('kode_pos', $rowsKeluarga->kode_pos)}}" id="kode_pos" aria-describedby="kode_pos">
                @error('kode_pos')
                <div id="kode_pos" class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>

            <!-- <label for="file" class="form-label">File (Format PDF Maksimal 500Kb)</label>
                    <div class="input-group mb-3">
                        <input type="file" class="form-control" value="" id="file" name="file">
                        <label class="input-group-text" for="file">Upload</label>
                        <div id="foto" class="invalid-feedback">
                        </div>
                      </div>    -->
            <button type="submit" class="btn btn-primary">Kirim</button>

        </div>
        </form>
        <br><br>
    </div>
</div>
</div>
@endsection
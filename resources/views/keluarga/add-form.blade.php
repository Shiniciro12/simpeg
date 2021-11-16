@extends('admin.layouts.main')
@include('admin.layouts.navbar')
@include('admin.layouts.sidebar')
@section('content')
<div class="container">
    <div class="mt-2 mb-4"><span class="text-danger">*</span> Wajib diisi</div>
    <h3>Data Keluarga</h3><br>
    <div class="row">
        <div class="col-md-6">
            <form action="/keluarga/add" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="browsers" class="form-label">Nama<span class="text-danger">*</span></label>
                    <input list="browsers" name="nip" id="browser"
                        class="form-control  @error('nip') is-invalid @enderror" value="{{old('nip')}}">
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
                    <label for="nik" class="form-label">NIK <span class="text-danger">*</span> </label>
                    <input type="number" name="nik" class="form-control @error('nik') is-invalid @enderror"
                        value="{{old('nik')}}" id="nik" aria-describedby="nik">
                    @error('nik')
                    <div id="nik" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama <span class="text-danger">*</span></label>
                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                        value="{{old('nama')}}" id="nama" aria-describedby="nama">
                    @error('nama')
                    <div id="nama" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="tempat_lahir" class="form-label">Tempat Lahir <span class="text-danger">*</span></label>
                    <input type="text" name="tempat_lahir"
                        class="form-control @error('tempat_lahir') is-invalid @enderror" value="{{old('tempat_lahir')}}"
                        id="tempat_lahir" aria-describedby="tempat_lahir">
                    @error('tempat_lahir')
                    <div id="tempat_lahir" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="tgl_lahir" class="form-label">Tanggal Lahir <span class="text-danger">*</span></label>
                    <input type="date" name="tgl_lahir" class="form-control @error('tgl_lahir') is-invalid @enderror"
                        value="{{old('tgl_lahir')}}" id="tgl_lahir" aria-describedby="tgl_lahir">
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
                        value="{{old('jenis_kelamin')}}" aria-label="jenis kelamin" id="jenis_kelamin">
                        <option value="">Pilih Jenis Kelamin</option>
                        <option {{old('jenis_kelamin')=='L' ? 'selected' : '' }} value="L">Laki-laki
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
                        value="{{old('status_keluarga')}}" aria-label="status_keluarga" id="status_keluarga">
                        <option selected value="">Pilih Status Keluarga</option>
                        <option {{old('status_keluarga')=='Kepala Keluarga' ? 'selected' : '' }}
                            value="Kepala Keluarga">Kepala Keluarga
                        </option>
                        <option {{old('status_keluarga')=='Istri' ? 'selected' : '' }} value="Istri">Istri
                        </option>
                        <option {{old('status_keluarga')=='Anak' ? 'selected' : '' }} value="Anak">Anak
                        </option>
                        <option {{old('status_keluarga')=='Famili Lain' ? 'selected' : '' }} value="Famili Lain">Famili
                            Lain
                        </option>
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
                        value="{{old('status_kawin')}}" aria-label="status kawin" id="status_kawin">
                        <option selected value="">Pilih Status Perkawinan</option>
                        <option {{old('status_kawin')=='Belum Kawin' ? 'selected' : '' }} value="Belum Kawin">Belum
                            Kawin
                        </option>
                        <option {{old('status_kawin')=='Kawin' ? 'selected' : '' }} value="Kawin">Kawin
                        </option>
                        <option {{old('status_kawin')=='Janda' ? 'selected' : '' }} value="Janda">Janda
                        </option>
                        <option {{old('status_kawin')=='Duda' ? 'selected' : '' }} value="Duda">Duda
                        </option>
                    </select>
                    @error('status_kawin')
                    <div id="status_kawin" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="tgl_kawin" class="form-label">Tanggal Nikah <span class="text-danger">*</span></label>
                    <input type="date" name="tgl_kawin" class="form-control @error('tgl_kawin') is-invalid @enderror"
                        value="{{old('tgl_kawin')}}" id="tgl_kawin" aria-describedby="tgl_kawin">
                    @error('tgl_kawin')
                    <div id="tgl_kawin" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="status_tunjangan" class="form-label">Status Tunjangan</label>
                    <select class="form-select @error('status_tunjangan') is-invalid @enderror" name="status_tunjangan"
                        value="{{old('status_tunjangan')}}" aria-label="status_tunjangan" id="status_tunjangan">
                        <option selected value="">Pilih Status Tunjangan</option>
                        <option {{old('status_tunjangan')=='Ya' ? 'selected' : '' }} value="Ya">Ya
                        </option>
                        <option {{old('status_tunjangan')=='Tidak' ? 'selected' : '' }} value="Tidak">Tidak
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
                        value="{{old('pendidikan')}}" aria-label="pendidikan" id="pendidikan">
                        <option selected value="">Pilih Status Pendidikan</option>
                        <option {{old('pendidikan')=='Belum Sekolah' ? 'selected' : '' }} value="Belum Sekolah">Belum
                            Sekolah
                        </option>
                        <option {{old('pendidikan')=='TK/Paud' ? 'selected' : '' }} value="TK/Paud">TK/Paud
                        </option>
                        <option {{old('pendidikan')=='SD Sederajat' ? 'selected' : '' }} value="SD Sederajat">SD
                            Sederajat
                        </option>
                        <option {{old('pendidikan')=='SMP Sederajat' ? 'selected' : '' }} value="SMP Sederajat">SMP
                            Sederajat
                        </option>
                        <option {{old('pendidikan')=='SMA Sederajat' ? 'selected' : '' }} value="SMA Sederajat">SMA
                            Sederajat
                        </option>
                        <option {{old('pendidikan')=='S1(Sarjana)' ? 'selected' : '' }} value="S1(Sarjana)">S1(Sarjana)
                        </option>
                        <option {{old('pendidikan')=='S2(Master)' ? 'selected' : '' }} value="S2(Master)">S2(Master)
                        </option>
                        <option {{old('pendidikan')=='S3(Doctor)' ? 'selected' : '' }} value="S3(Doctor)">S3(Doctor)
                        </option>
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
                    value="{{old('pekerjaan')}}" id="pekerjaan" aria-describedby="pekerjaan">
                @error('pekerjaan')
                <div id="pekerjaan" class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control @error('alamat') is-invalid @enderror" value="{{old('alamat')}}"
                    name="alamat" id="alamat" rows="3">{{old('alamat')}}</textarea>
                @error('alamat')
                <div id="alamat" class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="desa_kelurahan" class="form-label">Desa/Kelurahan</label>
                <input type="text" class="form-control @error('desa_kelurahan') is-invalid @enderror"
                    name="desa_kelurahan" value="{{old('desa_kelurahan')}}" id="desa_kelurahan"
                    aria-describedby="desa_kelurahan">
                @error('desa_kelurahan')
                <div id="desa_kelurahan" class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="kecamatan" class="form-label">Kecamatan</label>
                <input type="text" class="form-control @error('kecamatan') is-invalid @enderror" name="kecamatan"
                    value="{{old('kecamatan')}}" id="kecamatan" aria-describedby="kecamatan">
                @error('kecamatan')
                <div id="kecamatan" class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="kabupaten_kota" class="form-label">Kabupaten</label>
                <input type="text" class="form-control @error('kabupaten_kota') is-invalid @enderror"
                    name="kabupaten_kota" value="{{old('kabupaten_kota')}}" id="kabupaten_kota"
                    aria-describedby="kabupaten_kota">
                @error('kabupaten_kota')
                <div id="kabupaten_kota" class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="provinsi" class="form-label">Provinsi</label>
                <input type="text" class="form-control @error('provinsi') is-invalid @enderror" name="provinsi"
                    value="{{old('provinsi')}}" id="provinsi" aria-describedby="provinsi">
                @error('provinsi')
                <div id="" class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="hp" class="form-label">No. Handphone</label>
                <input type="number" class="form-control @error('hp') is-invalid @enderror" name="hp"
                    value="{{old('hp')}}" id="hp" aria-describedby="hp">
                @error('hp')
                <div id="hp" class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="telepon" class="form-label">No. Telepon</label>
                <input type="number" name="telepon" class="form-control @error('telepon') is-invalid @enderror"
                    value="{{old('telepon')}}" id="telepon" aria-describedby="telepon">
            </div>
            <div class="mb-3">
                <label for="kode_pos" class="form-label">Kode Pos</label>
                <input type="number" class="form-control @error('kode_pos') is-invalid @enderror" name="kode_pos"
                    value="{{old('kode_pos')}}" id="kode_pos" aria-describedby="kode_pos">
                @error('kode_pos')
                <div id="kode_pos" class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>

            <label for="dokumen" class="form-label">File (Format PDF Maksimal 1Mb)</label>
            <div class="input-group mb-3">
                <input type="file" class="form-control @error('dokumen') is-invalid @enderror"
                    value="{{old('dokumen')}}" id="dokumen" name="dokumen">
                <label class="input-group-text" for="dokumen">Upload</label>
                @error('dokumen')
                <div id="dokumen" class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Kirim</button>

        </div>
        </form>
        <br><br>
    </div>
</div>
</div>
@endsection
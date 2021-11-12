@extends('admin.layouts.main')
@include('admin.layouts.navbar')
@include('admin.layouts.sidebar')
@section('content')
{{-- @dd($errors) --}}
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <form action="/identitas" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mt-2 mb-4"><span class="text-danger">*</span> Wajib diisi</div>
                <div id="data-diri">
                    <h3>Data biografi</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nik" class="form-label">Nomor Induk Kependudukan (NIK) <span
                                        class="text-danger">*</span></label>
                                <input type="number" class="form-control @error('nik') is-invalid @enderror"
                                    value="{{old('nik')}}" id="nik" aria-describedby="nik" name="nik">
                                @error('nik')
                                <div id="nik" class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="tempat_lahir" class="form-label">Tempat Lahir <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror"
                                    value="{{old('tempat_lahir')}}" id="tempat_lahir" aria-describedby="tempat_lahir"
                                    name="tempat_lahir">
                                @error('tempat_lahir')
                                <div id="tempat_lahir" class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin <span
                                        class="text-danger">*</span></label>
                                <select class="form-select @error('jenis_kelamin') is-invalid @enderror"
                                    value="{{old('jenis_kelamin')}}" aria-label="jenis kelamin" name="jenis_kelamin"
                                    id="jenis_kelamin">
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
                                <label for="golongan_darah" class="form-label">Golongan Darah <span
                                        class="text-danger">*</span></label>
                                <select class="form-select @error('golongan_darah') is-invalid @enderror"
                                    value="{{old('golongan_darah')}}" aria-label="golongan darah" name="golongan_darah"
                                    id="golongan_darah">
                                    <option value="">Pilih Golongan Darah</option>
                                    @foreach ($golongan_darah as $gd)
                                    <option {{old('golongan_darah')==$gd ? 'selected' : '' }} value="{{ $gd }}">{{ $gd
                                        }}</option>
                                    @endforeach
                                </select>
                                @error('golongan_darah')
                                <div id="golongan_darah" class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="gelar_depan" class="form-label">Gelar Depan</label>
                                <input type="text" class="form-control @error('gelar_depan') is-invalid @enderror"
                                    value="{{old('gelar_depan')}}" id="gelar_depan" aria-describedby="gelar_depan"
                                    name="gelar_depan">
                                @error('gelar_depan')
                                <div id="gelar_depan" class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="hp" class="form-label">Handphone (HP) <span
                                        class="text-danger">*</span></label>
                                <input type="number" class="form-control @error('hp') is-invalid @enderror"
                                    value="{{old('hp')}}" id="hp" aria-describedby="hp" name="hp">
                                @error('hp')
                                <div id="hp" class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="kelurahan_id" class="form-label">Kelurahan <span
                                        class="text-danger">*</span></label>
                                <select class="form-select @error('kelurahan_id') is-invalid @enderror"
                                    value="{{old('kelurahan_id')}}" aria-label="kelurahan" name="kelurahan_id"
                                    id="kelurahan_id">
                                    <option value="">Pilih Kelurahan</option>
                                    @foreach ($rowsKelurahan as $rowKelurahan)
                                    <option {{old('kelurahan_id')==$rowKelurahan['kelurahan_id'] ? 'selected' : '' }}
                                        value="{{ $rowKelurahan['kelurahan_id'] }}">{{ $rowKelurahan['nama_kelurahan']
                                        }}</option>
                                    @endforeach
                                </select>
                                @error('kelurahan_id')
                                <div id="kelurahan_id" class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="rt_rw" class="form-label">RT/RW (Contoh : 007/002) <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('rt_rw') is-invalid @enderror"
                                    value="{{old('rt_rw')}}" id="rt_rw" aria-describedby="rt_rw" name="rt_rw">
                                @error('rt_rw')
                                <div id="rt_rw" class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                    value="{{old('nama')}}" id="nama" aria-describedby="nama" name="nama">
                                @error('nama')
                                <div id="nama" class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="tgl_lahir" class="form-label">Tanggal Lahir <span
                                        class="text-danger">*</span></label>
                                <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror"
                                    value="{{old('tgl_lahir')}}" id="tgl_lahir" aria-describedby="tgl_lahir"
                                    name="tgl_lahir">
                                @error('tgl_lahir')
                                <div id="tgl_lahir" class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="agama" class="form-label">Agama <span class="text-danger">*</span></label>
                                <select class="form-select @error('agama') is-invalid @enderror"
                                    value="{{old('agama')}}" aria-label="agama" name="agama" id="agama">
                                    <option value="">Pilih Agama</option>
                                    @foreach ($rowsAgama as $rowAgama)
                                    <option {{old('agama')==$rowAgama ? 'selected' : '' }} value="{{ $rowAgama }}">{{
                                        $rowAgama }}</option>
                                    @endforeach
                                </select>
                                @error('agama')
                                <div id="agama" class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="status_kawin" class="form-label">Status Perkawinan <span
                                        class="text-danger">*</span></label>
                                <select class="form-select @error('status_kawin') is-invalid @enderror"
                                    value="{{old('status_kawin')}}" aria-label="status_kawin" name="status_kawin"
                                    id="status_kawin">
                                    <option value="">Pilih Status Perkawinan</option>
                                    @foreach ($rowsStatusKawin as $rowStatusKawin)
                                    <option {{old('status_kawin')==$rowStatusKawin ? 'selected' : '' }}
                                        value="{{ $rowStatusKawin }}">{{ $rowStatusKawin }}</option>
                                    @endforeach
                                </select>
                                @error('status_kawin')
                                <div id="status_kawin" class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="gelar_belakang" class="form-label">Gelar Belakang</label>
                                <input type="text" class="form-control @error('gelar_belakang') is-invalid @enderror"
                                    value="{{old('gelar_belakang')}}" id="gelar_belakang"
                                    aria-describedby="gelar_belakang" name="gelar_belakang">
                                @error('gelar_belakang')
                                <div id="gelar_belakang" class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="telepon" class="form-label">Telepon</label>
                                <input type="number" class="form-control @error('telepon') is-invalid @enderror"
                                    value="{{old('telepon')}}" id="telepon" aria-describedby="telepon" name="telepon">
                                @error('telepon')
                                <div id="telepon" class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="kecamatan_id" class="form-label">Kecamatan <span
                                        class="text-danger">*</span></label>
                                <select class="form-select @error('kecamatan_id') is-invalid @enderror"
                                    value="{{old('kecamatan_id')}}" aria-label="kecamatan" name="kecamatan_id"
                                    id="kecamatan_id">
                                    <option value="">Pilih Kecamatan</option>
                                    @foreach ($rowsKecamatan as $rowKecamatan)
                                    <option {{old('kecamatan_id')==$rowKecamatan['kecamatan_id'] ? 'selected' : '' }}
                                        value="{{ $rowKecamatan['kecamatan_id'] }}">{{ $rowKecamatan['nama_kecamatan']
                                        }}</option>
                                    @endforeach
                                </select>
                                @error('kecamatan_id')
                                <div id="kecamatan_id" class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="npwp" class="form-label">NPWP <span class="text-danger">*</span></label>
                                <input type="number" class="form-control @error('npwp') is-invalid @enderror"
                                    value="{{old('npwp')}}" id="npwp" aria-describedby="npwp" name="npwp">
                                @error('npwp')
                                <div id="npwp" class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="no_bpjs" class="form-label">Nomor BPJS <span
                                        class="text-danger">*</span></label>
                                <input type="number" class="form-control @error('no_bpjs') is-invalid @enderror"
                                    value="{{old('no_bpjs')}}" id="no_bpjs" aria-describedby="nomor bpjs"
                                    name="no_bpjs">
                                @error('no_bpjs')
                                <div id="no_bpjs" class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary" onclick="nextButtonIdentitas1()">Lanjut</button>
                </div>

                <div id="data-pns" style="display: none">
                    <h3>Data PNS</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nip" class="form-label">Nomor Induk Pegawai <span
                                        class="text-danger">*</span></label>
                                <input type="number" class="form-control @error('nip') is-invalid @enderror"
                                    value="{{old('nip')}}" id="nip" aria-describedby="nip" name="nip">
                                @error('nip')
                                <div id="nip" class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="no_taspen" class="form-label">Nomor Taspen <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('no_taspen') is-invalid @enderror"
                                    value="{{old('no_taspen')}}" id="no_taspen" aria-describedby="nomor taspen"
                                    name="no_taspen">
                                @error('no_taspen')
                                <div id="no_taspen" class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="bantuan_bepetarum_pns" class="form-label">Bantuan Bepetarum PNS <span
                                        class="text-danger">*</span></label>
                                <select class="form-select @error('bantuan_bepetarum_pns') is-invalid @enderror"
                                    value="{{old('bantuan_bepetarum_pns')}}" aria-label="bantuan bepetarum pns"
                                    id="bantuan_bepetarum_pns" name="bantuan_bepetarum_pns">
                                    <option value="">Pilih Bantuan Bepetarum PNS</option>

                                    @foreach ($rowsBBP as $rowBBP)
                                    <option {{old('bantuan_bepetarum_pns')==$rowBBP ? 'selected' : '' }}
                                        value="{{ $rowBBP }}">{{ $rowBBP }}</option>
                                    @endforeach

                                </select>
                                @error('bantuan_bepetarum_pns')
                                <div id="bantuan_bepetarum_pns" class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="no_karpeg" class="form-label">Nomor Karpeg <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('no_karpeg') is-invalid @enderror"
                                    value="{{old('no_karpeg')}}" id="no_karpeg" aria-describedby="nomor kartu pegawai"
                                    name="no_karpeg">
                                @error('no_karpeg')
                                <div id="no_karpeg" class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="no_kariskarsu" class="form-label">Nomor Karis/Karsu <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('no_kariskarsu') is-invalid @enderror"
                                    value="{{old('no_kariskarsu')}}" id="no_kariskarsu"
                                    aria-describedby="nomor karis atau karsu" name="no_kariskarsu">
                                @error('no_kariskarsu')
                                <div id="no_kariskarsu" class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="tahun_bantuan_bepetarum_pns" class="form-label">Tahun Bantuan Bepetarum
                                    <span class="text-danger">*</span></label>
                                <input type="number"
                                    class="form-control @error('tahun_bantuan_bepetarum_pns') is-invalid @enderror"
                                    value="{{old('tahun_bantuan_bepetarum_pns')}}" id="tahun_bantuan_bepetarum_pns"
                                    aria-describedby="tahun bantuan bepetarum PNS " name="tahun_bantuan_bepetarum_pns">
                                @error('tahun_bantuan_bepetarum_pns')
                                <div id="tahun_bantuan_bepetarum_pns" class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="status_kepegawaian" class="form-label">Status Kepegawaian <span
                                class="text-danger">*</span></label>
                        <select class="form-select @error('status_kepegawaian') is-invalid @enderror"
                            value="{{old('status_kepegawaian')}}" aria-label="status kepegawaian"
                            id="status_kepegawaian" name="status_kepegawaian">
                            <option value="">Pilih Status Kepegawaian</option>
                            @foreach ($rowsStatusPegawai as $rowStatusPegawai)
                            <option {{old('status_kepegawaian')==$rowStatusPegawai ? 'selected' : '' }}
                                value="{{ $rowStatusPegawai}}">{{ $rowStatusPegawai }}</option>
                            @endforeach
                        </select>
                        @error('status_kepegawaian')
                        <div id="status_kepegawaian" class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="jenis_kepegawaian" class="form-label">Jenis Kepegawaian <span
                                class="text-danger">*</span></label>
                        <select class="form-select @error('jenis_kepegawaian') is-invalid @enderror"
                            value="{{old('jenis_kepegawaian')}}" aria-label="jenis kepegawaian" id="jenis_kepegawaian"
                            name="jenis_kepegawaian">
                            <option value="">Pilih Jenis Kepegawaian</option>
                            @foreach ($rowsJenisPegawai as $rowJenisPegawai)
                            <option {{old('jenis_kepegawaian')==$rowJenisPegawai ? 'selected' : '' }}
                                value="{{ $rowJenisPegawai }}">{{ $rowJenisPegawai }}</option>
                            @endforeach
                        </select>
                        @error('jenis_kepegawaian')
                        <div id="jenis_kepegawaian" class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="kedudukan_kepegawaian" class="form-label">Kedudukan Kepegawaian <span
                                class="text-danger">*</span></label>
                        <select class="form-select @error('kedudukan_kepegawaian') is-invalid @enderror"
                            value="{{old('kedudukan_kepegawaian')}}" aria-label="kedudukan kepegawaian"
                            id="kedudukan_kepegawaian" name="kedudukan_kepegawaian">
                            <option value="">Pilih Kedudukan Kepegawaian</option>
                            @foreach ($rowsKedudukanPegawai as $rowKedudukanPegawai)
                            <option {{old('kedudukan_kepegawaian')==$rowKedudukanPegawai ? 'selected' : '' }}
                                value="{{ $rowKedudukanPegawai }}">{{ $rowKedudukanPegawai }}</option>
                            @endforeach
                        </select>
                        @error('kedudukan_kepegawaian')
                        <div id="kedudukan_kepegawaian" class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="pangkat_id" class="form-label">Pangkat <span class="text-danger">*</span></label>
                        <select class="form-select @error('pangkat_id') is-invalid @enderror"
                            value="{{old('pangkat_id')}}" aria-label="pangkat" id="pangkat_id" name="pangkat_id">
                            <option value="">Pilih Pangkat</option>
                            @foreach ($rowsPangkat as $rowPangkat)
                            <option {{old('pangkat_id')==$rowPangkat['pangkat_id'] ? 'selected' : '' }}
                                value="{{ $rowPangkat['pangkat_id'] }}">{{ $rowPangkat['pangkat'] }}</option>
                            @endforeach
                        </select>
                        @error('pangkat_id')
                        <div id="pangkat_id" class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="jabatan_id" class="form-label">Jabatan <span class="text-danger">*</span></label>
                        <select class="form-select @error('jabatan_id') is-invalid @enderror"
                            value="{{old('jabatan_id')}}" aria-label="jabatan" id="jabatan_id" name="jabatan_id">
                            <option value="">Pilih Jabatan</option>
                            @foreach ($rowsJabatan as $rowJabatan)
                            <option {{old('jabatan_id')==$rowJabatan['jabatan_id'] ? 'selected' : '' }}
                                value="{{ $rowJabatan['jabatan_id'] }}">{{ $rowJabatan['nama_jabatan'] }}</option>
                            @endforeach
                        </select>
                        @error('jabatan_id')
                        <div id="jabatan_id" class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="unit_kerja_id" class="form-label">Unit Kerja <span
                                class="text-danger">*</span></label>
                        <select class="form-select @error('unit_kerja_id') is-invalid @enderror"
                            value="{{old('unit_kerja_id')}}" aria-label="unit kerja" id="unit_kerja_id"
                            name="unit_kerja_id">
                            <option value="">Pilih Unit Kerja</option>
                            @foreach ($rowsUnitKerja as $rowUnitKerja)
                            <option {{old('unit_kerja_id')==$rowUnitKerja['unit_kerja_id'] ? 'selected' : '' }}
                                value="{{ $rowUnitKerja['unit_kerja_id'] }}">{{ $rowUnitKerja['nama_unit'] }}
                            </option>
                            @endforeach
                        </select>
                        @error('unit_kerja_id')
                        <div id="unit_kerja_id" class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <button type="button" class="btn btn-primary" onclick="prevButtonIdentitas1()">Sebelumnnya</button>

                    <button type="button" class="btn btn-primary" onclick="nextButtonIdentitas2()">Selanjutnya</button>
                </div>

                <div id="data-foto" style="display: none">
                    <label for="foto" class="form-label">Foto (Fotmat JPG, JPEG, PNG, Maksimal 500Kb) <span
                            class="text-danger">*</span></label>
                    <div class="input-group mb-3">
                        <input type="file" class="form-control @error('foto') is-invalid @enderror"
                            value="{{old('foto')}}" id="foto" name="foto">
                        <label class="input-group-text" for="foto">Upload</label>
                        @error('foto')
                        <div id="foto" class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <button type="button" class="btn btn-primary" onclick="prevButtonIdentitas2()">Sebelumnnya</button>
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
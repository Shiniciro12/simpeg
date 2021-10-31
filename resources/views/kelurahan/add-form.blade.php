@extends('home.layouts.main')
@include('home.layouts.navbar')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <h3>Kelurahan</h3>
            <form action="/kelurahan/add" method="post">
                @csrf
                <div class="mt-2 mb-4"><span class="text-danger">*</span> Wajib diisi</div>
                <div class="mb-3">
                    <label for="nama_kelurahan" class="form-label">Nama Kelurahan <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('nama_kelurahan') is-invalid @enderror"
                        value="{{old('nama_kelurahan')}}" id="nama_kelurahan" aria-describedby="nama_kelurahan" name="nama_kelurahan">
                    @error('nama_kelurahan')
                    <div id="nama_kelurahan" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="kode_pos" class="form-label">Kode Pos <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('kode_pos') is-invalid @enderror"
                        value="{{old('kode_pos')}}" id="kode_pos" aria-describedby="kode_pos" name="kode_pos">
                    @error('kode_pos')
                    <div id="kode_pos" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <button class="btn btn-success" type="submit">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection
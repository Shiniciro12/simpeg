@extends('home.layouts.main')
@include('home.layouts.navbar')
@section('content')
{{-- @dd($errors) --}}
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <h3>Unit Kerja</h3>
            <form action="/unit-kerja/add" method="post">
                @csrf
                <div class="mt-2 mb-4"><span class="text-danger">*</span> Wajib diisi</div>
                <div class="mb-3">
                    <label for="nama_unit" class="form-label">Nama <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('nama_unit') is-invalid @enderror"
                        value="{{old('nama_unit')}}" id="nama_unit" aria-describedby="nama_unit" name="nama_unit">
                    @error('nama_unit')
                    <div id="nama_unit" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('alamat') is-invalid @enderror"
                        value="{{old('alamat')}}" id="alamat" aria-describedby="alamat" name="alamat">
                    @error('alamat')
                    <div id="alamat" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="latitude" class="form-label">Latitude <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('latitude') is-invalid @enderror"
                        value="{{old('latitude')}}" id="latitude" aria-describedby="latitude" name="latitude">
                    @error('latitude')
                    <div id="latitude" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="longitude" class="form-label">Longitude <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('longitude') is-invalid @enderror"
                        value="{{old('longitude')}}" id="longitude" aria-describedby="longitude" name="longitude">
                    @error('longitude')
                    <div id="longitude" class="invalid-feedback">
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
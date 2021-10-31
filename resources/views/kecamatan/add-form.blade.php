@extends('home.layouts.main')
@include('home.layouts.navbar')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <h3>Kecamatan</h3>
            <form action="/kecamatan/add" method="post">
                @csrf
                <div class="mt-2 mb-4"><span class="text-danger">*</span> Wajib diisi</div>
                <div class="mb-3">
                    <label for="nama_kecamatan" class="form-label">Nama Kecamatan <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('nama_kecamatan') is-invalid @enderror"
                        value="{{old('nama_kecamatan')}}" id="nama_kecamatan" aria-describedby="nama_kecamatan" name="nama_kecamatan">
                    @error('nama_kecamatan')
                    <div id="nama_kecamatan" class="invalid-feedback">
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
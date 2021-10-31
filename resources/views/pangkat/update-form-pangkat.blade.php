@extends('home.layouts.main')
@include('home.layouts.navbar')
@section('content')
{{-- @dd($errors) --}}
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <h3>Data Pangkat</h3>
            <form action="/pangkat/update" method="post">
                @csrf
                <input type="hidden" name="pangkat_id" value="{{ $data['pangkat_id'] }}">
                <div class="mt-2 mb-4"><span class="text-danger">*</span> Wajib diisi</div>
                <div class="mb-3">
                    <label for="pangkat" class="form-label">Pangkat <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('pangkat') is-invalid @enderror"
                        value="{{old('pangkat', $data['pangkat'])}}" id="pangkat" aria-describedby="pangkat" name="pangkat">
                    @error('pangkat')
                    <div id="pangkat" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="golongan" class="form-label">Golongan <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('golongan') is-invalid @enderror"
                        value="{{old('golongan', $data['golongan'])}}" id="golongan" aria-describedby="golongan" name="golongan">
                    @error('golongan')
                    <div id="golongan" class="invalid-feedback">
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
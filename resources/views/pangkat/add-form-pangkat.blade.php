@extends('home.layouts.main')
@include('home.layouts.navbar')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <form action="/pangkat/add" method="post" enctype="multipart/form-data">
                @csrf
                <h3>Data Pangkat</h3>
                <div class="mt-2 mb-4"><span class="text-danger">*</span> Wajib diisi</div>
                <div id="data-diri">
                    <div class="mb-3">
                        <label for="pangkat" class="form-label">Pangkat <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('pangkat') is-invalid @enderror"
                            value="{{old('pangkat')}}" id="pangkat" aria-describedby="pangkat" name="pangkat">
                        @error('pangkat')
                        <div id="pangkat" class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="golongan" class="form-label">Golongan<span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('golongan') is-invalid @enderror"
                            value="{{old('golongan')}}" id="golongan" aria-describedby="golongan" name="golongan">
                        @error('golongan')
                        <div id="golongan" class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>



                </div>


                <button type="submit" class="btn btn-primary btn-sm">Kirim</button>
        </div>
        </form>
    </div>
</div>
</div>
@endsection
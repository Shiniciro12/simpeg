@extends('umum.layouts.main')
@section('content')
<div class="container">
    @if(session()->has('loginError'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{session('loginError')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="shadow-lg mb-5 bg-body rounded">
        <div class="card mt-5">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <iframe width="100%" height="480" src="https://www.youtube.com/embed/22UemOikenM"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </div>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-title">
                                <h2>
                                    <center>Login</center>
                                </h2>
                            </div>
                            <div class="card-body">
                                <center><img src="/images/logo.svg" alt="" width="80"></center>
                                <br>
                                <form action="/login" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="nip" class="form-label">NIP</label>
                                        <input type="text" id="nip" name="nip" value="{{old('nip')}}"
                                            class="form-control @error('nip') is-invalid @enderror"
                                            value="{{old('nip')}}">
                                        @error('nip')
                                        <div id="nip" class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" id="password" name="password" class="form-control">
                                    </div>
                                    <br>
                                    <button type="submit" class="btn btn-primary">Login</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection